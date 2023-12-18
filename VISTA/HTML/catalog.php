<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Dirección del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "artescocielo10"; // Contraseña de la base de datos
$dbname = "ferreteria"; // Nombre de la base de datos

// Crear una nueva instancia de la clase mysqli para establecer la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); // Si hay un error, detener el script y mostrar un mensaje
}

$sql = "SELECT nombre_producto, descripcion_producto, precio_producto, cantidad_producto, ruta_imagen FROM producto"; // Consulta SQL para seleccionar todos los registros de la tabla especificada
$result = $conn->query($sql); // Ejecutar la consulta y almacenar el resultado en la variable $result

$data = array(); // Inicializar un array para almacenar los datos recuperados de la base de datos

// Recorrer cada fila del resultado y agregarla al array $data
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$sqlaux = "SELECT nombre_producto FROM producto";
$resultaux = $conn->query($sqlaux);
$dataaux = array(); // Inicializar el array para almacenar los nombres de productos

while ($rowaux = $resultaux->fetch_assoc()) {
    $dataaux[] = $rowaux['nombre_producto'];
}

// Cerrar la conexión a la base de datos
$conn->close();
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
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/CSS/container.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/CSS/shoppingcart.css">

</head>


<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav class="navbar navbar-light bg-light navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../../../PROYECTO-ING-WEB/VISTA/assets/imgs/brand.svg"
                    alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Navigation Links -->
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/HTML/index.html">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/HTML/catalog.html">CATALOGO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/HTML/ContactUs.html">CONTACTANOS</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <header>
        <h1>Ferretería Catálogo</h1>
    </header>

    <!-- CATEGORIA 01 -->
    <section class="section" id="portfolio">
        <div class="container">
            <h6 class="xs-font mb-0">CATEGORIA 01</h6>
            <h3 class="section-title pb-4">[Nombre de categoria]</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <?php foreach ($data as $row): ?>
                <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux)): ?>
                    <a href="javascript:void(0)" class="item expertises-item">
                        <img src="<?php echo $row['ruta_imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" >
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['nombre_producto']; ?></h2>
                            <p class="xs-font product-description">Descripción: <?php echo $row['descripcion_producto']; ?></p>
                            <p class="xs-font product-brand">Marca: </p>
                            <p class="xs-font product-stock">Stock: <?php echo $row['cantidad_producto']; ?></p>
                            <p class="price product-price">Precio: <?php echo $row['precio_producto']; ?></p>
                            <button type="submit" class="buy-button" onclick="addToCartAndShowDetails()">AÑADIR AL CARRITO</button>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- CATEGORIA 02 -->
    <section class="section" id="portfolio">
        <div class="container">
            <h6 class="xs-font mb-0">CATEGORIA 01</h6>
            <h3 class="section-title pb-4">[Nombre de categoria]</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <?php foreach ($data as $row): ?>
                <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux)): ?>
                    <a href="javascript:void(0)" class="item expertises-item">
                        <img src="<?php echo $row['ruta_imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" >
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['nombre_producto']; ?></h2>
                            <p class="xs-font product-description">Descripción: <?php echo $row['descripcion_producto']; ?></p>
                            <p class="xs-font product-brand">Marca: </p>
                            <p class="xs-font product-stock">Stock: <?php echo $row['cantidad_producto']; ?></p>
                            <p class="price product-price">Precio: <?php echo $row['precio_producto']; ?></p>
                            <button type="submit" class="buy-button" onclick="addToCartAndShowDetails()">AÑADIR AL CARRITO</button>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- CATEGORIA 03 -->
    <section class="section" id="portfolio">
        <div class="container">
            <h6 class="xs-font mb-0">CATEGORIA 01</h6>
            <h3 class="section-title pb-4">[Nombre de categoria]</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <?php foreach ($data as $row): ?>
                <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux)): ?>
                    <a href="javascript:void(0)" class="item expertises-item">
                        <img src="<?php echo $row['ruta_imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" >
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['nombre_producto']; ?></h2>
                            <p class="xs-font product-description">Descripción: <?php echo $row['descripcion_producto']; ?></p>
                            <p class="xs-font product-brand">Marca: </p>
                            <p class="xs-font product-stock">Stock: <?php echo $row['cantidad_producto']; ?></p>
                            <p class="price product-price">Precio: <?php echo $row['precio_producto']; ?></p>
                            <button type="submit" class="buy-button" onclick="addToCartAndShowDetails()">AÑADIR AL CARRITO</button>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- CATEGORIA 04 -->
    <section class="section" id="portfolio">
        <div class="container">
            <h6 class="xs-font mb-0">CATEGORIA 01</h6>
            <h3 class="section-title pb-4">[Nombre de categoria]</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <?php foreach ($data as $row): ?>
                <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux)): ?>
                    <a href="javascript:void(0)" class="item expertises-item">
                        <img src="<?php echo $row['ruta_imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" >
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['nombre_producto']; ?></h2>
                            <p class="xs-font product-description">Descripción: <?php echo $row['descripcion_producto']; ?></p>
                            <p class="xs-font product-brand">Marca: </p>
                            <p class="xs-font product-stock">Stock: <?php echo $row['cantidad_producto']; ?></p>
                            <p class="price product-price">Precio: <?php echo $row['precio_producto']; ?></p>
                            <button type="submit" class="buy-button" onclick="addToCartAndShowDetails()">AÑADIR AL CARRITO</button>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- CATEGORIA 05 -->
    <section class="section" id="portfolio">
        <div class="container">
            <h6 class="xs-font mb-0">CATEGORIA 01</h6>
            <h3 class="section-title pb-4">[Nombre de categoria]</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <?php foreach ($data as $row): ?>
                <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux)): ?>
                    <a href="javascript:void(0)" class="item expertises-item">
                        <img src="<?php echo $row['ruta_imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" >
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['nombre_producto']; ?></h2>
                            <p class="xs-font product-description">Descripción: <?php echo $row['descripcion_producto']; ?></p>
                            <p class="xs-font product-brand">Marca: </p>
                            <p class="xs-font product-stock">Stock: <?php echo $row['cantidad_producto']; ?></p>
                            <p class="price product-price">Precio: <?php echo $row['precio_producto']; ?></p>
                            <button type="submit" class="buy-button" onclick="addToCartAndShowDetails()">AÑADIR AL CARRITO</button>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- CATEGORIA 06 -->
    <section class="section" id="portfolio">
        <div class="container">
            <h6 class="xs-font mb-0">CATEGORIA 01</h6>
            <h3 class="section-title pb-4">[Nombre de categoria]</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <?php foreach ($data as $row): ?>
                <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux)): ?>
                    <a href="javascript:void(0)" class="item expertises-item">
                        <img src="<?php echo $row['ruta_imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" >
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['nombre_producto']; ?></h2>
                            <p class="xs-font product-description">Descripción: <?php echo $row['descripcion_producto']; ?></p>
                            <p class="xs-font product-brand">Marca: </p>
                            <p class="xs-font product-stock">Stock: <?php echo $row['cantidad_producto']; ?></p>
                            <p class="price product-price">Precio: <?php echo $row['precio_producto']; ?></p>
                            <button type="submit" class="buy-button" onclick="addToCartAndShowDetails()">AÑADIR AL CARRITO</button>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- CATEGORIA 07 -->
    <section class="section" id="portfolio">
        <div class="container">
            <h6 class="xs-font mb-0">CATEGORIA 01</h6>
            <h3 class="section-title pb-4">[Nombre de categoria]</h3>
        </div>
        <div id="owl-portfolio" class="owl-carousel owl-theme mt-4">
            <?php foreach ($data as $row): ?>
                <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux)): ?>
                    <a href="javascript:void(0)" class="item expertises-item">
                        <img src="<?php echo $row['ruta_imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" >
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['nombre_producto']; ?></h2>
                            <p class="xs-font product-description">Descripción: <?php echo $row['descripcion_producto']; ?></p>
                            <p class="xs-font product-brand">Marca: </p>
                            <p class="xs-font product-stock">Stock: <?php echo $row['cantidad_producto']; ?></p>
                            <p class="price product-price">Precio: <?php echo $row['precio_producto']; ?></p>
                            <button type="submit" class="buy-button" onclick="addToCartAndShowDetails()">AÑADIR AL CARRITO</button>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Parte del carrito -->
        <main id="main" role="main">
            <div id="shopify-section-cart-template" class="shopify-section">
              <section data-section-id="cart-template" data-section-type="cart" data-section-settings='{"showShippingEstimator": false}'>
                <div class="container">
                  <h1 class="page__title heading h1">Mi carrito</h1>
                  <button type="button" name="checkout" class="page__button-action button button--primary button--full button--large hidden-tablet-and-up" onclick="checkout()">Caja</button>
                </div>
          
                <div class="cart-wrapper">
                  <div class="cart-wrapper__inner">
                    <div class="cart-wrapper__inner-inner">
                      <div class="container container--flush">
                        <div class="card">
                          <div class="table-wrapper">
                            <table class="line-item-table table table--loose">
                              <thead class="hidden-phone">
                                <tr>
                                  <th>Producto</th>
                                  <th class="table__cell--center">Descripcion</th>
                                  <th class="table__cell--center">Cantidad</th>
                                  <th class="table__cell--right">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="line-item line-item--stack">
                                    <!-- Información del producto -->
                                    <td class="line-item__product-info">
                                        <div id="productDetailsContainer" class="line-item__product-info-wrapper product-details" style="display: none;">
                                            <div class="line-item__image-wrapper">
                                                <img src="../../../PROYECTO-ING-WEB/VISTA/imgs/CATALOGO/C1/alicatesalic001.jpg" alt="Producto 1">
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Detalles del producto -->
                                    <td class="line-item__product-info align-left">
                                        <div id="productDetailsContainer" class="product-details" style="display: none;">
                                            <div class="line-item__meta">
                                            <?php foreach ($data as $row): ?>
                                                <a class="line-item__vendor link" href="#">Categoria 01</a>
                                                <a href="#" class="line-item__title link text--strong">Producto: <?php echo $row['nombre_producto']; ?></a>
                                                <div class="line-item__price-list">
                                                    <span class="line-item__price">Precio: <?php echo $row['precio_producto']; ?></span>
                                                </div>
                                                <?php endforeach; ?>
                                                <a href="/cart/change?quantity=0&id=producto_id:linea_id" data-action="decrease-quantity"
                                                    data-quantity="0" data-line-id="producto_id:linea_id" class="line-item__quantity-remove link">Quitar del carrito</a>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Cantidad del Producto -->
                                    <td class="line-item__quantity table__cell--center hidden-phone">
                                        <div class="product-details" class="product-details" style="display: none;">
                                            <!-- Botón para disminuir la cantidad en 1 -->
                                            <button type="button" id="decreaseButton" data-action="decrease-quantity" aria-label="Disminuir la cantidad en 1" title="Disminuir la cantidad en 1">
                                                <!-- Icono de resta -->
                                                <svg focusable="false" class="icon icon--action" viewBox="0 0 10 2" role="presentation">
                                                    <path d="M10 0v2H0V0z" fill="currentColor"></path>
                                                </svg>
                                            </button>

                                            <!-- Entrada de cantidad -->
                                            <input aria-label="Cantidad" class="quantity-selector__value" inputmode="numeric" id="quantityInput" data-current-value="1" size="2">

                                            <!-- Botón para aumentar la cantidad en 1 -->
                                            <button type="button" id="increaseButton" data-action="increase-quantity" aria-label="Aumentar la cantidad en 1" title="Aumentar la cantidad en 1">
                                                <!-- Icono de suma -->
                                                <svg focusable="false" class="icon icon--action" viewBox="0 0 10 10" role="presentation">
                                                    <path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z" fill="currentColor" fill-rule="evenodd"></path>
                                                </svg>
                                            </button>   
                                        </div>
                                    </td>

                                    <!-- Precio Total del Producto -->
                                    <td class="line-item__line-price table__cell--right hidden-phone">
                                        <div class="product-details" class="product-details" style="display: none;">
                                            <?php foreach ($data as $row): ?>
                                                <span id="totalPrice">Total: $<?php echo $row['precio_producto']; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            var quantityInput = document.querySelector('#quantityInput');
                                            var totalPriceSpan = document.querySelector('#totalPrice');

                                            quantityInput.addEventListener('input', function () {
                                                updateTotalPrice(0); // Actualizar el precio cuando se cambia la cantidad
                                            });

                                            function updateTotalPrice(change) {
                                                var currentQuantity = parseInt(quantityInput.value);
                                                currentQuantity += change;

                                                // Asegurar que la cantidad no sea negativa
                                                if (currentQuantity < 0) {
                                                    currentQuantity = 0;
                                                }

                                                var pricePerProduct = <?php echo $row['precio_producto']; ?>;
                                                var totalPrice = currentQuantity * pricePerProduct;

                                                totalPriceSpan.textContent = 'Total: $' + totalPrice;
                                            }
                                        });
                                    </script>

                                </tr>
                            </tbody>
                            </table>
                          </div>
                        </div>
                        <form class="cart-recap" method="post" action="/cart" id="cart_form" novalidate="novalidate">
                            <div id="cart" class="cart-recap__scroller">
                                <h2>Carrito de compras</h2>
                                <div class="card">
                                    <div class="card__section">
                                        <ul id="cart-items"></ul>
                                        <div class="cart-recap__price-line text--pull">
                                            <p id="total"></p>
                                        </div>
                                        <button type="submit" name="checkout" class="cart-recap__checkout button button--primary button--full button--large" onclick="checkout()">Caja</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Ejemplo de fila de producto en la tabla -->
                        <td class="line-item__line-price table__cell--right hidden-phone">
                            <div class="product-details">
                                <?php foreach ($data as $row): ?>
                                    <div class="product-row" data-product-id="<?php echo $row['id_producto']; ?>">
                                        <span class="total-price">Total: $<?php echo $row['precio_producto']; ?></span>
                                        <input type="number" class="quantity-input" value="1" min="1">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </td>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                // Obtener elementos relevantes
                                var quantityInputs = document.querySelectorAll('.quantity-input');
                                var totalPriceElements = document.querySelectorAll('.total-price');
                                var totalElement = document.getElementById('total');

                                // Manejar eventos de cambio en la cantidad
                                quantityInputs.forEach(function (input) {
                                    input.addEventListener('input', updateCart);
                                });

                                // Función para actualizar el carrito
                                function updateCart() {
                                    var total = 0;

                                    quantityInputs.forEach(function (input, index) {
                                        var quantity = parseInt(input.value);
                                        var pricePerProduct = parseInt(totalPriceElements[index].textContent.replace('Total: $', ''));

                                        total += quantity * pricePerProduct;
                                    });

                                    // Actualizar el total en el carrito
                                    totalElement.textContent = 'Total: $' + total.toFixed(2);
                                }
                            });

                            function checkout() {
                                // Agregar aquí la lógica para enviar el formulario de compra
                                alert('Realizando checkout');
                            }
                        </script>

                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </main>
         <!-- Core Scripts -->
        <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/jquery/jquery-3.4.1.js"></script>
        <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
        
        <!-- Bootstrap 3 affix -->
        <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/bootstrap/bootstrap.affix.js"></script>
        
        <!-- Owl carousel -->
        <script src="../../../PROYECTO-ING-WEB/VISTA/assets/vendors/owl-carousel/js/owl.carousel.js"></script>

        <!-- Ollie JS -->
        <script src="../../../PROYECTO-ING-WEB/VISTA/assets/js/Ollie.js"></script>
        <!-- Optional: jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- catalog.js -->           
        <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/JS/addtocartprueba.js"></script>
        <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/JS/addtocart.js"></script>
        <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/JS/datos.js"></script>
        <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/JS/dismaum.js"></script>
        <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/JS/cantidad.js"></script>

</body>

</html>
