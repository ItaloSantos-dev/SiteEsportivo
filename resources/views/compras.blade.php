@extends('layout.main')
@section('title', 'Minhas Compras')

<style>
    .linhasVenda{
        max-height: 15vh;
        overflow: hidden;
        transition: max-height 0.4s ease;
    }
    .mt-itens{
        margin-top:6% !important;
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
                    <label for="">ITENS</label>
                    <br>
                    <button onclick="mostrarItens('{{$loop->index}}')" class="mostrar bi bi-arrow-down btn btn-primary"></button>
                    <button onclick="ocultarItens('{{$loop->index}}')" class="fechar bi bi-arrow-up btn btn-danger d-none"></button>
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
        let btnfechar = linhaSelecionada.querySelector('.fechar')
        let btnmostrar = linhaSelecionada.querySelector('.mostrar')

        let outrasLinhas = document.querySelectorAll('.linhasVenda');
        for (let linha of outrasLinhas){
            let outrosbtnfechar = linha.querySelector('.fechar')
            let outrosbtnmostrar = linha.querySelector('.mostrar')

            outrosbtnfechar.classList.add('d-none')
            outrosbtnmostrar.classList.remove('d-none')

            linha.style.maxHeight="15vh"
        }

        linhaSelecionada.style.maxHeight = linhaSelecionada.scrollHeight + "px";
        btnmostrar.classList.add('d-none');
        btnfechar.classList.remove('d-none');

    }

    function ocultarItens(div){
        let linhaSelecionada = document.getElementById(div);
        let btnfechar = linhaSelecionada.querySelector('.fechar')
        let btnmostrar = linhaSelecionada.querySelector('.mostrar')

        linhaSelecionada.style.maxHeight = "15vh";
        btnmostrar.classList.remove('d-none');
        btnfechar.classList.add('d-none');

    }

</script>
@endsection