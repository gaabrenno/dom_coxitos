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
    </head>
    <body>  
        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            @foreach ($categoryMenu as $categoryM)
                <li><a href="{{route('site.category',$categoryM->id)}}">{{$categoryM->name}}</a></li>
            @endforeach
        </ul>
        <!-- Dropdown Structure -->
        <ul id='dropdown2' class='dropdown-content'>
            <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('login.logout')}}">Sair</a></li>
        </ul>
        <nav class="yellow darken-3" style="height: 200px;">
          <div class="nav-wrapper container" style="display: flex; align-items: center; justify-content: space-between;">
            <a href="{{route('site.index')}}" class="brand-logo center" style="font-size: 50px;">Dom Coxitos</a>
            <ul id="nav-mobile" class="left" style="display: flex; align-items: center;">
            <li><a href="{{route('site.index')}}">Home</a></li>
            <li><a href="" class="dropdown-trigger" data-target='dropdown1'>Categorias<i class="material-icons right">expand_more</i></a></li>
            @if (CartFacade::getContent()->count() > 0)
                <li><a href="{{route('site.cart')}}">Carrinho<span class="new badge red darken-3" data-badge-caption="">{{CartFacade::getContent()->count()}}</span></a></li>
            @else 
                <li><a href="{{route('site.cart')}}">Carrinho</a></li>
            @endif
            </ul>
            <ul id="nav-mobile" class="right" style="display: flex; align-items: center;">
                @auth
                    <li><a href="" class="dropdown-trigger" data-target='dropdown2'>Olá {{Auth()->user()->firstName}} {{Auth()->user()->lastName}}!<i class="material-icons right">expand_more</i></a></li>
                @else
                    <li><a href="{{route('login.form')}}">Login<i class="material-icons right">lock</i></a></li>
                @endif
            </ul>
          </div>
        </nav>
        @yield('conteudo')       
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            /* Dropdown */
            var elemDrop = document.querySelectorAll('.dropdown-trigger');
            var instanceDrop = M.Dropdown.init(elemDrop, {
                coverTrigger: false,
                constrainWidth: false
            });
        </script>
    </body>
</html>