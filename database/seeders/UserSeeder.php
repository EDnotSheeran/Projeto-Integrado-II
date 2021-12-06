<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Edson Rodrigues',
            'username' => 'EDnotSheeran',
            'email' => 'edson.junior@aluno.ifsp.edu.br',
            'password' => '$2y$10$sCUtOkRlHQ8S7vbjhmZh1O2ihtdD8HxLMl4uAjGjGUahc70VOrnuO',
            'cpf' => '81469310066',
            'role' => 'admin',
        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
