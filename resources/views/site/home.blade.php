@extends('site.layout')
@section('titulo', 'Home')

@section('conteudo')
    <!-- Carrossel de Imagens -->
    <div class="carousel carousel-slider center">
        <div class="carousel-item yellow darken-3 white-text" href="#one!">
            <img src="{{ asset('img/logo.png') }}" alt="Imagem 1" style="width: 100%;">
            <h2>Promoção Especial</h2>
            <p class="white-text">Aproveite nossas ofertas imperdíveis!</p>
        </div>
        <div class="carousel-item yellow darken-3 white-text" href="#two!">
            <img src="{{ asset('img/mouse.jpg') }}" alt="Imagem 2" style="width: 100%;">
            <h2>Novos Produtos</h2>
            <p class="white-text">Confira os lançamentos do mês.</p>
        </div>
        <div class="carousel-item yellow darken-3 white-text" href="#three!">
            <img src="{{ asset('img/office.jpg') }}" alt="Imagem 3" style="width: 100%;">
            <h2>Frete Grátis</h2>
            <p class="white-text">Em compras acima de R$ 150,00</p>
        </div>
    </div>

    <!-- Lista de Produtos -->
    <div class="row container">
        @foreach ($produtos as $produto)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                      <img src="{{ $produto->img }}">
                      <a href="{{ route('site.details', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red darken-3">
                          <i class="material-icons">visibility</i>
                      </a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ Str::limit($produto->name, 20) }}</span>
                        <p>{{ Str::limit($produto->descript, 30) }}</p>
                    </div>
                  </div>
            </div>
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
