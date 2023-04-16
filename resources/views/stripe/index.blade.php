@extends('layouts.app')
@section('content')
<div class="container">
<!-- Seu formulário HTML -->
<form action="{{route('stripe.pagamento')}}" method="POST" id="payment-form">
    @csrf
    <div class="form-group">
        <label for="card-element">
            Informe os dados do cartão de crédito:
        </label>
        <div id="card-element">
        
        </div>
        <div id="card-errors" role="alert"></div>
    </div>

    <button type="submit" class="btn btn-primary">
        Pagar
    </button>
</form>

<!-- Inclua o script do Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<!-- Seu script JS -->
<script>
    // Crie um objeto stripe com sua chave pública
    var stripe = Stripe('pk_test_51JDFv2BOmvZWJe0xeu2cwxUHl3Fw92cGWXoDlUpLQfJlY8K2yhk6LKs0GNtDP7GBmRgSs8aOySLTFlkAJJ7hb1Yr00q73EhugI');

    // Crie um objeto elements
    var elements = stripe.elements();

    // Crie um elemento do formulário do cartão e monte-o em um elemento de formulário vazio
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    // Lide com os erros do cartão em tempo real
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Lide com a submissão do formulário
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Desabilite o botão de envio para evitar múltiplas submissões
        form.querySelector('button').disabled = true;

        // Crie o token do cartão e envie-o para o seu servidor
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                // Informe o usuário sobre o erro
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                
                // Habilite o botão de envio novamente
                form.querySelector('button').disabled = false;
            } else {
                // Adicione o token do cartão ao formulário e envie-o para o seu servidor
                var tokenInput = document.createElement('input');
                tokenInput.setAttribute('type', 'hidden');
                tokenInput.setAttribute('name', 'stripeToken');
                tokenInput.setAttribute('value', result.token.id);
                form.appendChild(tokenInput);
                form.submit();
            }
        });
    });
</script>


@endsection
