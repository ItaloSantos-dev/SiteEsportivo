<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="/public/imagens/Logo de Loja de Esportes.png" type="image/x-icon">
    <style>
        header{
            min-height: 25vh;
            background-color: rgb(231, 231, 231);
        }
        li{
            list-style-type: none;
        }
        #buscar{
            width: 15% ;
        }
        #logo{
            top: 30%;
        }
        footer{
            min-height: 25vh;
        }
        a{
            padding: 5px;
            transition-duration: .2s;
        }
        
        header>nav>ul>li>a:hover{
            background-color: lightblue;
            transition-duration: .2s;
        }
        header>nav>ul>li>form>button:hover{
            background-color: lightblue !important;
            transition-duration: .2s !important;
        }
    </style>
</head>
<body>
    <header class=" shadow d-flex  flex-column position-relative mb-5">
        <a href="{{route('paginainicial')}}">
            <img  class="img-fluid position-absolute translate-middle start-50" src="{{asset('imagens/Logo de Loja de Esportes.png')}}" style="height: 70px; width: 70px;" alt="" id="logo">
        </a>
        <nav class="mt-auto container ">
            <input class="form-control" type="text" name="buscar" id="buscar" placeholder="Buscar">
            <ul class=" flex-wrap d-flex justify-content-center">
                
                <li class="m-2 deco">
                    <a href="{{route('paginainicial')}}" class="text-decoration-none text-black">Página inicial</a>
                </li>
                <li class="m-2 deco">
                    <a href="" class="text-decoration-none text-black">Esportes</a>
                </li>
                <li class="m-2 deco">
                    <a href="" class="text-decoration-none text-black">Farmacos</a>
                </li>
                <li class="m-2 deco">
                    <a href="" class="text-decoration-none text-black">Artigos esportivos</a>
                </li>
                <li class="m-2 deco">
                    <a href="" class="text-decoration-none text-black">Nutrição</a>
                </li>
                <li class="m-2 deco">
                    <a href="" class="text-decoration-none text-black">Vestiário</a>
                </li>
                <li class="m-2 deco">
                    @if(!Auth::guard('web')->check())
                        <a href="{{route('usuarios.login')}}" class="text-decoration-none text-black">Login</a>
                    @else
                        <form action="{{route('usuarios.logout')}}" method="post">
                            @csrf
                            <button type="submit" class=" bg-transparent border-0 text-decoration-none text-black" >Sair</button>
                        </form>
                    @endif
                </li>
            </ul>
        </nav>
    </header>
    @yield('content')


    <footer class="bg-black position-relative mt-5 mb-0">
        <div class="container text-center">
            <div class="row position-absolute translate-middle start-50 top-50">
                <div class="col">
                    <a href="">Sobre nós</a><br>
                    <a href="">Instagram</a>
                </div>
                <div class="col">
                    <a href="">Contato</a><br>
                    <a href="">Telefone</a>
                </div>
                <div class="col">
                    <a href="">Contato</a><br>
                    <a href="">Nossa história</a>

                </div>
            </div>
        </div>
    </footer>

    
</body>
</html>