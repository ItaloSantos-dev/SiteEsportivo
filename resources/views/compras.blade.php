@extends('layout.main')
@section('title', 'Minhas Compras')

<style>
    .linhasVenda{
        max-height: 15vh;
        overflow: hidden;
        transition: max-height 0.4s ease;
    }
    .mt-itens{
        margin-top:8% !important;
    }
</style>

@section('content')
    
    <div class="container text-center">
        @foreach($compras as $compra)
        
            <div id="{{$loop->index}}" class="row p-3 m-3 border shadow rounded linhasVenda">
                <div class="col">
                    R$ {{$compra->valor_final}}
                </div>

                <div class="col">
                    {{ucfirst($compra->forma)}}
                </div>

                <div class="col">
                    {{$compra->data}}
                </div>

                <div class="col">
                    <button onclick="mostrarItens('{{$loop->index}}')" class="butao bi bi-arrow-down btn btn-primary"></button>
                </div>
                <br>
                <div class="mt-itens">
                    @foreach($compra->produtosComprados as $item)
                    <div class="d-flex justify-content-between align-items-center p-2 mb-1 border rounded shadow-sm">
                            <span class="fw-semibold">{{$item->produto->nome}}</span>
                            <span class="badge bg-secondary">{{$item->valor_unitario}}</span>
                            <span class="badge bg-secondary"> {{$item->quantidade}}</span>
                            <span class="badge bg-secondary">{{$item->valor_final}}</span>

                            <img src="{{$item->produto->imagem}}" 
                            alt="{{$item->produto->nome}}" 
                            class="me-2 rounded" 
                            style="width:50px; height:50px; object-fit:cover;">
                        </div>
                    @endforeach
                </div>
            </div>

            
        
        @endforeach
    </div>

<script>
    function mostrarItens(div){
        let linhaSelecionada = document.getElementById(div);
        let btnUnico = linhaSelecionada.querySelector('.butao')

        if(btnUnico.classList.contains('bi-arrow-down')){
            let outrasLinhas = document.querySelectorAll('.linhasVenda');
            for (let linha of outrasLinhas){
                linha.style.maxHeight="15vh"
            }
            linhaSelecionada.style.maxHeight = linhaSelecionada.scrollHeight + "px";
            btnUnico.classList.replace('bi-arrow-down','bi-arrow-up')

        }
        else{
            linhaSelecionada.style.maxHeight="15vh"
            btnUnico.classList.replace('bi-arrow-up','bi-arrow-down')

        }
    }

</script>
@endsection