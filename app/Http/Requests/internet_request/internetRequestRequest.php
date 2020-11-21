<?php

namespace App\Http\Requests\internet_request;

use Illuminate\Foundation\Http\FormRequest;

class internetRequestRequest extends FormRequest
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
            'point_id' => 'required|integer',
            'internet_provider_id' => 'required|integer',
            'internet_request_type_id' => 'required|integer',
            'date_send' => 'required|date',
            'date_request' => 'nullable|date',
            'is_completed' => 'required|boolean',
            'date_completion' => 'nullable|date'
        ];
    }

    public function messages()
    {
        return [
            'point_id.required' => 'Поле "свердловина" обов\'язково має бути заповненим!',
            'internet_provider_id.required' => 'Оберіть провайдера!',
            'internet_request_type_id.required' => 'Оберіть тип заявки!',
            'date_send.required' => 'Вкажіть дату відправки заявки!',
            'is_completed.required' => 'Вкажіть статус виконання заявки!'
        ];
    }
}
