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

  <!-- expert section -->

  <section class="slider_section ">
    <div class="container ">
      <!-- select de los juegos disponibles -->
      <div class="find_container ">
              <form action="mostrar_resenas.php" method="POST">
                <div class="form-row" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    <div class="form-group col-lg-4">
                    <h2 style="text-align: center;">
                      Lenguaje de la reseña
                    </h2>
                      <select name="language" class="form-control wide" id="language"style="border: 2px solid #000; background-color: #ffffff; color: #000000;"required>
                        <option value="spanish">Español</option>
                        <option value="english">Inglés</option>
                      </select>
                    </div>

                    <div class="form-group col-lg-4">
                    <h2 style="text-align: center;">
                      Los juegos tendencia:
                    </h2>
                      <select name="juego" class="form-control wide" id="juegos"style="border: 2px solid #000; background-color: #ffffff; color: #000000;" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)) { 
                          echo "<option value='" . $row['appid'] . "|" . $row['nombre'] . "'>" . $row['nombre'] . "</option>"; 
                        } ?>
                      </select>
                    </div>
                  
                    <div class="btn-box">
                      <button type="submit" class="btn ">Ver reseñas</button>
                    </div>
                </div>
              </form>
      </div>
    </div>
  </section>

  <!-- end expert section -->

  <!-- footer section -->
  <footer class="footer_section" style="position: absolute; bottom: 0; width: 100%;">
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
