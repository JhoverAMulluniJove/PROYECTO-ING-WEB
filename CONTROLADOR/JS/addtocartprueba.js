function addToCartAndShowDetails() {
  const productName = document.getElementById('name').innerText;
  const priceString = document.getElementById('price').innerText;
  const price = parseFloat(priceString.replace('$', ''));

  addToCart(productName, price);
  showProductDetails(productName);
}


function addToCart(productName, price) {
  // Implementa lógica para añadir al carrito aquí
  alert('Producto añadido al carrito: ' + productName + ' - Precio: $' + price);
}

function showProductDetails() {
  var productDetailsContainers = document.querySelectorAll(".product-details");
  productDetailsContainers.forEach(function (container) {
      container.style.display = "block";
  });
}
