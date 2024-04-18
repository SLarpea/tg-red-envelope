<?php

namespace App\Http\Requests;

use App\Services\Telegram\ConfigService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConfigRequest extends FormRequest
{
    protected $validTime;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'value' => 'nullable',
        ];

        $numericKeys = [
            'auto_get_sec',
            'lucky_num',
            'lose_rate',
            'valid_time',
            // Add other numeric keys here
        ];

        if (in_array($this->name, $numericKeys)) {
            if ($this->name === 'auto_get_sec') {
                $validTime = ConfigService::getConfigValue($this->group_id, 'valid_time');
                $this->validTime = $validTime;
                $rules['value'] = "required|numeric|max:$validTime";
            } else {
                $rules['value'] = "required|numeric";
            }
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'value' => 'Configuration value',
        ];
    }


    public function messages()
    {
        $messages = [];

        if ($this->name === 'auto_get_sec') {
            $messages['value.max'] =  ":attribute must not greater valid_time $this->validTime ";
        }

        return $messages;
    }
}
