<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAsistenciaPost extends FormRequest
{
 public $rules=[
    'FechaAsistencia' => ['required','date'],
    'HoraAsistencia' => ['required']
];
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
