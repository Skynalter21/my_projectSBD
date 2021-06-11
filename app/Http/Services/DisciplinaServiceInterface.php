<?php

namespace App\Http\Services;

interface DisciplinaServiceInterface
{
    function listarDisciplinasByProfessorId($professorId);
}