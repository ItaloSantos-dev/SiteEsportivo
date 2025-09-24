@extends('layout.main')
@section('title', 'Login')
@section('content')
<style>
    #caixa{
        max-width: 50vw;
    }
</style>
<div id="caixa" class="container text-center border rounded shadow p-3">
    <div class="row">
        <div class="col">
            @if(session()->has('info'))
                <p class="text-black">{{session('info')}}</p>
            @endif
            @if($errors->has('email'))
                <div class="text-black">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
    </div>
    <form class="" action="{{route('usuarios.validarlogin')}}" method="post">
        @csrf
        <div class="row">
            <label class="form-label" for="email">Email:</label>
        </div>

        <div class="row justify-content-center">
            <input oninput="ativarBtnEntrar()" class="form-control w-75" type="email" name="email" id="email">
        </div>
        <div class="row">
            <label class="form-label " for="senha">Senha:</label>
        </div>

        <div class="row justify-content-center">
            <input oninput="ativarBtnEntrar()" class="form-control w-75" type="password" name="password" id="password">
        </div>

        <div class="row mt-3">
            <div class="col">
                <input id="btnentrar" disabled type="submit" value="Entrar" class="btn btn-primary">
            </div>
            <div class="col">
                <a href="{{route('usuarios.create')}}" class="btn btn-secondary">Registrar</a>
            </div>
        </div>
    </form>

    <script>
        function ativarBtnEntrar(){
            let email = document.getElementById('email').value;
            let senha = document.getElementById('password').value;
            let btnEntrar = document.getElementById('btnentrar');
            if(email!=="" && senha!==""){
                btnEntrar.disabled=false;
            }
            else{
                btnEntrar.disabled=true;
            }

        }
    </script>
</div>
@endsection