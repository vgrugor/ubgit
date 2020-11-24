<?php

namespace App\Http\Requests\internet_request_type;

use Illuminate\Foundation\Http\FormRequest;

class internetRequestTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'order_by' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Назва" обов\'язкове для заповнення!',
            'name.max' => 'Назва не може бути довшою 200 символів!',
            'order_by.numeric' => 'Поле "Порядок сортування" може містити тільки числові значення!'
        ];
    }
}
