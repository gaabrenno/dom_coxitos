<div id="create" class="modal">
    <div class="modal-content">
      <h4 class="center-align teal-text"><i class="material-icons">card_giftcard</i> Novo Produto</h4>
      <form action="{{route('admin.produtos.store')}}" method="post" enctype="multipart/form-data" class="col s12">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
        <div class="row">
          <div class="input-field col s6">
            <input  id="name" type="text" class="validate">
            <label for="name">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="price" type="number" class="validate">
            <label for="price">Preço</label>
          </div>
          <div class="input-field col s12">
            <input  id="descript" type="text" class="validate">
            <label for="descript">Descrição</label>
          </div>
          <div class="input-field col s12">
            <select name="category_id">
                <option value="" disabled selected>Escolha uma opção</option>
                @foreach($category as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            </select>
            <label>Selecione uma Categoria</label>
          </div>
          <div class="file-field input-field col s12">
            <div class="btn">
              <span>Imagem</span>
              <input name="img" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-light btn red lighten-1" style="margin-right: 10px;">Cancelar</a>
      <button type="submit" class="waves-effect waves-light btn teal">Cadastrar</button>
    </div>
  </div>
  