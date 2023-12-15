let cartItems = [];

function addToCart(productName, price) {
  cartItems.push({ name: productName, price: price });
  updateCart();
}

function updateCart() {
  const cartList = document.getElementById('cart-items');
  const totalElement = document.getElementById('total');
  let total = 0;

  // Clear previous items
  cartList.innerHTML = '';

  // Add items to the cart
  cartItems.forEach(item => {
    const listItem = document.createElement('li');
    listItem.className = 'cart-item';
    listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
    cartList.appendChild(listItem);

    // Update total
    total += item.price;
  });

  // Update total element
  totalElement.textContent = `Total: $${total.toFixed(2)}`;
}

function checkout() {
  // Implementa la lógica de procesamiento de pago aquí
  alert('Gracias por tu compra!');
  // Actualiza el carrito después de la compra
  cartItems = [];
  updateCart();

  // Redirige a la página de carrito de compras
  const shoppingCartURL = new URL('../../../PROYECTO-ING-WEB/VISTA/HTML/shoppingcart.html', window.location.origin);
  window.location.href = shoppingCartURL.href;
}
