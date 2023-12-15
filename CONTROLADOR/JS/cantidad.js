// Añade un evento de cambio en la entrada de cantidad para actualizar el total en tiempo real
document.querySelector('.quantity-selector__value').addEventListener('change', updateTotal);

function updateTotal() {
    // Obtiene la cantidad y el precio
    const quantity = parseInt(document.querySelector('.quantity-selector__value').value);
    const price = 15.99; // Reemplaza esto con el precio real obtenido de tu lógica

    // Calcula el total
    const total = quantity * price;

    // Actualiza el contenido del elemento del total
    document.querySelector('.line-item__line-price span').textContent = `Total: $${total.toFixed(3)}`;
}

// Ejecuta la función al cargar la página para mostrar el total inicial
updateTotal();
