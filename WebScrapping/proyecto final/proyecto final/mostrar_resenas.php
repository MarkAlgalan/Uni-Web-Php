<?php session_start(); 
if ((isset($_SESSION['k_username'])) && ($_SESSION['k_tipo'] == 1)) { 
} else { 
  header("Location: index.html"); 
  exit();
}

$user = $_SESSION['k_username'];
$link = mysqli_connect("localhost", "root", ""); 
mysqli_select_db($link, "gamescrapping"); 
$sql = "SELECT appid, nombre FROM juego"; 
$result = mysqli_query($link, $sql);

// Verificar si se ha enviado un juego y un idioma
if (isset($_POST['juego']) && isset($_POST['language'])) {
    list($appid, $nombre) = explode('|', $_POST['juego']);
    $language = $_POST['language'];


    $user_query = "SELECT id_usuario FROM usuario WHERE usuario = '$user'";
    $user_result = mysqli_query($link, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);
    $id_usuario = $user_row['id_usuario'];

    // Comprobar si ya existe una entrada para el usuario y el juego
    $check_query = "SELECT * FROM buscar WHERE id_usuario = '$id_usuario' AND appid = '$appid'";
    $check_result = mysqli_query($link, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        // Si no existe, insertar la nueva entrada
        $query = "call asociarJuego('$id_usuario', '$appid')";
        mysqli_query($link, $query);
    }
        

    // URL de la API de Steam para obtener las reseñas del juego en el idioma seleccionado
    $url = "https://store.steampowered.com/appreviews/$appid?json=1&language=$language";

    // Realiza la solicitud a la API
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Verifica si hay reseñas disponibles
    if (isset($data['reviews'])) {
        $reviews = $data['reviews'];
        $good_reviews = [];
        $bad_reviews = [];


        // Filtra las reseñas buenas y malas
        foreach ($reviews as $review) {
            if ($review['voted_up']) {
                $good_reviews[] = $review;
            } else {
                $bad_reviews[] = $review;
            }
        }

        echo "<h1>Reseñas de $nombre ($language)</h1>\n";
        echo "<hr>\n";
        echo "<div style='font-family: Arial, sans-serif; line-height: 1.6;'>\n";

        // Botones para dirigir a las reseñas buenas y malas
        echo "<div style='margin-bottom: 20px;'>\n";
        echo "<button onclick=\"location.href='#good_reviews'\" style='margin-right: 10px;'>Ver Reseñas Buenas</button>\n";
        echo "<button onclick=\"location.href='#bad_reviews'\">Ver Reseñas Malas</button>\n";
        echo "</div>\n";

        // Mostrar reseñas buenas
        echo "<h2 id='good_reviews'>Reseñas Buenas</h2>\n";
        if (count($good_reviews) > 0) {
            foreach ($good_reviews as $index => $review) {
                $review_text = $review['review'];
                echo "<div style='margin-bottom: 20px;'>\n";
                echo "<h3>Reseña " . ($index + 1) . ":</h3>\n";
                echo "<p style='padding: 10px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;'>" . nl2br(htmlspecialchars($review_text)) . "</p>\n";
                echo "</div>\n";
            }
        } else {
            echo "<p>No se encontraron reseñas buenas.</p>\n";
        }

        // Mostrar reseñas malas
        echo "<h2 id='bad_reviews'>Reseñas Malas</h2>\n";
        if (count($bad_reviews) > 0) {
            foreach ($bad_reviews as $index => $review) {
                $review_text = $review['review'];
                echo "<div style='margin-bottom: 20px;'>\n";
                echo "<h3>Reseña " . ($index + 1) . ":</h3>\n";
                echo "<p style='padding: 10px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;'>" . nl2br(htmlspecialchars($review_text)) . "</p>\n";
                echo "</div>\n";
            }
        } else {
            echo "<p>No se encontraron reseñas malas.</p>\n";
        }

        echo "</div>\n";
    } else {
        echo "<p>No se encontraron reseñas.</p>\n";
    }
} else {
    echo "<p>No se proporcionó un juego válido o un idioma.</p>\n";
}
?>