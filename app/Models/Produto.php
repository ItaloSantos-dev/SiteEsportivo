<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public function variacoes(){
        return $this->hasMany(Variacao::class)->orderBy('preco', 'asc');
    }
    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }
}
