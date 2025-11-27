<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartamentModel extends Model
{
    protected $table='departament';
    protected $fillable=['nom'];

    public function empleats(){
        return $this->hasMany(EmpleatModel::class, 'dpt_id');
    }
}




