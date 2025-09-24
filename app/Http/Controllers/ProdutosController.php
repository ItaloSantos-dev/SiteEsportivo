<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wheys = Produto::where('subcategoria_id', 1)->get();
        $roupas = Produto::where('subcategoria_id', 2)->get();
        $farmacos = Produto::where('subcategoria_id', 3)->get();
        $artigos = Produto::where('subcategoria_id', 4)->get();
        return view('index', [
            'wheys'=>$wheys,
            'roupas'=>$roupas,
            'farmacos'=>$farmacos,
            'artigos'=>$artigos

        ]);



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
