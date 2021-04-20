<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTemaPost extends FormRequest
{
 public $rules=[
 'NombreTema' => ['required', 'string', 'max:50'],
 'ArchivoTema' => ['file','mimes:pdf','max:2048','nullable'],
 'InformacionTema' => ['string','nullable'],
 'LinkVideoTema' => ['max:200','url','regex:/https:\/\/(?:www.)?(youtube).com\/(?:watch\?v=)?(.*?)(?:\z|&)/','nullable'],
 'EstadoTema' => ['boolean']
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
