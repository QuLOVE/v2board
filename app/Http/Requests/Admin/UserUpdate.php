<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email:strict',
            'password' => 'nullable|min:8',
            'transfer_enable' => 'numeric',
            'device_limit' => 'nullable|integer',
            'expired_at' => 'nullable|integer',
            'banned' => 'required|in:0,1',
            'plan_id' => 'nullable|integer',
            'commission_rate' => 'nullable|integer|min:0|max:100',
            'discount' => 'nullable|integer|min:0|max:100',
            'is_admin' => 'required|in:0,1',
            'is_staff' => 'required|in:0,1',
            'u' => 'integer',
            'd' => 'integer',
            'balance' => 'integer',
            'commission_type' => 'integer',
            'commission_balance' => 'integer',
            'remarks' => 'nullable',
            'speed_limit' => 'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email cannot be empty',
            'email.email' => 'Incorrect email format',
            'transfer_enable.numeric' => 'Traffic format is incorrect',
            'device_limit.integer' => 'Device number limit format is incorrect',
            'expired_at.integer' => 'Expiration time format is incorrect',
            'banned.required' => 'Whether to ban cannot be empty',
            'banned.in' => 'Whether to ban format is incorrect',
            'is_admin.required' => 'Whether administrator cannot be empty',
            'is_admin.in' => 'Whether the administrator format is incorrect',
            'is_staff.required' => 'Whether the staff is cannot be empty',
            'is_staff.in' => 'Whether the staff format is incorrect',
            'plan_id.integer' => 'Subscription plan format is incorrect',
            'commission_rate.integer' => 'Referral rebate ratio format is incorrect',
            'commission_rate.nullable' => 'Referral rebate ratio format is incorrect',
            'commission_rate.min' => 'The minimum referral rebate ratio is 0',
            'commission_rate.max' => 'The maximum referral rebate ratio is 100',
            'discount.integer' => 'Exclusive discount ratio format is incorrect',
            'discount.nullable' => 'Exclusive discount ratio format is incorrect',
            'discount.min' => 'The minimum exclusive discount ratio is 0',
            'discount.max' => 'The maximum exclusive discount ratio is 100',
            'u.integer' => 'Upstream traffic format is incorrect',
            'd.integer' => 'Downstream traffic format is incorrect',
            'balance.integer' => 'Balance format is incorrect',
            'commission_balance.integer' => 'Commission format is incorrect',
            'password.min' => 'The password length is at least 8 digits',
            'speed_limit.integer' => 'Speed limit format is incorrect'
        ];
    }
}
