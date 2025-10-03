@extends('layout.main')
@section('title', 'Categorias')
@section('content')
    <div class="container  py-4">
        <h1 class="text-center mb-4 fw-bold">Powerlifting</h1>
        <div class="row g-4 flex-nowrap overflow-scroll">
            @foreach($powerliftingProds as $produto)
                @if($produto->variacoes->first()->estoque > 0)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                        <div class="card shadow-sm rounded-3 w-100 d-flex flex-column h-100">
                            
                            <img src="{{$produto->imagem}}" alt="{{$produto->nome}}" 
                                class="card-img-top p-3"
                                style="height: 200px; object-fit: contain;">

                            
                            <div class="card-body d-flex flex-column text-center">
                                <h5 class="card-title fw-semibold">{{$produto->nome}}</h5>
                                <p class="text-muted mb-1">
                                    @if($produto->variacoes->first()->quantidade!=NULL)
                                        {{floor($produto->variacoes->first()->quantidade) }}
                                        {{$produto->variacoes->first()->unidade}}
                                    @endif
                                        {{$produto->variacoes->first()->tamanho}}   
                                </p>
                                <h4 class="text-success fw-bold mb-3">
                                    R$ {{number_format($produto->variacoes->first()->preco, 2, ',', '.')}}
                                </h4>

                                
                                <form action="{{route('carrinho.addaocarrinho', $produto->id)}}" method="post" class="mt-auto">
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



@endsection

