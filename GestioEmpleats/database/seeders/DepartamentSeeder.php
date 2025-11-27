<?php

namespace Database\Seeders;

use App\Models\DepartamentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartamentModel::create(['nom'=>'Compres']);
        DepartamentModel::create(['nom'=>'Ventes']);
    }
}
