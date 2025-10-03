<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\Subcategoria;
use App\Models\Variacao;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function esportes(){
        $powerliftingProds = Produto::where('subcategoria_id', 9)->with('variacoes')->get();

        return view('esportes', compact('powerliftingProds'));

    }

    public function filtrocategorias(){
        $nutricao = Produto::whereHas('subcategoria', function($q){
            $q->where('categoria_id',1);
        })->with('variacoes')->get();
        $vestiario = Produto::whereHas('subcategoria', function($q){
            $q->where('categoria_id', 2);
        })->get();
        $farmacos=Produto::whereHas('subcategoria', function($q){
            $q->where('categoria_id', 3);
        })->get();
        $ergogenicos=Produto::whereHas('subcategoria', function($q){
            $q->where('categoria_id', 4);
        })->get();

        return view('filtrocategorias', [
            'nutricao'=>$nutricao,
            'vestiario'=>$vestiario,
            'farmacos'=>$farmacos,
            'ergogenicos'=>$ergogenicos
        ]);
    }



    public function filtromarcas(){
        $growth = Produto::where('marca_id', 1)->with('variacoes')->get();
        $darknes = Produto::where('marca_id', 2)->with('variacoes')->get();
        $mith = Produto::where('marca_id', 3)->with('variacoes')->get();
        $max = Produto::where('marca_id', 4)->with('variacoes')->get();
        $integral = Produto::where('marca_id', 5)->with('variacoes')->get();


        return view('filtromarcas', [
            'growth'=>$growth,
            'darknes'=>$darknes,
            'mith'=>$mith,
            'max'=>$max,
            'integral'=>$integral,
        ]);

    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
