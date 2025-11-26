<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais';
    protected $fillable=['nombre','codigo'];

    //afegim la relació al model; un pais te múltiples ciutats
    public function ciudades(){
        return $this->hasMany(Ciudad::class,'pais_id');
    }
    use HasFactory;
}
