@extends('site.layout')
@section('titulo', 'Sobre Nós')

@section('conteudo')

<div class="container">
    <!-- Texto de introdução -->
    <section class="about-text">
        <h3>Sobre Nós</h3>
        <p>
            Bem-vindo à Dom Coxitos! Nossa missão é trazer até você os melhores salgados, preparados com carinho e ingredientes de alta qualidade. Com anos de experiência na cozinha, nossa equipe se dedica a oferecer sabores inesquecíveis em cada mordida.
        </p>
    </section>

    <section class="about-section">
        <div class="col s12 m6">
            <img src="{{ asset('img/quemsomos.jpg') }}" alt="Nossa Equipe">
        </div>
        <div class="col s12 m6" style="padding-left: 20px;">
            <h4>Nossa História</h4>
            <p>
                Começamos como uma pequena lanchonete familiar, e ao longo dos anos, crescemos com a ajuda de nossos clientes fiéis. Hoje, a Dom Coxitos é sinônimo de qualidade e sabor, servindo as mais deliciosas coxinhas e salgados variados.
            </p>
        </div>
    </section>

    <!-- Mapa -->
    <section class="map-container">
        <h4>Onde Estamos</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.982726067683!2d-49.2894339!3d-16.777534999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935ef9006959cc33%3A0xdd40817bc0675933!2sDom%20Coxitos!5e0!3m2!1spt-PT!2sbr!4v1724454837789!5m2!1spt-PT!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</div>


@endsection
