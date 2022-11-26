<?php

namespace Database\Seeders;

use App\Models\MovieTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        MovieTag::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['movie_id' => 1, 'tag_id' => 5],
            ['movie_id' => 1, 'tag_id' => 6],
            ['movie_id' => 1, 'tag_id' => 3],
            ['movie_id' => 2, 'tag_id' => 1],
            ['movie_id' => 2, 'tag_id' => 2],
            
            
        ];
        
        foreach ($data as $value) {
            MovieTag::create([
                'movie_id' => $value['movie_id'],
                'tag_id' => $value['tag_id']
            ]);
        }
    }
}
