<?php

namespace App\Http\Requests\Admin\Faculdade;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateFaculdade extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.faculdade.edit', $this->faculdade);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string'],
            'sigla' => ['nullable', 'string'],
            'bloco' => ['nullable', 'string'],
            'numAlunos' => ['nullable', 'integer'],
            'numProfessor' => ['nullable', 'integer'],
            'orcamento' => ['nullable', 'integer'],
            'universidade' => ['sometimes', 'array'],
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
