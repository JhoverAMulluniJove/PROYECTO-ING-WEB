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

                    <li class="nav-item"><a class="nav-link" href="#home">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">ACERCA DE</a></li>
                    <li class="nav-item"><a class="nav-link" href="#offer">OFERTAS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">DESTACADOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../PROYECTO-ING-WEB/CONTROLADOR/ProductoController.php">CATALOGO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/ContactUs.html">CONTACTANOS</a></li>
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

    <!-- ACERCA DE -->
    <section class="section" id="about">
        <br><br>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <h6 class="xs-font mb-0">FERRETERIA</h6>
                    <h3 class="section-title">Sobre Nosotros</h3>
                    <p>En [Nombre de la Ferretería], nuestra misión es simple pero poderosa: brindarte los productos y
                        servicios que necesitas para hacer realidad tus proyectos. Nos esforzamos por ofrecer una
                        experiencia de compra sin complicaciones, donde encuentres todo lo que buscas bajo un mismo
                        techo.</p>
                </div>
                <div class="col-lg-4 text-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="javascript:void(0)" class="card border-0 text-dark">
                                <img class="card-img-top" src="../../../PROYECTO-ING-WEB/VISTA/imgs/FERRETERIA/ferreteria01.jpg" alt="FERRETERIA_IMAGEN_01" height="300">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- OFERTAS -->
    <section class="section" id="offer">
        <div class="container">
            <h6 class="xs-font mb-0">OFERTAS</h6>
            <h3 class="section-title mb-4">DESCUENTOS DE LA SEMANA</h3>
            <div class="row text-center">
                <div class="col-lg-4">
                    <a href="javascript:void(0)" class="card border-0 text-dark">
                        <img class="card-img-top" src="../../../PROYECTO-ING-WEB/VISTA/imgs/OFERTA/oferta01.jpeg" alt="FERRETERIA_OFERTA_01" width="300" height="300">
                        <span class="card-body">
                            <h4 class="title mt-4">[Nombre_del_Producto_Oferta01]</h4>
                            <p class="xs-font">Descripcion</p>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- DESTACADOS -->
    <section class="section" id="portfolio">
        <!-- Categoria 01 -->
        <div class="container">
            <h6 class="xs-font mb-0">DESTACADOS DE LA SEMANA</h6>
            <h3 class="section-title pb-4">CATEGORIA 01</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <a href="javascript:void(0)" class="item expertises-item">
                <img src="../../../PROYECTO-ING-WEB/VISTA/imgs/DESTACADO/alicateuniversal200mm.jpg"alt="PRODUCTO01" class="box-shadow" height="200">
                <h6 class="mt-3 mb-2">[NOMBRE]</h6>
                <p class="xs-font">Descripcion: </p>
                <p class="xs-font">Precio: </p>
                <p class="xs-font">Cantidad: </p>
                <p class="xs-font">Categoria: </p>
                <p class="xs-font">Marca: </p>
            </a>
            <a href="javascript:void(0)" class="item expertises-item">
                <img src="../../../PROYECTO-ING-WEB/VISTA/imgs/DESTACADO/atornilladoraato655.jpg"alt="PRODUCTO02" class="box-shadow" height="200">
                <h6 class="mt-3 mb-2">[NOMBRE]</h6>
                <p class="xs-font">Descripcion: </p>
                <p class="xs-font">Precio: </p>
                <p class="xs-font">Cantidad: </p>
                <p class="xs-font">Categoria: </p>
                <p class="xs-font">Marca: </p>
            </a>
            <a href="javascript:void(0)" class="item expertises-item">
                <img src="../../../PROYECTO-ING-WEB/VISTA/imgs/DESTACADO/brocabrc023.jpg"alt="PRODUCTO03" class="box-shadow" height="200">
                <h6 class="mt-3 mb-2">[NOMBRE]</h6>
                <p class="xs-font">Descripcion: </p>
                <p class="xs-font">Precio: </p>
                <p class="xs-font">Cantidad: </p>
                <p class="xs-font">Categoria: </p>
                <p class="xs-font">Marca: </p>
            </a>
            <a href="javascript:void(0)" class="item expertises-item">
                <img src="../../../PROYECTO-ING-WEB/VISTA/imgs/DESTACADO/fresafre401.jpg"alt="PRODUCTO04" class="box-shadow" height="200">
                <h6 class="mt-3 mb-2">[NOMBRE]</h6>
                <p class="xs-font">Descripcion: </p>
                <p class="xs-font">Precio: </p>
                <p class="xs-font">Cantidad: </p>
                <p class="xs-font">Categoria: </p>
                <p class="xs-font">Marca: </p>
            </a>
        </div>
        <br><br>
    </section>

    <!-- Core Scripts -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    
    <!-- Bootstrap 3 affix -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.affix.js"></script>
    
    <!-- Owl carousel -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/js/owl.carousel.js"></script>

    <!-- Ollie JS -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/js/Ollie.js"></script>

    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/cerrarsesion.js"></script>
</body>

</html>
