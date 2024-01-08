<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FERRETERIA - CONTACTANOS</title>

    <!-- Font icons -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- Owl carousel -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/css/ollie.css">


    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/shoppingcart.css">

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
                  <!-- Navigation Links -->
                  <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/indexlogin.php">INICIO</a></li>
                  <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/catalog.php">CATALOGO</a></li>
                  <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/ContactUs.php">CONTACTANOS</a></li>
                  <li class="nav-item"><a class="btn btn-primary" href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                </ul>
              </div>
        </div>
    </nav>
    <br><br>
  
    <!--CONTACTANOS-->
    <section id="contact" class="section pb-0">
        <div class="container">
            <h6 class="xs-font mb-0">FERRETERIA</h6>
            <h3 class="section-title mb-5">CONTACTANOS</h3>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8 col-lg-7">
                    <form class="contact-form">
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Tu mensaje"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Enviar">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 d-none d-md-block order-1">
                    <ul class="list">
                        <li class="list-head">
                            <h6>DATOS DE CONTACTO</h6>
                        </li>
                        <li class="list-body">
                            <p class="py-2">Contáctenos y nos comunicaremos con usted dentro de las 24 horas</p>
                            <p class="py-2"><i class="ti-location-pin"></i> 12345 Fake ST NoWhere AB Country</p>
                            <p class="py-2"><i class="ti-email"></i>  info@website.com</p>
                            <p class="py-2"><i class="ti-microphone"></i> (123) 456-7890</p>
                        </li>
                    </ul> 
                </div>
            </div>
        </div>
        <div class="container text-center">
            <img src="../../../PROYECTO-ING-WEB/VISTA/imgs/CONTACTANOS/almacen01.jpg"alt="PRODUCTO01" class="box-shadow" width="1110" height="300">
        </div>
    </section>

    <!-- Page Footer -->
    <footer class="footer py-4 bg-light"> 
        <div class="container text-center">
            <p class="mb-4 small">Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a href="http://www.devcrud.com">DevCRUD</a></p>
            <div class="social-links">
                <a href="javascript:void(0)" class="text-dark"><i class="ti-facebook"></i></a>
                <a href="javascript:void(0)" class="text-dark"><i class="ti-twitter-alt"></i></a>
                <a href="javascript:void(0)" class="text-dark"><i class="ti-google"></i></a>
                <a href="javascript:void(0)" class="text-dark"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)" class="text-dark"><i class="ti-instagram"></i></a>
                <a href="javascript:void(0)" class="text-dark"><i class="ti-rss"></i></a>
            </div>
        </div>
    </footer>
    <!-- End of page footer -->

    <!-- Core Scripts -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- Bootstrap 3 affix -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Owl carousel -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/js/owl.carousel.js"></script>

    <!-- Ollie JS -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/js/Ollie.js"></script>

    <!-- core  -->
    <script src="../../../PROYECTO-ING-WEB/VISTApassets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../../../PROYECTO-ING-WEB/VISTAassets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/CerrarSesion.js"></script>
</body>

</html>
