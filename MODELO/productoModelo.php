<?php
include 'conexion.php';

class ProductoModelo {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerCategorias() {
        $sql = "SELECT id_categoria, nombre_categoria FROM categoria";
        $result = $this->conn->query($sql);

        $categorias = array();

        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $categorias[$row['id_categoria']] = $row['nombre_categoria'];
            }
        }
        return $categorias;
    }
    public function obtenerMarcas() {
        $sql = "SELECT id_marca, nombre_marca FROM marca";
        $result = $this->conn->query($sql);

        $marcas = array();

        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $marcas[$row['id_marca']] = $row['nombre_marca'];
            }
        }
        return $marcas;
    }
    public function obtenerProveedores() {
        $sql = "SELECT id_proveedor, nombre_proveedor FROM proveedor";
        $result = $this->conn->query($sql);

        $proveedores = array();

        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $proveedores[$row['id_proveedor']] = $row['nombre_proveedor'];
            }
        }
        return $proveedores;
    }

    public function obtenerProductos() {
        $sql = "SELECT p.*, c.nombre_categoria, m.nombre_marca, pr.nombre_proveedor
                FROM ferreteria.producto p
                JOIN ferreteria.categoria c ON p.categoria_id_categoria = c.id_categoria
                JOIN ferreteria.marca m ON p.marca_id_marca = m.id_marca
                JOIN ferreteria.proveedor pr ON p.proveedor_id_proveedor = pr.id_proveedor";

        $result = $this->conn->query($sql);

        $productos = array();

        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        } else {
            throw new Exception("Error en la consulta SQL para obtener productos: " . $this->conn->error);
        }

        return $productos;
    }

    public function agregarProducto($nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor) {
        $sql = "CALL GenerarProducto(?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $this->conn->error);
        }
    
        $stmt->bind_param("ssdisss", $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    
        $stmt->close();
    }    

    public function modificarProducto($id, $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor) {
        $sql = "CALL ModificarProducto(?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issdisss", $id, $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor);
        
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al modificar el producto: " . $stmt->error;
            return false;
        }
        
        $stmt->close();
    }
    

    public function eliminarProducto($id) {
        $sql = "DELETE FROM producto WHERE id_producto = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function restaurarProducto($id) {
        $sql = "UPDATE producto SET eliminado = 0 WHERE id_producto = $id";
    
        if ($this->conn->query($sql) === TRUE) {
            echo "Producto restaurado exitosamente.";
        } else {
            echo "Error al restaurar el producto: " . $this->conn->error;
        }
    }            
}
?>