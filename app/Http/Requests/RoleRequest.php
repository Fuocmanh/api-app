<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:fbc_roles,name,' . $this->input('id') . ',id'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên quyền đã được sử dụng.',
            'name.required' => 'Tên quyền là bắt buộc.'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $response = $this->sendError($validator->errors());
        throw new HttpResponseException($response);
    }
    protected function sendError($errors)
    {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'errors' => $errors,
        ], 422);
    }
}
