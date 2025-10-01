@extends('layout.main')
@section('title', 'Carrinho')

@section('content')
<style>
    .max-img-car{
        max-height: 50px;
    }
    #carrinho{
        overflow-y: scroll;
        max-height: 50vh;

    }
    #confirmar{
        min-height: 30vh;
        z-index: 1200;
        left: -50%;
        transition-duration: .3s ;

    }
</style>

<form action="{{route('vendas.store')}}" method="post" id="confirmar" class="container border shadow rounded bg-light position-absolute  top-50 translate-middle text-center ">
    @csrf
    <div class="row m-2">
        <h1>Confirmar Compra</h1>
        <h2>Valor total: R$ {{session('valorfinal')??0}}</h2>
    </div>

    <div class="row m-2">
        <div class="col">
            <label class="btn btn-primary" for="pix">PIX</label><br>
            <input type="radio" onfocus="enableConfi(1)" value="pix" name="forma" id="pix">
        </div>

        <div class="col">
            <label class="btn btn-primary" for="credito">Credito</label><br>
            <input type="radio" onfocus="enableConfi(1)" value="credito" name="forma" id="credito">
        </div>
        <div class="col">
            <label class="btn btn-primary" for="debito">Debito</label><br>
            <input type="radio" onfocus="enableConfi(1)" value="debito" name="forma" id="debito">
        </div>

        <div class="col">
            <label class="btn btn-primary" for="dinheiro">Dinheiro</label><br>
            <input type="radio" onfocus="enableConfi(1)" value="dinheiro" name="forma" id="dinheiro">
        </div>
    </div>

    <div class="row m-2">
        <div class="col">
            <input class="btn btn-success" type="submit" id="btnconf" disabled value="confirmar">
        </div>
        <div class="col">
            <button class="btn btn-danger" type="button" onclick="mostrardiv(0)">Voltar</button>
        </div>
    </div>
</form>

<div class="container text-center border p-2 z-0">
    <div class="row sticky-top ">
        <form action="" class="col">
            <input  type="button" onclick="mostrardiv(1)" value="Confirmar compra" class="btn btn-success">
        </form>
        <div class="col z-0">
            <h1>Carrinho</h1>
        </div>
        <form action="{{route('carrinho.limparcarrinho')}}" method="post" class="col">
            @csrf
            <input type="submit" value="Limpar carrinho" class="btn btn-danger">
        </form>
    </div>
</div>

<div id="carrinho" class="container  text-center gap-0">
    @if(session()->has('info'))
        <div class="row">
            <div class="col">{{session('info')}}</div>
        </div>
    @endif
    @if(session()->has('carrinho'))
    <div class="row ">
        <div class="col"><strong>NOME</strong></div>
        <div class="col"><strong>PREÇO(UN)</strong></div>
        <div class="col"><strong>QUANTIDADE</strong></div>
        <div class="col"><strong>VALOR TOTAL</strong></div>
        <div class="col"></div>
    </div>
        @foreach (session('carrinho') as $produto)
            <div class="row border p-2  gap-0 ">
                <div class="col">
                    {{$produto['produto']['nome']}} 
                </div>
                <div class="col">
                    R$ {{$produto['produto']['preco']}}
                </div>
                <div class="col">
                    {{$produto['qtd']}} 
                </div>
                <div class="col">
                    R$ {{$produto['produto']['preco']*$produto['qtd']}}
                </div>
                <div class="col">
                    <img class="max-img-car" src="{{$produto['produto']['imagem']}}" alt="">
                </div>
                <div class="col d-flex">
                    <form action="{{route('carrinho.addaocarrinho', $produto['produto']['id'])}}" method="post">
                        @csrf
                        <button type="submit" class="m-1  bi bi-plus btn btn-primary"></button>
                    </form>
                    <form action="{{route('carrinho.removerdocarrinho', $produto['produto']['id'])}}" method="post">
                        @csrf
                        <button type="submit" class="m-1 bi bi-dash btn btn-danger"></button>
                    </form>
                </div>
            </div>
        @endforeach
    <div class="row border mt-3">
        <div class="col">
            Valor Final: {{session('valorfinal')??0}}
        </div>
    </div>
    @else
        <h5>Nada aqui</h5>
        <img style="height: 22vh;" src="https://arubrasil.com.br/site/images/empty_cart.gif" alt="">
    @endif
</div>

<script>
    function mostrardiv(acao){
        let div = document.getElementById('confirmar');
        if(acao==1){
            div.style.left="50%";
        }
        else{
            div.style.left="-50%";

        }
    }
    function enableConfi(acao){
        let btnconf = document.getElementById('btnconf');
        if(acao==1){
            btnconf.disabled=false;
        }
        else{
            btnconf.disabled=true;
        }

    }
</script>

@endsection


