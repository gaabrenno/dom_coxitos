<div id="delete-{{$categoria->id}}" class="modal">
  <div class="modal-content">
    <h4 class="center-align red-text"><i class="material-icons">delete</i> Deletar Categoria</h4>
    <div class="row">
      <p class="flow-text center-align">Tem certeza que deseja deletar esta categoria? <strong>{{$categoria->name}}</strong>?</p>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-light btn grey lighten-1" style="margin-right: 10px;">Cancelar</a>
    <form action="{{route('admin.categoria.delete', $categoria->id)}}" method="post" style="display: inline;">
      @method('DELETE')
      @csrf
      <button type="submit" class="waves-effect waves-light btn red">Deletar</button>
    </form>
  </div>
</div>
