<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GameScraping</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<?php session_start(); 
  if ((isset($_SESSION['k_username'])) && ($_SESSION['k_tipo'] == 1)) { 
  } else { 
    header("Location: index.html"); 
    exit();
  }
  $link = mysqli_connect("localhost", "root", ""); 
  mysqli_select_db($link, "gamescrapping"); 
  $sql = "SELECT appid, nombre FROM juego"; 
  $result = mysqli_query($link, $sql);
?>

<body class="sub_page"style="background-color: #f0f0f0;">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              GameScraping
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item">
                  <span class="nav-link"style="color: white;">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                    <?php echo "usuario: ", $_SESSION['k_username']; ?>
                    </span>
                  </span>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="indexUsuario.php">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  <span>
                    Regresar
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="salir.php">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  <span>
                    Salir
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <section class="slider_section ">
    <div class="container ">
        <?php
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
        
            $query = "call asociarJuego('$id_usuario', '$appid')";
            
            mysqli_query($link, $query);
        
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
    </div>
  </section>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>

</body>

</html>
