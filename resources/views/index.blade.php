@extends('layout.main')
@section('title', 'Página principal')

<style>
    .min-vh-55 {
        min-height: 50vh !important;
    }


</style>
@section('content')
    <main>
        <!-- wheys -->
        <div class="container text-center">
            <h1 class="">Wheys</h1>
            <div class="row">
                @foreach($wheys as $whey)
                    <div class="col-md-2">
                        <div class="card ">
                            <img src="{{$whey->imagem}}" alt="" class="card-img-top ">
                            <div class="card-body ">
                                <div class="card-title">{{$whey->nome}}</div>
                                <div class="card-title">{{floor($whey->variacoes->first()->quantidade)}} {{$whey->variacoes->first()->unidade}}</div>
                                <h5 class="card-text">R$: {{$whey->variacoes->first()->preco}}</h5>
                            </div>
                            <div class="card-footer">
                                <form action="{{route('carrinho.addaocarrinho', $whey->id)}}" method="post">
                                    @csrf
                                    <input type="submit" value="Comprar" class="btn btn-success w-100">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- camisas -->
        <div class="container  text-center">
            <h1 class="">Camisas</h1>
            <div class="row">
                @foreach($camisas as $camisa)
                    <div class="col-md-2">
                        <div class="card ">
                            <img src="{{$camisa->imagem}}" alt="" class="card-img-top ">
                            <div class="card-body ">
                                <div class="card-title">{{$camisa->nome}}</div>
                                <div class="card-title">{{$camisa->variacoes->first()->tamanho}} {{$camisa->variacoes->first()->unidade}}</div>
                                <h5 class="card-text">R$: {{$camisa->variacoes->first()->preco}}</h5>
                            </div>
                            <div class="card-footer">
                                <form action="{{route('carrinho.addaocarrinho', $camisa->id)}}" method="post">
                                    @csrf
                                    <input type="submit" value="Comprar" class="btn btn-success w-100">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- multivatiminas -->
        <div class="container  text-center">
            <h1 class="">Multivitaminas</h1>
            <div class="row">
                @foreach($multivitaminas as $multivitamina)
                    <div class="col-md-2">
                        <div class="card ">
                            <img src="{{$multivitamina->imagem}}" alt="" class="card-img-top ">
                            <div class="card-body ">
                                <div class="card-title">{{$multivitamina->nome}}</div>
                                <div class="card-title">{{$multivitamina->variacoes->first()->tamanho}} {{$multivitamina->variacoes->first()->unidade}}</div>
                                <h5 class="card-text">R$: {{$multivitamina->variacoes->first()->preco}}</h5>
                            </div>
                            <div class="card-footer">
                                <form action="{{route('carrinho.addaocarrinho', $multivitamina->id)}}" method="post">
                                    @csrf
                                    <input type="submit" value="Comprar" class="btn btn-success w-100">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </main>

@endsection