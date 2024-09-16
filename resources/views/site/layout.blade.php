@php
    use Darryldecode\Cart\Facades\CartFacade;
    $currentUrl = request()->path();
/*     $isHome = Str::startsWith($currentUrl, 'home');
    $isProdutos = Str::startsWith($currentUrl, 'produtos'); */
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        nav {
            background: #ffd000;
        }
        .nav-wrapper {
            display: flex;
            align-items: center;
            height: 100%;
        }
        .brand-logo {
            margin: 0 auto;
            position: absolute;
            left: 05%;
            transform: translateX(-50%);
        }
        .right-items {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
        }
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Espaçamento entre os cards */
            margin-top: 40px;
        }

        .card {
            width: 200px; /* Largura fixa para os cards */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            height: 100%; /* Faz a imagem ocupar toda a altura do card */
            object-fit: cover; /* Garante que a imagem seja cortada corretamente para preencher o card */
        }


        .card-store {
            padding-top: 10px; /* Ajuste o valor conforme necessário */
            padding-bottom: 10px; /* Ajuste o valor conforme necessário */
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.7); /* Fundo com transparência opcional */
        }

        .card-store h5 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .card-store p {
            margin-top: 5px;
            font-size: 14px;
            color: #777;
        }
        .footer {
            background-color: #f8f9fa; /* Cor de fundo do rodapé */
            color: #333; /* Cor do texto */
            padding: 20px 0; /* Espaçamento interno */
            text-align: center; /* Centraliza o texto */
            font-size: 14px; /* Tamanho do texto */
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Sombras para destacar o rodapé */
        } 

        .footer p {
            margin: 0; /* Remove a margem padrão dos parágrafos */
            line-height: 1.5; /* Altura da linha */
        }
        .about-text {
            margin: 20px 0;
        }
        .about-section {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .about-section img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .map-container {
            margin: 20px 0;
            text-align: center;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 10px;
        }
        .card-carousel {
          margin: 0 auto;
        }
        .card-carousel .card {
          margin: 0 10px; /* Espaçamento entre os cards */
        }
        .card-carousel .card-image img {
          width: 100%;
          height: auto; /* Ajusta a altura conforme necessário */
        }
        .qr-code-section {
        margin-top: 20px;
        }
        .qr-code-section img {
            display: inline-block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <!-- Dropdown Structure -->
    <ul id="categoryDesc" class="dropdown-content">
        @foreach ($categoryMenu as $categoryM)
            <li><a href="{{ route('site.category', $categoryM->id) }}">{{ $categoryM->name }}</a></li>
        @endforeach
    </ul>
    <ul id="categoryMobile" class="dropdown-content">
        @foreach ($categoryMenu as $categoryM)
            <li><a href="{{ route('site.category', $categoryM->id) }}">{{ $categoryM->name }}</a></li>
        @endforeach
    </ul>
    <!-- Dropdown Structure -->
    <ul id="menudesc" class="dropdown-content">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('login.logout') }}">Sair</a></li>
    </ul>

    <ul id="menumobile" class="dropdown-content">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('login.logout') }}">Sair</a></li>
    </ul>
    
    <!-- Navbar -->
    <nav  style="height: 200px;">
        <div class="nav-wrapper container">
            <ul class="left hide-on-med-and-down left-items">
               <!-- espaço para o menu de categorias aplicções futuras -->
            </ul>
            <a href="{{ route('site.index') }}" class="brand-logo"><img src="{{ asset('img/logo_dom_coxitos.png') }}" style="max-width: 300px;"></a>
            <ul class="right hide-on-med-and-down right-items">
                <li><a href="{{ route('site.produtospage') }}" style="font-size: 18px; font-weight: bold;">Sobre Nós</a></li>
                <li><a href="" class="dropdown-trigger" data-target="categoryDesc" style="font-size: 18px; font-weight: bold;">Categorias<i class="material-icons right">expand_more</i></a></li>
                @if (CartFacade::getContent()->count() > 0)
                    <li><a href="{{ route('site.cart') }}" style="font-size: 18px; font-weight: bold;">Carrinho<span class="new badge red darken-3" data-badge-caption="">{{ CartFacade::getContent()->count() }}</span></a></li>
                @else
                    <li><a href="{{ route('site.cart') }}" style="font-size: 18px; font-weight: bold;">Carrinho</a></li>
                @endif
                @auth
                    <li><a href="" class="dropdown-trigger" data-target="menudesc" style="font-size: 18px; font-weight: bold;">Olá {{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }}!<i class="material-icons right">expand_more</i></a></li>
                @else
                   
                @endif
            </ul>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="{{ route('site.index') }}">Sobre Nós</a></li>
        <li><a href="" class="dropdown-trigger" data-target="categoryMobile">Categorias<i class="material-icons right">expand_more</i></a></li>
        @if (CartFacade::getContent()->count() > 0)
            <li><a href="{{ route('site.cart') }}">Carrinho<span class="new badge red darken-3" data-badge-caption="">{{ CartFacade::getContent()->count() }}</span></a></li>
        @else
            <li><a href="{{ route('site.cart') }}">Carrinho</a></li>
        @endif
        @auth
            <li><a href="" class="dropdown-trigger" data-target="menumobile">Olá {{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }}!<i class="material-icons right">expand_more</i></a></li>
        @else
            
        @endif
    </ul>

    @yield('conteudo')
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elemCarousel = document.querySelectorAll('.carousel');
            var instanceCarousel = M.Carousel.init(elemCarousel, {
                fullWidth: true,
                indicators: true
            });
        
            setInterval(function() {
                var activeCarousel = M.Carousel.getInstance(elemCarousel[0]);
                activeCarousel.next();
            }, 5000); 
        });

        
        var elemSidenav = document.querySelectorAll('.sidenav');
        var instanceSidenav = M.Sidenav.init(elemSidenav);
        
    </script>
    <footer class="footer">
        <div class="container center-align">
            <p>&copy; {{ date('Y') }} Dom Coxitos. Todos os direitos reservados.</p>
            <p>Desenvolvido por Gabriel Brenno Desenvolvimento</p>
            <p><a href="/termos-de-uso">Termos de Uso</a> | <a href="/politica-de-privacidade">Política de Privacidade</a></p>
        </div>
    </footer>
</body>
</html>