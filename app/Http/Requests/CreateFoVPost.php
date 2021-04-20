<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoVPost extends FormRequest
{
 public $rules=[
    'Pregunta' => ['required','String','max:100'],
    'Respuesta' => ['required','in:0,1'],
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
