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
    if ((isset($_SESSION['k_username'])) && ($_SESSION['k_tipo'] == 0)) { 
   } else { 
    header("Location: index.html"); 
    exit();}
    ?>


<body class="sub_page">

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
                <a class="nav-link" href="#">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                  <span>
                    Modificar juegos
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="indexAdm">
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

  <!-- expert section -->

  <section class="slider_section ">
    <div class="container ">
      <h2 style="text-align: center;">
        Los juegos registrados
      </h2>
      <div class="find_container " style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
        <?php
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"gamescrapping");

        $sql = "SELECT * FROM juego";

        $resultadoA = mysqli_query($link,$sql);
        echo"<table class='styled-table' border='1'>";
        echo"<TR><th>Appid</th><th>Nombre</th><th>Genero</th><th>Popularidad</th></TR>";
        while($res=mysqli_fetch_array($resultadoA))
        {
        $ap=$res['appid'];
        $nm=$res['nombre'];
        $gn=$res['genero'];
        $pp=$res['popularidad'];
        echo"<TR><TD>$ap</TD><TD>$nm</TD><TD>$gn</TD><TD>$pp</TD></TR>";
        }
        echo"</table>";
        ?>
      </div>
      <br>
      <h2 style="text-align: center;">Ingrese los datos para añadir o modificar juego existente</h2>
      <div class="container ">
        <div class="find_container " style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
          <div class="container">
            <div class="row">
              <div class="col">
                <form action="mdjuegos2.php" method="post">
                  <div class="form-row "style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                  <div class="form-group col-lg-4">
                        <input type="text" style="margin-bottom: 10px; padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;" class="form-control" id="appid" name="appid" placeholder="Appid" required/>
                        <input type="text" style="margin-bottom: 10px; padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required/>
                        <input type="text" style="margin-bottom: 10px; padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;" class="form-control" id="genero" name="genero" placeholder="Genero" required/>
                        <input type="text" style="margin-bottom: 10px; padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;" class="form-control" id="pop" name="pop" placeholder="Popularidad" required/>

                        <div class="btn-box">
                            <button type="submit" class="btn ">Añadir</button>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        


  </section>

  <!-- end expert section -->

  <!-- footer section -->
  <footer class="footer_section" >
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>