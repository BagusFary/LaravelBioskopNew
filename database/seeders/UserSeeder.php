<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Admin', 'role_id' => 1, 'email' => 'admin@gmail.com', 'password' => '123'],
            ['name' => 'User', 'role_id' => 2, 'email' => 'user@gmail.com', 'password' => '123']
        ];

        foreach ($data as $value) {
            
        User::create([
            'name' => $value['name'],
            'role_id' => $value['role_id'],
            'email' => $value['email'],
            'password' => Hash::make($value['password'])
        ]);
        }
    }
}
