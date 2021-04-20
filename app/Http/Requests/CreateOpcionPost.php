<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOpcionPost extends FormRequest
{
 public $rules=[
    'Pregunta' => ['required','String','max:100'],
    'OpcionA'=>['String','required','max:50'],
    'OpcionB'=>['String','required','max:50'],
    'OpcionC'=>['String','required','max:50'],
    'Respuesta' => ['required','in:1,2,3'],
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
