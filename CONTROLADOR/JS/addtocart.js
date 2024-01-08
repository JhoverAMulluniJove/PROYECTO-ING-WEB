var cart = [];
var products = JSON.parse(document.body.getAttribute('data-products'));

function addToCart(price, productName) {
    
    var existingProduct = cart.find(item => item.name === productName);

    if (existingProduct) {
        
        existingProduct.quantity++;
    } else {
        
        cart.push({ name: productName, price: price, quantity: 1 });
    }

    updateCartTable();

    updateTotal();
}

function updateCartTable() {
    var tableBody = document.getElementById('cart-table').getElementsByTagName('tbody')[0];
    
    tableBody.innerHTML = '';

    cart.forEach(function (item) {
        var row = tableBody.insertRow();
        
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        cell1.textContent = item.name;
        cell2.innerHTML = '<input type="number" min="1" value="' + item.quantity + '">';
        cell3.textContent = 'S/.' + item.price.toFixed(2);
        cell4.textContent = 'S/.' + (item.price * item.quantity).toFixed(2);
        
        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'Eliminar';
        deleteButton.type = 'button';
        deleteButton.addEventListener('click', function () {
            removeFromCart(cart.indexOf(item));
        });
        cell5.appendChild(deleteButton);
    });
}

function updateQuantity(index, newQuantity) {
    
    cart[index].quantity = parseInt(newQuantity);

    updateCartTable();

    updateTotal();
}

function removeFromCart(index) {
    
    cart.splice(index, 1);

    updateCartTable();

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
    alert('¡Pago realizado con éxito!');
}
