<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';

try {
    $productoController = new ProductoController($conn);

    $categorias = $productoController->obtenerCategorias();

    $data = $productoController->obtenerProductos();
    $dataaux = $productoController->obtenerNombresProductos();

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();
    die();
}

?>

<?php foreach ($categorias as $categoria_id => $categoria_nombre): ?>
    <section class="section<?php echo $categoria_id; ?>" id="portfolio<?php echo $categoria_id; ?>">
        <div class="container mt-4">
            <h6 class="xs-font mb-0"><?php echo $categoria_nombre; ?></h6>
            <h3 class="section-title pb-4"><?php echo $categoria_id; ?></h3>
        </div>
        <div class="container-fluid">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Proveedor</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Añadir al Carrito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                        <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux) && $row['categoria_id_categoria'] == $categoria_id): ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $row['ruta_imagen']; ?>" class="img-thumbnail" alt="<?php echo $row['nombre_producto']; ?>" style="max-width: 100px; height: auto;">
                                </td>
                                <td><?php echo $row['nombre_producto']; ?></td>
                                <td><?php echo $row['nombre_marca']; ?></td>
                                <td><?php echo $row['nombre_proveedor']; ?></td>
                                <td><?php echo $row['descripcion_producto']; ?></td>
                                <td><?php echo $row['cantidad_producto']; ?></td>
                                <td>S/.<?php echo $row['precio_producto']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-block" onclick="addToCart(<?php echo $row['precio_producto']; ?>, '<?php echo addslashes($row['nombre_producto']); ?>')">AÑADIR AL CARRITO</button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
<?php endforeach; ?>
