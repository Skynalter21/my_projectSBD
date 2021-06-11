<?php

namespace App\Http\Requests\Admin\Disciplina;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDisciplina extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.disciplina.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'sigla' => ['required', 'string'],
            'numCreditos' => ['required', 'integer'],
            'turma' => ['required', 'array'],
            'professor' => ['required', 'array'],
            'local' => ['nullable'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
