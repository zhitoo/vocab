<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Hossein Shafee',
            'email' => 'hshafiei374@gmail.com',
            'password' => '123456'
        ]);
    }
}
