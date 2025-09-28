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
        min-height: 50vh;
        min-width: 50vw;
        z-index: 1200;
        display: none;
    }
</style>

<form action="{{route('vendas.store')}}" method="post" id="confirmar" class="container bg-secondary position-absolute start-50 top-50 translate-middle text-center p-2">
    @csrf
    <div class="row">
        <div class="col">
            <button type="button" onclick="mostrardiv(0)">Voltar</button>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="pix">PIX</label><br>
            <input type="radio" value="pix" name="forma" id="pix">
        </div>

        <div class="col">
            <label for="credito">Credito</label><br>
            <input type="radio" value="credito" name="forma" id="credito">
        </div>
        <div class="col">
            <label for="debito">Debito</label><br>
            <input type="radio" value="debito" name="forma" id="debito">
        </div>

        <div class="col">
            <label for="dinheiro">Dinheiro</label><br>
            <input type="radio" value="dinheiro" name="forma" id="dinheiro">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="submit" value="confirmar">
        </div>
    </div>
</form>

<div class="container text-center border p-2 z-0">
    <div class="row sticky-top ">
        <form action="" class="col">
            <input type="button" onclick="mostrardiv(1)" value="Confirmar compra" class="btn btn-success">
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
    <div class="row">
        <div class="col"><strong>NOME</strong></div>
        <div class="col"><strong>PREÇO(UN)</strong></div>
        <div class="col"><strong>QUANTIDADE</strong></div>
        <div class="col"><strong>VALOR TOTAL</strong></div>
        <div class="col"></div>
    </div>
        @foreach (session('carrinho') as $produto)
            <div class="row border  gap-0 ">
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
            </div>
        @endforeach
    <div class="row border mt-3">
        <div class="col">
            Valor Final: {{session('valorfinal')}}
        </div>
    </div>
    @else
        <p>O carrinho esta vazio</p>
    @endif
</div>

<script>
    function mostrardiv(acao){
        let div = document.getElementById('confirmar');
        if(acao==1){
            div.style.display="block";
        }
        else{
            div.style.display="none";

        }
    }
</script>

@endsection


