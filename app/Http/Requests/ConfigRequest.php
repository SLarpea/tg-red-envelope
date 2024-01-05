<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'value' => 'nullable'
        ];

        $numericKeys = [
            'auto_get_sec',
            'lucky_num',
            'lose_rate',
            'valid_time',
            'default_balance',
            'platform_commission',
            'platform_get_commission',
            'thunder_chance',
            'share_rate',
            'invite_usdt',
            'leopard_reward',
            'leopard_reward_4',
            'leopard_reward_5',
            'straight_reward',
            'straight_reward_4',
            'straight_reward_5',
            'self_lucky',
            'min_amount',
            'max_amount',
            'straight_rate',
            'leopard_rate',
            'jackpot',
        ];

        if (in_array($this->name, $numericKeys)) {
            $rules['value'] = "required|numeric";
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'value' => 'Configuration value'
        ];
    }
}
