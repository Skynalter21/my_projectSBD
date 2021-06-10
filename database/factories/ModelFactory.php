<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Universidade::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Professor::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Professor::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'nascimento' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Diretor::class, static function (Faker\Generator $faker) {
    return [
        'FK_idDiretor' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Faculdade::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'sigla' => $faker->sentence,
        'bloco' => $faker->sentence,
        'numAlunos' => $faker->randomNumber(5),
        'numProfessor' => $faker->randomNumber(5),
        'orcamento' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Turma::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Turma::class, static function (Faker\Generator $faker) {
    return [
        'semestre' => $faker->randomNumber(5),
        'FK_local' => $faker->randomNumber(5),
        'faculdade_id' => $faker->randomNumber(5),
        'numProfessores' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Aluno::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'nascimento' => $faker->date(),
        'telefone' => $faker->sentence,
        'faltas' => $faker->randomNumber(5),
        'cra' => $faker->randomFloat,
        'FK_idTurma' => $faker->randomNumber(5),
        'FK_idOrientador' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PreRequisito::class, static function (Faker\Generator $faker) {
    return [
        'FK_idDisciplina' => $faker->randomNumber(5),
        'pre_requisito' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Disciplina::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'sigla' => $faker->sentence,
        'numCreditos' => $faker->randomNumber(5),
        'FK_idTurma' => $faker->randomNumber(5),
        'FK_idProfessor' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
