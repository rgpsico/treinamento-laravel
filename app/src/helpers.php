<?php

function renderizaEstrelasAvaliacao($pontuacao)
{
    $estrelasCheias = floor($pontuacao); // número de estrelas cheias
    $estrelaCinza = $pontuacao - $estrelasCheias; // fração da última estrela (0 = cheia, 1 = vazia)
    $estrelasVazias = 5 - $estrelasCheias - ceil($estrelaCinza); // número de estrelas vazias

    // Renderiza as estrelas
    $html = '';
    for ($i = 0; $i < $estrelasCheias; $i++) {
        $html .= '<i class="fa fa-star"></i>';
    }
    if ($estrelaCinza > 0) {
        $html .= '<i class="fa fa-star-half-o"></i>';
    }
    for ($i = 0; $i < $estrelasVazias; $i++) {
        $html .= '<i class="fa fa-star-o"></i>';
    }

    return $html;
}


use Carbon\Carbon;

if (!function_exists('diasDesdePostagem')) {
    function diasDesdePostagem($dataPostagem)
    {
        return Carbon::parse($dataPostagem)->diffInDays();
    }
}

if (!function_exists('whatsappUrlFromPhone')) {
    function whatsappUrlFromPhone($phoneNumber, $message = '')
    {
        // Remover caracteres não numéricos
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        // Codificar a mensagem para uso em URL
        $encodedMessage = urlencode($message);

        // Criar a URL do WhatsApp
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";

        return $whatsappUrl;
    }
}
