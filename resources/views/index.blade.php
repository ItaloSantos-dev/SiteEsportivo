@extends('layout.main')
@section('title', 'Página principal')

<style>
    .min-vh-55 {
        min-height: 50vh !important;
    }
    .card-img-top {
    height: 150px;       
    object-fit: cover;  
}



</style>
@section('content')
    <main>
        <!-- wheys -->
        <div class="container py-4 ">
            <h1 class="text-center mb-4 fw-bold">Wheys</h1>
            <div class="row g-4 flex-nowrap overflow-scroll">
                @foreach($wheys as $whey)
                    @if($whey->variacoes->first()->estoque > 0)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                            <div class="card shadow-sm rounded-3 w-100 d-flex flex-column h-100">
                                
                                <img src="{{$whey->imagem}}" alt="{{$whey->nome}}" 
                                    class="card-img-top p-3"
                                    style="height: 200px; object-fit: contain;">

                                
                                <div class="card-body d-flex flex-column text-center">
                                    <h5 class="card-title fw-semibold">{{$whey->nome}}</h5>
                                    <p class="text-muted mb-1">
                                        {{floor($whey->variacoes->first()->quantidade)}} {{$whey->variacoes->first()->unidade}}
                                    </p>
                                    <h4 class="text-success fw-bold mb-3">
                                        R$ {{number_format($whey->variacoes->first()->preco, 2, ',', '.')}}
                                    </h4>

                                    
                                    <form action="{{route('carrinho.addaocarrinho', $whey->id)}}" method="post" class="mt-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold">
                                            <i class="bi bi-cart-fill me-2"></i> Comprar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


        <!-- camisas -->
        <div class="container py-4">
            <h1 class="text-center mb-4 fw-bold">Camisas</h1>
            <div class="row g-4 flex-nowrap overflow-scroll">
                @foreach($camisas as $camisa)
                    @if($camisa->variacoes->first()->estoque > 0)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                            <div class="card shadow-sm rounded-3 w-100 d-flex flex-column h-100">
                               
                                <img src="{{$camisa->imagem}}" alt="{{$camisa->nome}}" 
                                    class="card-img-top p-3"
                                    style="height: 200px; object-fit: contain;">

                                
                                <div class="card-body d-flex flex-column text-center">
                                    <h5 class="card-title fw-semibold">{{$camisa->nome}}</h5>
                                    <p class="text-muted mb-1">
                                        {{($camisa->variacoes->first()->tamanho)}} 
                                    </p>
                                    <h4 class="text-success fw-bold mb-3">
                                        R$ {{number_format($camisa->variacoes->first()->preco, 2, ',', '.')}}
                                    </h4>

                                    
                                    <form action="{{route('carrinho.addaocarrinho', $camisa->id)}}" method="post" class="mt-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold">
                                            <i class="bi bi-cart-fill me-2"></i> Comprar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- multivatiminas -->
        <div class="container py-4">
            <h1 class="text-center mb-4 fw-bold">Multivitaminas</h1>
            <div class="row g-4 flex-nowrap overflow-scroll">
                @foreach($multivitaminas as $multivitamina)
                    @if($multivitamina->variacoes->first()->estoque > 0)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                            <div class="card shadow-sm rounded-3 w-100 d-flex flex-column h-100">
                                
                                <img src="{{$multivitamina->imagem}}" alt="{{$multivitamina->nome}}" 
                                    class="card-img-top p-3"
                                    style="height: 200px; object-fit: contain;">

                                
                                <div class="card-body d-flex flex-column text-center">
                                    <h5 class="card-title fw-semibold">{{$multivitamina->nome}}</h5>
                                    <p class="text-muted mb-1">
                                        {{floor($multivitamina->variacoes->first()->quantidade)}} {{$multivitamina->variacoes->first()->unidade}}
                                    </p>
                                    <h4 class="text-success fw-bold mb-3">
                                        R$ {{number_format($multivitamina->variacoes->first()->preco, 2, ',', '.')}}
                                    </h4>

                                    
                                    <form action="{{route('carrinho.addaocarrinho', $multivitamina->id)}}" method="post" class="mt-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold">
                                            <i class="bi bi-cart-fill me-2"></i> Comprar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Pré treinos -->
        <div class="container py-4">
            <h1 class="text-center mb-4 fw-bold">Pré- treinos</h1>
            <div class="row g-4 flex-nowrap overflow-scroll">
                @foreach($pretreinos as $pretreino)
                    @if($pretreino->variacoes->first()->estoque > 0)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                            <div class="card shadow-sm rounded-3 w-100 d-flex flex-column h-100">
                                
                                <img src="{{$pretreino->imagem}}" alt="{{$pretreino->nome}}" 
                                    class="card-img-top p-3"
                                    style="height: 200px; object-fit: contain;">

                                
                                <div class="card-body d-flex flex-column text-center">
                                    <h5 class="card-title fw-semibold">{{$pretreino->nome}}</h5>
                                    <p class="text-muted mb-1">
                                        {{floor($pretreino->variacoes->first()->quantidade)}} {{$pretreino->variacoes->first()->unidade}}
                                    </p>
                                    <h4 class="text-success fw-bold mb-3">
                                        R$ {{number_format($pretreino->variacoes->first()->preco, 2, ',', '.')}}
                                    </h4>

                                    
                                    <form action="{{route('carrinho.addaocarrinho', $pretreino->id)}}" method="post" class="mt-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold">
                                            <i class="bi bi-cart-fill me-2"></i> Comprar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </main>

@endsection