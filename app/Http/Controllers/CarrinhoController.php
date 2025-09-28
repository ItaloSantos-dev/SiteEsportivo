<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Variacao;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addAoCarrinho($id){
        $itemBuscado = Produto::find($id);
        $variacao = Variacao::where('produto_id', '=', $id)->first();
        if($variacao){
            $carrinho = session('carrinho',[]);
            if(isset($carrinho[$id])){
                $carrinho[$id]['qtd']+=1;
            }
            else{
                $carrinho[$id]['produto']=[
                    'id'=>$itemBuscado->id,
                    'nome'=>$itemBuscado->nome,
                    'imagem'=>$itemBuscado->imagem,
                    'preco'=>$variacao->preco,

                ];
                $carrinho[$id]['qtd']=1;  
            }
            session()->put('carrinho',$carrinho);
            return redirect()->route('carrinho.index')->with('info', 'produto adicionado com sucesso');
        }
        else{
            return redirect()->route('carrinho.index')->with('info', 'erro');

        }
    }

    public function limparCarrinho(){
        session()->forget('carrinho');
        return redirect()->route('carrinho.index');


    }

    public function index()
    {
        return view('carrinho');
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
