<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create([
            'nombre'=>'Barcelona',
            'pais'=>'España',
            'poblacion'=>1600000
        ]);
        Ciudad::create([
            'nombre'=>'Madrid',
            'pais'=>'España',
            'poblacion'=>3200000
        ]);
        Ciudad::create([
            'nombre'=>'Valencia',
            'pais'=>'España',
            'poblacion'=>790000
        ]);
        Ciudad::create([
            'nombre'=>'París',
            'pais'=>'Francia',
            'poblacion'=>2100000
        ]);
    }
}
