<?php

namespace App\Http\Requests\video_surveillance;

use Illuminate\Foundation\Http\FormRequest;

class videoSurveillanceRequest extends FormRequest
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
            'video_surveillance_status_id' => 'required|integer',
            'date_installation' => 'nullable|date',
            'date_demount' => 'nullable|date',
            'note' => ''
        ];
    }

    public function messages()
    {
        return [
            'point_id.required' => 'Поле "Свердловина" обов\'язково має бути заповненим!',
            'video_surveillance_status_id.required' => 'Поле "Статус" обов\'язково має бути заповненим!',
            'date_installation.date' => 'Вкажіть дату інсталяції!',
            'date_demount.date' => 'Вкажіть дату демонтажу!',
        ];
    }
}
