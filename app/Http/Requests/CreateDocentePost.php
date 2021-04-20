<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocentePost extends FormRequest
{
    public $rules=[
      'name' => ['required', 'string', 'max:50'],
      'apellidos' => ['required', 'string', 'max:50'],
      'email' => ['required', 'string', 'email', 'max:255','unique:users'],
      'Homoclave' => ['required', 'string','min:13', 'max:13','unique:docentes']
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
