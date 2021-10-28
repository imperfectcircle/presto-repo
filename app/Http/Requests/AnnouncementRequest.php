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
            'title' => 'required',
            'body' => 'required',
            'price' => 'required|numeric', 
        ];
    }

    public function messages()
{
    return [
        'title.required' => "Il titolo dell'annuncio è obbligatorio",
        'body.required' => 'Il Messaggio è obbligatorio',
        'price.required' => 'Inserisci un prezzo',
        'price.integer' => 'Il prezzo deve essere numerico',
    ];
}
}
