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
        // $this->call(UsersTableSeeder::class);
            DB::table('users')->insert([
            'name' => 'unifp',
            'email' => 'unifp@gmail.com',
            'password' => bcrypt('123456'),
            'nivelAcesso' => 0,
            'unidadeEscolar' => 0,
            'nascimento' => '2023/10/10'
        ]);
    }
}
