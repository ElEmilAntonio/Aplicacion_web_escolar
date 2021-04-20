<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActividadPost extends FormRequest
{
 public $rules= [
    'Nombre'=>['String','max:15','nullable'],
    'Simbolo'=>['String','max:3','nullable'],
    'grupo'=>['String','max:3','nullable'],
    'Periodo'=>['String','nullable'],
    'Bloque'=>['String','nullable'],
    'MasaAtomica'=>['String','nullable'],
    'ConfElectronica'=>['String','nullable'],
    'DurezaMohs'=>['String','nullable'],
    'Electrones'=>['String','nullable'],
    'Aplicaciones'=>['String','nullable'],
    'Precauciones'=>['String','nullable'],
    'Link' => ['nullable','url']
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
