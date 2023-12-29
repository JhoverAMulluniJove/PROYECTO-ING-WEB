<?php
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>FERRETERIA - CATALOGO</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="//www.ferreteriaweb.cl/cdn/shop/t/3/assets/theme.css?v=97500158340828915541612365466">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/css/ollie.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/CSS/catalog.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/CSS/table.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/CSS/container.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/CSS/shoppingcart.css">

</head>


<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home" data-products='<?php echo json_encode($data); ?>'>
    
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
                  <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/index.php">INICIO</a></li>
                  <!--<li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/CONTROLADOR/ProductoController.php">CATALOGO</a></li>-->
                  <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/contactusaux.php">CONTACTANOS</a></li>
                  <li class="nav-item"><a class="btn btn-primary" href="VISTA/login.php">Login</a></li>
                </ul>
              </div>
        </div>
    </nav>
    
    <br><br><br><br>
    <!-- Cabecera -->
    <header class="container">
        <br>
        <h1>Ferretería Catálogo</h1>
        <br>
    </header>
    
    <?php include('producto.php');?>  

    <br><br><br>    
    
    <form id="cart-form" action="" method="post">
        <table id="cart-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los productos en el carrito -->
            </tbody>
        </table>
        <div id="cart-total">
            <p>Total: <span id="total-amount">S/.0.00</span></p>
            <button type="button" class="btn btn-success" onclick="checkout()">Pagar</button>
        </div>
    </form>

    <!-- Core Scripts -->
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- Tu archivo de script externo -->
    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/addtocart.js"></script>

</body>

</html>