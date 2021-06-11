<?php

namespace App\Http\Services;

use App\Models\Disciplina;

class DisciplinaService implements DisciplinaServiceInterface
{
    private $model;

    public function __construct(Disciplina $model)
    {
        $this->model = $model;
    }

    // This function returns a collect object
    public function listarDisciplinasByProfessorId($professorId)
    {
        return $this->model->where('FK_idProfessor', $professorId)->get();
    }
}