@extends('site.layout')
@section('titulo', 'Details')
@section('conteudo')
<div class="row container"><br>
    <div class="col s12 m6">
       <img src=" {{$produto->img}}" class="responsive-img">
    </div>
    <div class="col s12 m6">
        <h4>{{$produto->name}}</h4>
        <p>{{$produto->descript}}</p>
        <p>Categoria: {{$produto->category->name}} <br>Postado por: {{$produto->user->firstName}}</p>
        <h5>R$ {{number_format($produto->price, 2, ',', '.')}}</h5>
        <form action="{{route('site.cartadd')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->name}}">
            <input type="hidden" name="price" value="{{$produto->price}}">
            <input type="hidden" name="img" value="{{$produto->img}}">
            <input type="number" min="1" name="qtd" value="1">
            <button class="btn green darken-3">Adicionar ao carrinho</button>
        <button class="btn red darken-3">Comprar</button>
        </form>
    </div>
</div>
@endsection