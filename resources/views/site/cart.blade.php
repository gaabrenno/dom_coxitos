@php
  use Darryldecode\Cart\Facades\CartFacade;
@endphp
@extends('site.layout')
@section('titulo', 'cart')
@section('conteudo')
    <div class="row container">
      @if ($mensagem = Session::get('success'))
        <div id="success-message" class="card-panel green darken-1 white-text center"></div>
        <script>
          setTimeout(function() {
            document.getElementById('success-message').innerText = "{{ $mensagem }}";
          }, 1);
          setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
          }, 6000);
        </script>
      @endif
      @if ($mensagem = Session::get('aviso'))
        <div id="success-message" class="card-panel blue darken-1 white-text center"></div>
        <script>
          setTimeout(function() {
            document.getElementById('success-message').innerText = "{{ $mensagem }}";
          }, 1);
          setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
          }, 6000);
        </script>
      @endif
      @if($itens->count() == 0)
        <div class="card-panel  yellow darken-3">
          <div class="card-content center">
            <p class="white-text" style="font-size: 30px;"><strong>Seu carrinho está vazio</strong></p>
            <p class="white-text">Adicione produtos ao carrinho para saborear os melhores lanches!</p>
            </div>
          <div class="card-action center">
            <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue darken-3">Voltar para a página inicial</a>
          </div>
        </div>
          @else
        <h5><strong>Seu carrinho possui {{$itens->count()}} itens</strong></h5>
        <table class="striped">
            <thead>
              <tr>
                  <th></th>
                  <th>Produto</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($itens as $item)
              <tr>
                <td><img src="{{$item->attributes->image}}" alt="{{$item->name}}" width="70" height="70" class="responsive-img circle"></td>
                <td>{{$item->name}}</td>
                <td>{{ number_format($item->price, 2, ',', '.') }}</td>
                {{-- BTN UPDATE --}}
                <form action="{{route('site.cartupdate')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <td><input style="width: 40px; font-weight:900;" class="white center" min="1"  type="number" name="quantity" value="{{$item->quantity}}"></td>
                  <td><button class="btn-floating waves-effect waves-light green darken-3"><i class="material-icons">refresh</i></button></td>
                </form>
                {{-- BTN REMOVE --}}
                <form action="{{route('site.cartremove')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                <td><button class="btn-floating waves-effect waves-light red darken-3"><i class="material-icons">delete</i></button></td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
            <div class="row container right">
            <h5 class="right-align"><strong>Total: R$ {{number_format(CartFacade::getTotal(), 2, ',', '.')}}</strong></h5>
            </div>
        <div class="row container center">
          <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue darken-3">
            Continuar comprando
            <i class="material-icons">arrow_back</i>
          </a>
          <a href="{{route('site.cartClean')}}" class="btn waves-effect waves-light red darken-3">
            Limpar Carrinho
            <i class="material-icons">clear</i>
          </a>
          <button class="btn waves-effect waves-light green darken-3">
            Finalizar Pedido
            <i class="material-icons">check</i>
          </button>
        </div>
      @endif
    </div>
@endsection
