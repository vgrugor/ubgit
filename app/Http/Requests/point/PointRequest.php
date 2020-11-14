<?php

namespace App\Http\Requests\point;

use Illuminate\Foundation\Http\FormRequest;


class PointRequest extends FormRequest
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
            'name' => 'bail|required|max:50',
            'drill_id' => 'required|integer',
            'is_actual' => 'required|boolean',
            'nld' => 'nullable|integer',
            'nlm' => 'nullable|integer',
            'nls' => 'nullable|numeric',
            'eld' => 'nullable|integer',
            'elm' => 'nullable|integer',
            'els' => 'nullable|numeric',
            'coordinate_stage' => 'boolean',
            'address' => 'max:255',
            'date_building' => 'nullable|date',
            'date_drilling' => 'nullable|date',
            'date_demount' => 'nullable|date',
            'date_transfer' => 'nullable|date',
            'date_refresh' => 'nullable|date',
            'actual_stage_id' => 'required|integer',
            'date_actual_stage_refresh' => 'nullable|date',
            'note' => ''
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Поле з назвою свердловини не може бути пустим!',
            'drill_id.required' => 'Код бурового станка має бути вказаним!',
            'actual_stage_id.required' => 'Вкажіть актуальну стадію буріння!'
        ];
    }
    
}
