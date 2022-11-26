<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Movie::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['judul' => 'Black Adam', 
            'deskripsi' => 'In ancient Kahndaq, Teth Adam was bestowed the almighty powers of the gods. After using these powers for vengeance, he was imprisoned, becoming Black Adam. Nearly 5,000 years have passed, and Black Adam has gone from man to myth to legend. Now free, his unique form of justice, born out of rage, is challenged by modern-day heroes who form the Justice Society: Hawkman, Dr. Fate, Atom Smasher and Cyclone.', 
            'genre_id' => 4, 
            'image' => 'S3QEfSH52yV03hJhvM0WmMAQbKd0GFHvlDX3gFbo.jpg',
            'tahun' => '2022-10-12'],

            ['judul' => 'See For Me', 
            'deskripsi' => 'Sekelompok pencuri mendobrak masuk ke rumah mewah dan terpencil yang Sophie tempati. Sophie, mantan pemain ski tunanetra, harus bergantung pada Kelly, seorang veteran tentara yang tinggal di seluruh negeri, untuk membantunya melawan.', 
            'genre_id' => 1, 
            'image' => 'EEJF8IIsb1WO1et8r8eo8yOZnMTAtjLbXKisuCdm.jpg',
            'tahun' => '2021-10-12']

        ];
        
        foreach ($data as $value) {
            Movie::create([
                'judul' => $value['judul'], 
                'deskripsi' => $value['deskripsi'],
                'genre_id' => $value['genre_id'],
                'image' => $value['image'],
                'tahun' => Carbon::parse($value['tahun'],)
            ]);
        }
    }
}
