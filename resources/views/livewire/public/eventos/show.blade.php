<div>
    @include('novo._partials.banner')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="avatar.jpg" alt="Avatar" class="img-thumbnail">
      </div>
      <div class="col-md-8">
        <h1>Nome do Entregador</h1>
        <h2>Telefone</h2>
        <div class="estrelas">
          <span class="fa fa-star" data-rating="1"></span>
          <span class="fa fa-star" data-rating="2"></span>
          <span class="fa fa-star" data-rating="3"></span>
          <span class="fa fa-star" data-rating="4"></span>
          <span class="fa fa-star" data-rating="5"></span>
          <input type="hidden" name="avaliacao" class="rating-value" value="4.2">
        </div>
        <h3>Serviços:</h3>
        <ul>
          <li>Entrega de lanche</li>
          <li>Entrega de encomendas</li>
          <li>Outros serviços</li>
        </ul>
        <a href="https://api.whatsapp.com/send?phone=5511999999999" target="_blank">
          <img src="whatsapp.png" alt="WhatsApp">
        </a>
      </div>
    </div>
  </div>
  