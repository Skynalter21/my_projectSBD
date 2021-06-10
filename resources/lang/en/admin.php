<?php

return [
    'universidade' => [
        'title' => 'Universidade',

        'actions' => [
            'index' => 'Universidade',
            'create' => 'New Universidade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            
        ],
    ],

    'professor' => [
        'title' => 'Professor',

        'actions' => [
            'index' => 'Professor',
            'create' => 'New Professor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'professor' => [
        'title' => 'Professor',

        'actions' => [
            'index' => 'Professor',
            'create' => 'New Professor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'nascimento' => 'Nascimento',
            
        ],
    ],

    'diretor' => [
        'title' => 'Diretor',

        'actions' => [
            'index' => 'Diretor',
            'create' => 'New Diretor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'FK_idDiretor' => 'FK idDiretor',
            
        ],
    ],

    'professor' => [
        'title' => 'Professor',

        'actions' => [
            'index' => 'Professor',
            'create' => 'New Professor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'nascimento' => 'Nascimento',
            
        ],
    ],

    'faculdade' => [
        'title' => 'Faculdade',

        'actions' => [
            'index' => 'Faculdade',
            'create' => 'New Faculdade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'sigla' => 'Sigla',
            'bloco' => 'Bloco',
            'numAlunos' => 'NumAlunos',
            'numProfessor' => 'NumProfessor',
            'orcamento' => 'Orcamento',
            
        ],
    ],

    'turma' => [
        'title' => 'Turma',

        'actions' => [
            'index' => 'Turma',
            'create' => 'New Turma',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'turma' => [
        'title' => 'Turmas',

        'actions' => [
            'index' => 'Turmas',
            'create' => 'New Turma',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'semestre' => 'Semestre',
            'FK_local' => 'FK local',
            'faculdade_id' => 'Faculdade',
            'numProfessores' => 'NumProfessores',
            
        ],
    ],

    'aluno' => [
        'title' => 'Aluno',

        'actions' => [
            'index' => 'Aluno',
            'create' => 'New Aluno',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'nascimento' => 'Nascimento',
            'telefone' => 'Telefone',
            'faltas' => 'Faltas',
            'cra' => 'Cra',
            'FK_idTurma' => 'FK idTurma',
            'FK_idOrientador' => 'FK idOrientador',
            
        ],
    ],

    'pre-requisito' => [
        'title' => 'Pre Requisitos',

        'actions' => [
            'index' => 'Pre Requisitos',
            'create' => 'New Pre Requisito',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'FK_idDisciplina' => 'FK idDisciplina',
            'pre_requisito' => 'Pre requisito',
            
        ],
    ],

    'disciplina' => [
        'title' => 'Disciplinas',

        'actions' => [
            'index' => 'Disciplinas',
            'create' => 'New Disciplina',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'sigla' => 'Sigla',
            'numCreditos' => 'NumCreditos',
            'FK_idTurma' => 'FK idTurma',
            'FK_idProfessor' => 'FK idProfessor',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];