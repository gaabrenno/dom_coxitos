
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