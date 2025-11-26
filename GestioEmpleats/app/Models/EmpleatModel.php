<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleatModel extends Model
{
    protected $table='empleat';
    protected $fillable=['nom','dpt_id'];

    public function departament(){
        return $this->belongsTo(DepartamentModel::class, 'dpt_id');
    }

}
