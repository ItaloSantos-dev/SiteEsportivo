<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoVenda;
use App\Models\Variacao;
use App\Models\Venda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        if(session()->has('carrinho')){
            if(session('valorfinal')>0){
                $novavenda = new Venda();
                $novavenda ->valor_final=session('valorfinal');
                $novavenda ->forma=$request->input('forma');
                $novavenda ->data=now();
                $novavenda ->usuario_id=Auth::id();
                $novavenda->save();

                $carrinho=session('carrinho');
                foreach($carrinho as $produto){
                    $variacao=Variacao::find($produto['produto']['variacao_id']);
                    $variacao->estoque-=$produto['qtd'];
                    $variacao->save();

                    $produtovenda = new ProdutoVenda();
                    $produtovenda->venda_id = $novavenda->id;
                    $produtovenda ->usuario_id=Auth::id();
                    $produtovenda->produto_id = $produto['produto']['id'];
                    $produtovenda->quantidade = $produto['qtd'];
                    $produtovenda->valor_unitario = $produto['produto']['preco'];
                    $produtovenda->valor_final = $produto['produto']['preco']*$produto['qtd'];
                    $produtovenda->save();
                }
                session()->put('carrinho');
                session()->put('valorfinal');

                return redirect()->route('carrinho.index')->with('info', 'Compra Concluida com sucesso');
            }
            else{
                return redirect()->route('carrinho.index')->with('info', 'Adicione itens ao carrinho para efetuar uma compra');
            }
        }
        else{
            return redirect()->route('carrinho.index')->with('info', 'o carrinho não existe');
        }
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
