<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ClientSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 3000; $i++) {
            $this->db->table('clients')->insert($this->generateCruds());
        }
    }

    public function generateCruds(): array
    {
        $faker = Factory::create();

        return [
            'name'  => $faker->name(),
            'email' => $faker->unique()->email(),
            'saldo' => 10000,
        ];
    }

}
