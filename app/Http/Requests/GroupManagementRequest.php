<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupManagementRequest extends FormRequest
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
        if ($this->update_type != 'status') {
            $rules = [
                'group_id' => 'required',
                'remark' => 'required',
                'service_url' => 'required',
                'recharge_url' => 'required',
                'channel_url' => 'required',
                'photo_id' => 'required',
                'admin_id' => 'required',
                'status' => 'required|integer',
            ];

        }else{
            $rules = [
                'status' => 'required|integer',
            ];
        }
        return $rules;
    }
}
