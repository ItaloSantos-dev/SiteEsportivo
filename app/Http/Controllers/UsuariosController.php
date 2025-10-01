<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Venda;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function login(){
        return view('login');
    }




    public function validarLogin (Request $request){
        $dadosValidados = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string|min:6',
        ]);

        if(Auth::guard('web')->attempt([
            'email'=>$dadosValidados['email'],
            'password'=>$dadosValidados['password'],
        ])){
            return redirect()->route('paginainicial');
        }
        else{
            return back()->with('info', 'E-mail ou senha incorretos')->onlyInput('email');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        session()->forget('carrinho');
        return redirect()->route('paginainicial');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:30',
            'email' => 'required|email|unique:usuarios,email',
            'password'=> 'required|string|min:6',
            'telefone'=>'required|digits_between:10,11',
        ]);

        $usuario->nome = $dadosValidados['nome'];
        $usuario->email = $dadosValidados['email'];
        $usuario->password=bcrypt($dadosValidados['password']);
        $usuario->telefone = $dadosValidados['telefone'];
        $usuario->tipo = "cliente";

        $usuario->save();
        return redirect()->route('usuarios.login')->with('info', 'Cadastro feito com sucesso, agora efetue login!');

        

    }

    public function verCompras(){

        if(Auth::guard('web')->check()){
            $compras = Venda::where('usuario_id', Auth::id())->with('produtosComprados.produto')->get();
            return view('compras', compact('compras'));
        }
        else{
            return redirect()->route('usuarios.login')->with('info', 'Você precisa fazer login');
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
