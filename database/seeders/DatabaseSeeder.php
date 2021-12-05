<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            0 => ['Elettronica ed Informatica',  'Electronics and IT', 'Electrónica y TI'],
            1 => ['Arredamento',  'Furniture', 'Mobiliario'],
            2 => ['Giardino',  'Garden', 'Jardín'],
            3 => ['Moda',  'Fashion', 'Moda'],
            4 => ['Videogiochi e Console',  'Video Games and Consoles', 'Videojuegos y consolas'],
            5 => ['Libri',  'Books', 'Libros'],
            6 => ['Film e TV',  'Movies and TV', 'Películas y TV'],
            7 => ['Musica',  'Music', 'Música'],
            8 => ['Motori',  'Engines', 'Motores'],
            9 => ['Animali',  'Animals', 'Animales'],
        ];

        foreach($categories as $category){
            DB::table('categories')->insert([
                'it' => $category[0],
                'en' => $category[1],
                'es' => $category[2],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
