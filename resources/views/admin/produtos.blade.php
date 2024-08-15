@extends('admin.layout')
@section('title', 'Produtos')
@section('content')
<div class="fixed-action-btn">
  <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
    <i class="large material-icons">add</i>
  </a>   
</div>
@include('admin.produtos.create')
  <div class="row container crud">
    @include('admin.includes.mensagens')

  <div class="row titulo ">              
    <h1 class="left">Produtos</h1>
    <span class="right chip">{{$produtos->count()}} produtos cadastrados</span>  
  </div>
  <nav class="bg-gradient-blue">
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input placeholder="Pesquisar..." id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>     
  <div class="card z-depth-4 registros" >
    <table class="striped ">
      <thead>
        <tr>
          <th></th>
          <th>ID</th>  
          <th>Produto</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($produtos as $produto)
        <tr>
          <td><img src="{{url("storage/{$produto->img}")}}" class="circle"></td>
          <td>{{$produto->id}}</td>
          <td>{{$produto->name}}</td>                    
          <td>R$ {{number_format($produto->price, 2, ',', '.')}}</td>
          <td>{{$produto->category->name}}</td>
          <td><a class="btn-floating  waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
            <a href="#delete-{{$produto->id}}" class="btn-floating modal-trigger  waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
            @include('admin.produtos.delete')
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="yellow darken-3">
      <div class="row center">
        <div class="col s12">
          {{$produtos->links('custom.pagination')}}
        </div>
      </div> 
    </div>
@endsection