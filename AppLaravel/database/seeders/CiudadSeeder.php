<?php

namespace Database\Seeders;

use App\Models\Pais;
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
        //obtenir paisos

        $españa=Pais::where('nombre','España')->first();
        $francia=Pais::where('nombre','Francia')->first();
        $italia=Pais::where('nombre','Italia')->first();

        //Crear ciutats espanyoles
        Ciudad::create([
            'nombre'=>'Barcelona',
            'pais_id'=>$españa->id,
            'poblacion'=>1600000
        ]);
        Ciudad::create([
            'nombre'=>'Madrid',
            'pais_id'=>$españa->id,
            'poblacion'=>3200000
        ]);
        Ciudad::create([
            'nombre'=>'Valencia',
            'pais_id'=>$españa->id,
            'poblacion'=>790000
        ]);

        //Ciutats franceses
        Ciudad::create([
            'nombre'=>'París',
            'pais_id'=>$francia->id,
            'poblacion'=>2100000
        ]);

        Ciudad::create([
            'nombre'=>'Lyon',
            'pais_id'=>$francia->id,
            'poblacion'=>513000
        ]);

        //Ciutat italiana

        Ciudad::create([
            'nombre'=>'Lyon',
            'pais_id'=>$italia->id,
            'poblacion'=>280000
        ]);
        //
    }
}
