<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Produto;
use App\Models\Subcategoria;
use App\Models\Variacao;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $wheys = Produto::where('subcategoria_id', 1)->with('variacoes')->get();
        $camisas = Produto::where('subcategoria_id', 2)->with('variacoes')->get();
        $multivitaminas = Produto::where('subcategoria_id', 3)->with('variacoes')->get();
        $pretreinos = Produto::where('subcategoria_id', 4)->with('variacoes')->get();
        return view('index', compact('wheys', 'camisas', 'multivitaminas', 'pretreinos'));
    }
}
