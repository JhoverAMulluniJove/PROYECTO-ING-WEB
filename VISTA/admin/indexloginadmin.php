<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">

    <title>FERRETERIA</title>

    <!-- Font icons -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- Owl carousel -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/css/ollie.css">

    <link rel="stylesheet" href="sty.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav class="navbar navbar-light bg-light navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../../../PROYECTO-ING-WEB/VISTA/assets/imgs/brand.svg" alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/indexloginadmin.php">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/Featured.php">DESTACADOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/catalogadmin.php">CATALOGO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/usuariosadmin.php">USUARIOS</a></li>
                    <li class="nav-item"><a class="btn btn-primary" href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    
    <!--INICIO-->
    <header id="home" class="header">
        <div class="overlay"></div>
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">FERRETERIA<br>- - - - - - - - - -</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Core Scripts -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    
    <!-- Bootstrap 3 affix -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.affix.js"></script>
    
    <!-- Owl carousel -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/js/owl.carousel.js"></script>

    <!-- Ollie JS -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/js/Ollie.js"></script>

    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/CerrarSesion.js"></script>
</body>

</html>
