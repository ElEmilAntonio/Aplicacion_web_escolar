<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePracticaPost extends FormRequest
{
 public $rules=[
    'EstadoPractica' => ['boolean'],
    'FechaPractica' => ['required','date'],
    'HoraInicioPractica' => ['required'],
    'HoraFinPractica' => ['required']
]
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
      return $this->rules;
    }
}
