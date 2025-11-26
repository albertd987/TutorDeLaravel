<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    
    /*aqui especifiquem el nom de la taula xq aquest no segueix la convenció de plurals de laravel,
    la qual seria 'ciudads', al haver-lo modificat s'ha d'especificar a on apunta la taula, ja que és un model eloquent*/
    protected $table = 'ciudades'; 

    /*$fillable fa que els camps que s'especifiquen si que puguin ser assignats de forma massiva amb el create o update pel seeder, 
    sinò donarà error. És una llista blanca */
    protected $fillable = ['nombre', 'pais_id', 'poblacion'];

    public function pais(){
        return $this->belongsTo(Pais::class, 'pais_id');
    }

}
