@extends('site.layout')
@section('titulo', 'Home')
@section('conteudo')
    <div class="row container">
        <h5><strong>Categoria: {{$category->name}}</strong></h5>
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
    <div class="yellow darken-3">
        <div class="row center">
            <div class="col s12">
                {{$produtos->links('custom.pagination')}}
            </div>
        </div> 
   </div>
@endsection
