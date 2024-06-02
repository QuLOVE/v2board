<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ThemeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ThemeController extends Controller
{
    private $themes;
    private $path;

    public function __construct()
    {
        $this->path = $path = public_path('theme/');
        $this->themes = array_map(function ($item) use ($path) {
            return str_replace($path, '', $item);
        }, glob($path . '*'));
    }

    public function getThemes()
    {
        $themeConfigs = [];
        foreach ($this->themes as $theme) {
            $themeConfigFile = $this->path . "{$theme}/config.json";
            if (!File::exists($themeConfigFile)) continue;
            $themeConfig = json_decode(File::get($themeConfigFile), true);
            if (!isset($themeConfig['configs']) || !is_array($themeConfig)) continue;
            $themeConfigs[$theme] = $themeConfig;
            if (config("theme.{$theme}")) continue;
            $themeService = new ThemeService($theme);
            $themeService->init();
        }
        return response([
            'data' => [
                'themes' => $themeConfigs,
                'active' => config('v2board.frontend_theme', 'v2board')
            ]
        ]);
    }

    public function getThemeConfig(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required|in:' . join(',', $this->themes)
        ]);
        return response([
            'data' => config("theme.{$payload['name']}")
        ]);
    }

    public function saveThemeConfig(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required|in:' . join(',', $this->themes),
            'config' => 'required'
        ]);
        $payload['config'] = json_decode(base64_decode($payload['config']), true);
        if (!$payload['config'] || !is_array($payload['config'])) abort(500, 'The parameters are wrong');
        $themeConfigFile = public_path("theme/{$payload['name']}/config.json");
        if (!File::exists($themeConfigFile)) abort(500, 'Theme does not exist');
        $themeConfig = json_decode(File::get($themeConfigFile), true);
        if (!isset($themeConfig['configs']) || !is_array($themeConfig)) abort(500, 'Theme profile is incorrect');
        $validateFields = array_column($themeConfig['configs'], 'field_name');
        $config = [];
        foreach ($validateFields as $validateField) {
            $config[$validateField] = isset($payload['config'][$validateField]) ? $payload['config'][$validateField] : '';
        }

        File::ensureDirectoryExists(base_path() . '/config/theme/');

        $data = var_export($config, 1);
        if (!File::put(base_path() . "/config/theme/{$payload['name']}.php", "<?php\n return $data ;")) {
            abort(500, 'Failed to modify');
        }

        try {
            Artisan::call('config:cache');
//            sleep(2);
        } catch (\Exception $e) {
            abort(500, 'Save failure');
        }

        return response([
            'data' => $config
        ]);
    }
}
