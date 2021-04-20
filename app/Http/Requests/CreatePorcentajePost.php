<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePorcentajePost extends FormRequest
{
 public $rules=[
    'PorcentajeActividades' => ['required'],
    'PorcentajePracticas' => ['required'],
    'PorcentajeExamen' => ['required'],

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
