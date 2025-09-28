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
</style>
<div class="container text-center border p-2">
    <div class="row sticky-top ">
        <form action="" class="col">
            <input type="submit" value="Confirmar compra" class="btn btn-success">
        </form>
        <div class="col">
            <h1>Carrinho</h1>
        </div>
        <form action="{{route('carrinho.limparcarrinho')}}" method="post" class="col">
            @csrf
            <input type="submit" value="Limpar carrinho" class="btn btn-danger">
        </form>
    </div>
</div>

<div id="carrinho" class="container  text-center gap-0">
    
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
    @else
        <p>O carrinho esta vazio</p>

    
    @endif
</div>



@endsection


