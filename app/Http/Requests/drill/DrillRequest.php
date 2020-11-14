<?php

namespace App\Http\Requests\drill;

use Illuminate\Foundation\Http\FormRequest;

class DrillRequest extends FormRequest
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
          'name' => 'bail|required|max:5',
          'germany_name' => 'max:10',
          'drill_type_id' => 'required|integer',
          'workers_transfer' => 'nullable|integer',
          'phone_number' => 'max:14',
          'email' => 'nullable|email|max:255',
          'note' => ''
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Код бурового верстату за класиіфкацією БУ "Укрбургаз" обов\'язково має бути заповненим!',
            'drill_type_id.required' => 'Тип бурового верстату обов\'язково має бути вказаним!',
            'name.max' => 'Код бурового верстату за класиіфкацією БУ "Укрбургаз" не може містити більше 5-ти символів',
            'germany_name' => 'Код бурового верстату за класиіфкацією Bentec не може містити більше 10-ти символів'
        ];
    }
}
