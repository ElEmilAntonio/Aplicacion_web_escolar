<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRelacionalPost extends FormRequest
{
 public $rules=
 'Pregunta1' => ['required','String','max:100'],
 'Respuesta1'=>['String','required','max:50'],
 'Pregunta2' => ['required','String','max:100'],
 'Respuesta2'=>['String','required','max:50'],
 'Pregunta3' => ['required','String','max:100'],
 'Respuesta3'=>['String','required','max:50'],
 'Pregunta4' => ['required','String','max:100'],
 'Respuesta4'=>['String','required','max:50'],
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
