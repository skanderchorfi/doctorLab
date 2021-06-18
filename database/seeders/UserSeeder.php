<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++)
        {
            User::create([
                'name' => $faker->userName,
                'email' => "user-$i@example.com",
                'password' => Hash::make('password')
            ]);
        }
    }
}
