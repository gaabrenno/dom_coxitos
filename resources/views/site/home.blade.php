@extends('site.layout')
@section('titulo', 'Home')
@section('conteudo')
    <div class="row container">
        @foreach ($produtos as $produto)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                      <img src="{{$produto->img}}">
                      <a href="{{route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red darken-3"><i class="material-icons">visibility</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{Str::limit($produto->name, 20)}}</span>
                      <p>{{ Str::limit($produto->descript, 30)}}</p>
                    </div>
                  </div>
            </div>
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
