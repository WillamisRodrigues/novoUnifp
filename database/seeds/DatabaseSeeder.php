<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
        DB::table('users')->insert([
            'name' => 'unifp',
            'email' => 'unifp@gmail.com',
            'password' => bcrypt('123456'),
            'nivelAcesso' => 0,
            'unidadeEscolar' => 0,
            'nascimento' => '2023/10/10',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('dias_vencimento')->insert([
            'diaVencimento' => 8,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('escolaridade')->insert([
            'Escolaridade' => '1º Ano Ensino Médio',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('como_conheceu')->insert([
            'ComoConheceu' => 'Facebook',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('funcionario')->insert([
            'Nome' => 'Vendendor Seed',
            'Nascimento' => $date,
            'EstadoCivil' => 'Solteiro',
            'Celular' => '(00) 00000-0000',
            'TelefoneFixo' => '(00) 0000-0000',
            'Email' => 'vendedor@seed.com',
            'Cargo' => 'Vendedor',
            'Setor' => 'Seed',
            'Inativo' => 'Nao',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('funcionario')->insert([
            'Nome' => 'Professor Seed',
            'Nascimento' => $date,
            'EstadoCivil' => 'Solteiro',
            'Celular' => '(00) 00000-0000',
            'TelefoneFixo' => '(00) 0000-0000',
            'Email' => 'professor@seed.com',
            'Cargo' => 'Professor',
            'Setor' => 'Seed',
            'Inativo' => 'Nao',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('curso')->insert([
            'nomeCurso' => 'Curso Seed',
            'QtdeAulas' => 10,
            'CargaHoraria' => 10,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('turma')->insert([
            'idCurso' => '1',
            'NomeTurma' => '1',
            'DiasDaSemana' => $date,
            'Periodo' => 'Tarde',
            'Horario' => '15:14:15',
            'DataInicio' => $date,
            'DataTermino' => $date,
            'DuracaoAulas' => '123',
            'Professor' => 'Professor Seed',
            'Vagas' => 123,
            'Cronograma' => '123',
            'Status' => 'Ativa',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('formas_pagamento')->insert([
            'QtdeParcelas' => 10,
            'BrutoTotal' => 100,
            'ParcelaBruta' => 10,
            'DescontoPontualidade' => 1,
            'ParcelaDescontoPontualidade' => 9,
            'ValorTotalDesconto' => 90,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
