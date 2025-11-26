<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create(['nombre'=>'España','codigo'=>'ESP']);
        Pais::create(['nombre'=>'Francia','codigo'=>'FRA']);
        Pais::create(['nombre'=>'Italia','codigo'=>'ITA']);
        Pais::create(['nombre'=>'Alemania','codigo'=>'DEU']);
        Pais::create(['nombre'=>'Portugal','codigo'=>'PRT']);
    
    
    }
}
