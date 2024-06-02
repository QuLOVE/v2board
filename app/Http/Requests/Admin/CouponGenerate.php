<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponGenerate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'generate_count' => 'nullable|integer|max:500',
            'name' => 'required',
            'type' => 'required|in:1,2',
            'value' => 'required|integer',
            'started_at' => 'required|integer',
            'ended_at' => 'required|integer',
            'limit_use' => 'nullable|integer',
            'limit_use_with_user' => 'nullable|integer',
            'limit_plan_ids' => 'nullable|array',
            'limit_period' => 'nullable|array',
            'code' => ''
        ];
    }

    public function messages()
    {
        return [
            'generate_count.integer' => 'The generated quantity must be a number',
            'generate_count.max' => 'The maximum number of generated is 500',
            'name.required' => 'Name cannot be empty',
            'type.required' => 'Type cannot be empty',
            'type.in' => 'Type format error',
            'value.required' => 'Amount or proportion cannot be empty',
            'value.integer' => 'Amount or proportion format error',
            'started_at.required' => 'Start time cannot be empty',
            'started_at.integer' => 'Start time format error',
            'ended_at.required' => 'End time cannot be empty',
            'ended_at.integer' => 'End time format error',
            'limit_use.integer' => 'Maximum number of uses format error',
            'limit_use_with_user.integer' => 'Limit the number of times users use format errors',
            'limit_plan_ids.array' => 'Specify subscription format error',
            'limit_period.array' => 'Specify cycle format error'
        ];
    }
}
