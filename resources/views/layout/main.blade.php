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
            margin-bottom: 5px;
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
            transform:scale(1.5);
            transition-duration: .2s;
        }
    </style>
</head>
<body>
    <header class="d-flex flex-column position-relative">
        <img class="img-fluid position-absolute translate-middle start-50" src="{{asset('imagens/Logo de Loja de Esportes.png')}}" style="height: 70px; width: 70px;" alt="" id="logo">

        <nav class="container mt-auto ">
            <ul class=" d-flex justify-content-center">
                <input class="form-control" type="text" name="buscar" id="buscar" placeholder="Buscar">
                <li class="m-2 deco">
                    <a href="#" class="text-decoration-none text-black">Página inicial</a>
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
                    <a href="" class="text-decoration-none text-black">Login</a>
                </li>
            </ul>
        </nav>
    </header>
    @yield('content')


    <footer class="bg-black position-relative">
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