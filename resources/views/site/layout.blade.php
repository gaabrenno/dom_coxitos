@php
    use Darryldecode\Cart\Facades\CartFacade;
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
            background: linear-gradient(135deg, #f7d542, #ff4f19);
        }
        .nav-wrapper {
            display: flex;
            align-items: center;
            height: 100%;
        }
        .brand-logo {
            margin: 0 auto;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .left-items {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex: 1;
        }
        .right-items {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 1;
        }
    </style>
</head>
<body>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        @foreach ($categoryMenu as $categoryM)
            <li><a href="{{ route('site.category', $categoryM->id) }}">{{ $categoryM->name }}</a></li>
        @endforeach
    </ul>
    <!-- Dropdown Structure -->
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('login.logout') }}">Sair</a></li>
    </ul>
    
    <!-- Navbar -->
    <nav  style="height: 200px;">
        <div class="nav-wrapper container">
            <ul class="left hide-on-med-and-down left-items">
                <li><a href="{{ route('site.index') }}" style="font-size: 18px; font-weight: bold;">Home</a></li>
                <li><a href="" class="dropdown-trigger" data-target="dropdown1" style="font-size: 18px; font-weight: bold;">Categorias<i class="material-icons right">expand_more</i></a></li>
            </ul>
            <a href="{{ route('site.index') }}" class="brand-logo"><img src="{{ asset('img/logo_dom_coxitos.png') }}" style="max-width: 300px;"></a>
            <ul class="right hide-on-med-and-down right-items">
                @if (CartFacade::getContent()->count() > 0)
                    <li><a href="{{ route('site.cart') }}" style="font-size: 18px; font-weight: bold;">Carrinho<span class="new badge red darken-3" data-badge-caption="">{{ CartFacade::getContent()->count() }}</span></a></li>
                @else
                    <li><a href="{{ route('site.cart') }}" style="font-size: 18px; font-weight: bold;">Carrinho</a></li>
                @endif
                @auth
                    <li><a href="" class="dropdown-trigger" data-target="dropdown2" style="font-size: 18px; font-weight: bold;">Olá {{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }}!<i class="material-icons right">expand_more</i></a></li>
                @else
                    <li><a href="{{ route('login.form') }}" style="font-size: 18px; font-weight: bold;">Login<i class="material-icons right">lock</i></a></li>
                @endif
            </ul>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="{{ route('site.index') }}">Home</a></li>
        <li><a href="" class="dropdown-trigger" data-target="dropdown1">Categorias<i class="material-icons right">expand_more</i></a></li>
        @if (CartFacade::getContent()->count() > 0)
            <li><a href="{{ route('site.cart') }}">Carrinho<span class="new badge red darken-3" data-badge-caption="">{{ CartFacade::getContent()->count() }}</span></a></li>
        @else
            <li><a href="{{ route('site.cart') }}">Carrinho</a></li>
        @endif
        @auth
            <li><a href="" class="dropdown-trigger" data-target="dropdown2">Olá {{ Auth()->user()->firstName }} {{ Auth()->user()->lastName }}!<i class="material-icons right">expand_more</i></a></li>
        @else
            <li><a href="{{ route('login.form') }}">Login<i class="material-icons right">lock</i></a></li>
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

        var elemCarousel = document.querySelectorAll('.carousel');
        var instanceCarousel = M.Carousel.init(elemCarousel, {
            fullWidth: true,
            indicators: true
        });
        
        var elemSidenav = document.querySelectorAll('.sidenav');
        var instanceSidenav = M.Sidenav.init(elemSidenav);
    </script>
</body>
</html>