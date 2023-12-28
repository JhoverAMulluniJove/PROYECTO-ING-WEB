var cart = []; // Array para almacenar los productos en el carrito
var products = JSON.parse(document.body.getAttribute('data-products'));

function addToCart(price, productName) {
    // Verificar si el producto ya está en el carrito
    var existingProduct = cart.find(item => item.name === productName);

    if (existingProduct) {
        // Si el producto ya está en el carrito, incrementa la cantidad
        existingProduct.quantity++;
    } else {
        // Si el producto no está en el carrito, agrégalo
        cart.push({ name: productName, price: price, quantity: 1 });
    }

    // Actualiza la tabla del carrito
    updateCartTable();

    // Calcula y actualiza el total
    updateTotal();
}

function updateCartTable() {
    var tableBody = document.getElementById('cart-table').getElementsByTagName('tbody')[0];
    // Limpia la tabla antes de actualizar
    tableBody.innerHTML = '';

    cart.forEach(function (item) {
        var row = tableBody.insertRow();
        
        // Crear celdas de manera más segura utilizando createElement
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        // Agregar contenido a las celdas
        cell1.textContent = item.name;
        cell2.innerHTML = '<input type="number" min="1" value="' + item.quantity + '">';
        cell3.textContent = 'S/.' + item.price.toFixed(2);
        cell4.textContent = 'S/.' + (item.price * item.quantity).toFixed(2);
        
        // Crear un botón y agregar un listener para eliminar
        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'Eliminar';
        deleteButton.type = 'button';
        deleteButton.addEventListener('click', function () {
            removeFromCart(cart.indexOf(item));
        });
        cell5.appendChild(deleteButton);
    });
}

// Resto del código sin cambios

function updateQuantity(index, newQuantity) {
    // Actualiza la cantidad del producto en el carrito
    cart[index].quantity = parseInt(newQuantity);

    // Actualiza la tabla del carrito
    updateCartTable();

    // Calcula y actualiza el total
    updateTotal();
}

function removeFromCart(index) {
    // Elimina el producto del carrito
    cart.splice(index, 1);

    // Actualiza la tabla del carrito
    updateCartTable();

    // Calcula y actualiza el total
    updateTotal();
}

function updateTotal() {
    var totalAmount = 0;

    cart.forEach(function (item) {
        totalAmount += item.price * item.quantity;
    });

    document.getElementById('total-amount').innerHTML = 'S/.' + totalAmount.toFixed(2);
}

function checkout() {
    // Implementa aquí la lógica para el proceso de pago
    alert('¡Pago realizado con éxito!');
}
