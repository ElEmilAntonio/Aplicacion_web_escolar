<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActividadPost extends FormRequest
{
 public $rules=[
'NombreActividad' => ['required', 'string', 'max:50'],
'FechaActividad' => ['required','date'],
'EstadoActividad' => ['boolean'],
'ArchivoActividad' => ['file','mimes:pdf','max:2048','nullable'],
'InstruccionesActividad' => ['string','nullable']
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
