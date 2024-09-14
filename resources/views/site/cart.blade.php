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
          </a>
          <a href="{{route('site.cartClean')}}" class="btn waves-effect waves-light red darken-3">
            Limpar Carrinho
          </a>
          <a href="#modal-confirm" class="btn waves-effect waves-light green darken-3 modal-trigger">
            Finalizar Pedido
          </a>          
        </div>
      @endif
    </div>

<!-- Modal Estruturado -->
<div id="modal-confirm" class="modal">
  <div class="modal-content">
    <h4>Confirme seu Pedido</h4>
    <p>Confira os itens abaixo. Após confirmar, você será redirecionado para o WhatsApp para concluir seu atendimento:</p>
    
    <ul id="cart-items" class="collection">
      @foreach ($itens as $item)
        <li class="collection-item">
          <span class="title"><strong>Produto:</strong> {{ $item->name }}</span>
          <p>
            <strong>Quantidade:</strong> {{ $item->quantity }} <br>
            <strong>Preço:</strong> R$ {{ number_format($item->price, 2, ',', '.') }}
          </p>
        </li>
      @endforeach
    </ul>

    <div class="divider"></div>
    <h5 class="right-align"><strong>Total: R$ {{ number_format(CartFacade::getTotal(), 2, ',', '.') }}</strong></h5>
  </div>

  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <a id="confirm-purchase" href="#" class="waves-effect waves-green btn green darken-3 white-text">Confirmar e Finalizar</a>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Inicializar o modal
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    // Redirecionar para o WhatsApp ao confirmar
    document.getElementById('confirm-purchase').addEventListener('click', function() {
      var message = "Olá, gostaria de finalizar a compra dos seguintes itens: \n";
      
      @foreach ($itens as $item)
        var totalItemPrice = {{ $item->price }} * {{ $item->quantity }};
        message += "Produto: {{ $item->name }} - Quantidade: {{ $item->quantity }} - Valor: R$ " + totalItemPrice.toFixed(2).replace('.', ',') + "\n";
      @endforeach

      // Redireciona para o WhatsApp com a mensagem
      window.location.href = 'https://api.whatsapp.com/send?phone=629386-6925&text=' + encodeURIComponent(message);
    });
  });
</script>
@endsection
