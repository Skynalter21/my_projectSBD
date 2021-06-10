<?php

namespace App\Http\Requests\Admin\Aluno;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAluno extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.aluno.edit', $this->aluno);
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
            'nascimento' => ['sometimes', 'date'],
            'telefone' => ['sometimes', 'string'],
            'faltas' => ['sometimes', 'integer'],
            'cra' => ['sometimes', 'numeric'],
            'FK_idTurma' => ['sometimes', 'integer'],
            'FK_idOrientador' => ['sometimes', 'integer'],
            
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
