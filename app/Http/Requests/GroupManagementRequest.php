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
                'name' => 'required',
                'group_id' => 'required|unique:group_management,group_id,' . $this->id,
                'remark' => 'required',
                'service_url' => 'required|url',
                'recharge_url' => 'required|url',
                'channel_url' => 'required|url',
                'photo_id' => 'required|url',
                'admin_id' => 'required',
                'status' => 'required|integer',
            ];
        } else {
            $rules = [
                'status' => 'required|integer',
            ];
        }

        return $rules;
    }
}
