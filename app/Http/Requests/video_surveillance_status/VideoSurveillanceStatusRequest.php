<?php

namespace App\Http\Requests\video_surveillance_status;

use Illuminate\Foundation\Http\FormRequest;

class VideoSurveillanceStatusRequest extends FormRequest
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
            'name' => 'required|max:50',
            'order_by' => 'integer'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Поле "Назва" обов\'язково має бути заповненим!',
            'name.max' => 'Поле "Назва" не може містити більше 50 символів!',
            'order_by.integer' => 'Поле "Порядок сортування" обов\'язково має бути цілочисленним!',
        ];
    }
}
