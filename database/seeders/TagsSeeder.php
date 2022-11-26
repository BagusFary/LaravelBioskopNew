<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'creepy'],
            ['name' => 'ghost'],
            ['name' => 'war'],
            ['name' => 'love'],
            ['name' => 'superhero'],
            ['name' => 'fiction']
        ];
        
        foreach ($data as $value) {
            Tag::create([
                'name' => $value['name']
            ]);
        }
    }
}
