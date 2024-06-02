<?php

namespace App\Http\Requests\Staff;

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
            'password' => 'nullable',
            'transfer_enable' => 'numeric',
            'device_limit' => 'nullable|integer',
            'expired_at' => 'nullable|integer',
            'banned' => 'required|in:0,1',
            'plan_id' => 'nullable|integer',
            'commission_rate' => 'nullable|integer|min:0|max:100',
            'discount' => 'nullable|integer|min:0|max:100',
            'u' => 'integer',
            'd' => 'integer',
            'balance' => 'integer',
            'commission_balance' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email cannot be empty',
            'email.email' => 'Incorrect email format',
            'transfer_enable.numeric' => 'Traffic format is incorrect',
            'device_limit.integer' => 'Device limit format is incorrect',
            'expired_at.integer' => 'Expiration time format is incorrect',
            'banned.required' => 'Ban status cannot be empty',
            'banned.in' => 'Ban status format is incorrect',
            'plan_id.integer' => 'Subscription plan format is incorrect',
            'commission_rate.integer' => 'Referral commission rate format is incorrect',
            'commission_rate.nullable' => 'Referral commission rate format is incorrect',
            'commission_rate.min' => 'Minimum referral commission rate is 0',
            'commission_rate.max' => 'Maximum referral commission rate is 100',
            'discount.integer' => 'Exclusive discount rate format is incorrect',
            'discount.nullable' => 'Exclusive discount rate format is incorrect',
            'discount.min' => 'Minimum exclusive discount rate is 0',
            'discount.max' => 'Maximum exclusive discount rate is 100',
            'u.integer' => 'Upload traffic format is incorrect',
            'd.integer' => 'Download traffic format is incorrect',
            'balance.integer' => 'Balance format is incorrect',
            'commission_balance.integer' => 'Commission balance format is incorrect'
        ];
    }
}
