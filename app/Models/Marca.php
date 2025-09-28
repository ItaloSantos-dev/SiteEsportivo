<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
