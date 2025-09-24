@extends('layout.main')
@section('title', 'Página principal')


@section('content')
    <main>
        <div class="container text-center">
            <h1 class="" >Wheys</h1>
            <div class="row">
                @foreach($wheys as $whey)
                    <p>{{$whey->nome}}</p>
                @endforeach
            </div>
            <h1>Farmacos</h1>
            <div class="row">
                @foreach($farmacos as $farmaco)
                    <p>{{$farmaco->nome}}</p>
                @endforeach
            </div>
        </div>
    </main>

@endsection