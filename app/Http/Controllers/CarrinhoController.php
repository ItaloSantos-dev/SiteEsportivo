<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Variacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addAoCarrinho($id){
        $itemBuscado = Produto::find($id);
        $variacao = Variacao::where('produto_id', '=', $id)->first();
        if(Auth::guard('web')->check()){
            if($variacao){
            $carrinho = session('carrinho',[]);
            $valorfinal = 0;
            if(isset($carrinho[$id])){
                if($carrinho[$id]['qtd']==$variacao->estoque){
                    return redirect()->route('carrinho.index')->with('info', 'Quantidade disponível atingida');
                    
                }
                else{
                    $carrinho[$id]['qtd']+=1;
                }
                
            }
            else{
                $carrinho[$id]['produto']=[
                    'id'=>$itemBuscado->id,
                    'nome'=>$itemBuscado->nome,
                    'imagem'=>$itemBuscado->imagem,
                    'preco'=>$variacao->preco,
                    'variacao_id'=>$variacao->id



                ];
                $carrinho[$id]['qtd']=1;  
            }
            foreach ($carrinho as $item){
                $valorfinal += $item['qtd']*$item['produto']['preco'];
            }
            session()->put('carrinho',$carrinho);
            session()->put('valorfinal',$valorfinal);

            return redirect()->route('carrinho.index')->with('info', 'produto adicionado com sucesso');
            }
            else{
                return redirect()->route('carrinho.index')->with('info', 'erro');

            }
        }
        else{
          return redirect()->route('usuarios.login')->with('info', 'Você precisa fazer login para ver seu adicionar itens ao carrinho');  
        }
    }

    public function removerDoCarrinho($id){

        $carrinho = session()->get('carrinho',[]);
        $valorfinal = session()->get('valofinal',0);
        

        if($carrinho[$id]['qtd']>1){
            $carrinho[$id]['qtd']-=1;
        }
        else{
            unset($carrinho[$id]);
        }

        foreach ($carrinho as $item){
            $valorfinal += $item['qtd']*$item['produto']['preco'];
        }
        
        session()->put('carrinho', $carrinho);
        session()->put('valorfinal', $valorfinal);

        return redirect()->route('carrinho.index')->with('info', 'produto removido com sucesso');
    }

    public function limparCarrinho(){
        session()->forget('carrinho');
        session()->forget('valorfinal');

        return redirect()->route('carrinho.index');


    }

    public function index()
    {
        if(Auth::guard('web')->check()){
            return view('carrinho');
        }
        else {
            return redirect()->route('usuarios.login')->with('info', 'Você precisa fazer login para ver seu carrinho');
        }
        
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
