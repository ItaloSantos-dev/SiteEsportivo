@extends('layout.main')
@section('title', 'Login')
@section('content')
<style>
    #caixa{
        max-width: 50vw;
    }
</style>
<div id="caixa" class="container text-center border rounded shadow p-3">
    <form class="" action="{{route('usuarios.store')}}" method="post">
        @csrf
        @if(session()->has('info'))
            <p>{{session('info')}}</p>
        @endif
        <div class="row">
            <label class="form-label" for="nome">Nome:</label>
        </div>

        <div class="row justify-content-center">
            <input oninput="ativarBtnEntrar()" class="form-control w-75" type="text" name="nome" id="nome">
        </div>
        <div class="row">
            <label class="form-label" for="email">Email:</label>
        </div>

        <div class="row justify-content-center">
            <input oninput="ativarBtnEntrar()" class="form-control w-75" type="email" name="email" id="email">
        </div>
        <div class="row">
            <label class="form-label " for="password">Senha:</label>
        </div>

        <div class="row justify-content-center">
            <input oninput="ativarBtnEntrar()" class="form-control w-75" type="password" name="password" id="senha">
        </div>


<!--aqui -->
        <div class="row">
            <label class="form-label" for="telefone">Telefone:</label>
        </div>
        <div class="row justify-content-center">
            <input oninput="ativarBtnEntrar()" class="form-control w-75" type="tel" name="telefone" id="telefone">
        </div>
        

        <div class="row mt-3">
            <div class="col">
                <input id="btnregistrar" disabled type="submit" value="Registrar" class="btn btn-primary">
            </div>
        </div>
    </form>

    <script>
        function ativarBtnEntrar(){
            let email = document.getElementById('email').value;
            let senha = document.getElementById('senha').value;
            let telefone = document.getElementById('telefone').value;
            let nome = document.getElementById('nome').value;


            let btnRegistrar = document.getElementById('btnregistrar');
            if(email!=="" && senha!==""&& telefone!==""&& nome!==""){
                btnRegistrar.disabled=false;
            }
            else{
                btnRegistrar.disabled=true;
            }

        }
    </script>
</div>
@endsection