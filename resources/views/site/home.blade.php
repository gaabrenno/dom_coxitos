@extends('site.layout')
@section('titulo', 'Home')

@section('conteudo')
    <!-- Carrossel de Imagens -->
    <div class="carousel carousel-slider center">
        <div class="carousel-item" href="#one!">
            <img src="{{ asset('img/c1.png') }}" alt="Imagem 1" style="width: 100%; " >
        </div>
        <div class="carousel-item" href="#two!">
            <img src="{{ asset('img/c2.png') }}" alt="Imagem 2" style="width: 100%; ">
        </div>
        <div class="carousel-item" href="#three!">
            <img src="{{ asset('img/c3.png') }}" alt="Imagem 3" style="width: 100%; ">
        </div>
    </div>
    <div class="container">
        <h4 class="center-align">Categorias</h4>
        <div class="row center-align">
            <div class="cards-container">
                @foreach ($categoryMenu as $categoryM)
                <a href="{{ route('site.category', $categoryM->id) }}">
                <div class="card small">
                    <div class="card-image">
                        <img src="{{ asset('img/card_fritos.jpg') }}" alt="{{ $categoryM->name }}">
                    </div>
                    <div class="card-store center-align">
                        <h5>{{ $categoryM->name }}</h5>
                        <p>{{Str::limit ($categoryM->descript, 45) }}</p>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <h4 class="center-align">Produtos</h4>
    </div>
    <!-- Lista de Produtos -->
    <div class="row container">
        @foreach ($produtos as $produto)
        <a href="{{ route('site.details', $produto->slug) }}">
        <div class="col s6 m4 l3">
            <div class="card small">
                <div class="card-image">
                    <img src="{{ $produto->img }}" alt="{{ $produto->name }}">
                </div>
                <div class="card-store center-align">
                    <h5>{{ Str::limit($produto->name, 20) }}</h5>
                    <p>{{ Str::limit($produto->descript, 30) }}</p>
                </div>
            </div>
        </div>
        </a>
        @endforeach
    </div>
        

    <!-- Paginação -->
    <div class="yellow darken-3">
        <div class="row center">
            <div class="col s12">
                {{ $produtos->links('custom.pagination') }}
            </div>
        </div> 
    </div>
@endsection
