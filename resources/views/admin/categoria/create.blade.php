<div id="create" class="modal">
  <div class="modal-content">
      <h4 class="center-align teal-text"><i class="material-icons">card_giftcard</i>Nova Categoria</h4>
      <form action="{{route('admin.categoria.store')}}" method="post" enctype="multipart/form-data" class="col s12">
          @csrf
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="row">
              <div class="input-field col s6">
                  <input id="name" name="name" type="text" class="validate" required>
                  <label for="name">Nome</label>
              </div>

              <div class="file-field input-field col s12">
                  <div class="btn">
                      <span>Imagem</span>
                      <input name="img" type="file" required>
                  </div>
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Selecione a imagem">
                  </div>
              </div>
          </div>

          <div class="modal-footer">
              <a href="#!" class="modal-close waves-effect waves-light btn red lighten-1" style="margin-right: 10px;">Cancelar</a>
              <button type="submit" class="waves-effect waves-light btn teal">Cadastrar</button>
          </div>
      </form>
  </div>
</div>
