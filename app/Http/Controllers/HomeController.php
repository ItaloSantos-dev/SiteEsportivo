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
        $subcategorias = Subcategoria::find(1);//wheys
        $wheys = $subcategorias->produtos()->with('variacoes')->get();
        
        $subcategorias = Subcategoria::find(2);//camisas
        $camisas = $subcategorias->produtos()->with('variacoes')->get();

        $subcategorias = Subcategoria::find(3);//camisas
        $multivitaminas = $subcategorias->produtos()->with('variacoes')->get();

        return view('index', [
            'wheys'=>$wheys,
            'camisas'=>$camisas,
            'multivitaminas'=> $multivitaminas
        ]);
    }
}
