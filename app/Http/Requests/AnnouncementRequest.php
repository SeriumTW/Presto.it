<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title' => 'required|max:50',
            'price' => 'required',
            'description' => 'required|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "E' richiesto un titolo!",
            'title.max' => "Devi inserire massimo 50 caratteri!",
            'price.required' => "E' richiesto un prezzo!",
            'description.required' => "E' richiesta una descrizione",
            'description.max' => "Devi inserire massimo 1000 caratteri!",
        ];
    }
}
