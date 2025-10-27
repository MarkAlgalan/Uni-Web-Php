<?php
// ID del juego SILENT HILL 2 en Steam
$appid = 2124490;

// URL de la API de Steam para obtener las reseñas del juego en español
$url = "https://store.steampowered.com/appreviews/%7B$appid%7D?json=1&language=spanish";

// Realiza la solicitud a la API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Verifica si hay reseñas disponibles
if (isset($data['reviews'])) {
    $reviews = $data['reviews'];
    echo "Encontré " . count($reviews) . " reseñas.\n";
    foreach ($reviews as $index => $review) {
        $review_text = $review['review'];
        echo "Reseña " . ($index + 1) . ": " . $review_text . "\n";
    }
} else {
    echo "No se encontraron reseñas.\n";
}
?>