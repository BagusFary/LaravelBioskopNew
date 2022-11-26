<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Genre::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Horror'],
            ['name' => 'Comedy'],
            ['name' => 'Romance'],
            ['name' => 'Action']
        ];
        
        foreach ($data as $value) {
            Genre::create([
                'name' => $value['name']
            ]);
        }
    }
}
