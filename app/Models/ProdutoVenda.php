<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoVenda extends Model
{
    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
