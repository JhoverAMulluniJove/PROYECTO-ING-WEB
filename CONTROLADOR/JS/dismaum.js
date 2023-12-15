// Obtén los elementos relevantes
const decreaseButton = document.getElementById('decreaseButton');
const increaseButton = document.getElementById('increaseButton');
const quantityInput = document.getElementById('quantityInput');

// Establece el valor inicial de la entrada de cantidad a 1
quantityInput.value = 1;

// Agrega eventos de clic a los botones
decreaseButton.addEventListener('click', decreaseQuantity);
increaseButton.addEventListener('click', increaseQuantity);

// Función para disminuir la cantidad
function decreaseQuantity() {
    let currentQuantity = parseInt(quantityInput.value);
    
    // Asegúrate de que la cantidad no disminuya por debajo de 1
    if (currentQuantity > 1) {
        currentQuantity--;
        updateQuantity(currentQuantity);
    }
}

// Función para aumentar la cantidad
function increaseQuantity() {
    let currentQuantity = parseInt(quantityInput.value);
    currentQuantity++;
    updateQuantity(currentQuantity);
}

// Función para actualizar la entrada de cantidad
function updateQuantity(newQuantity) {
    quantityInput.value = newQuantity;
    // Llama a la función de actualización total si es necesario
    updateTotal();
}

// Función para actualizar el total basado en la cantidad y el precio
function updateTotal() {
    const price = 15.99; // Reemplaza esto con el precio real
    const quantity = parseInt(quantityInput.value);
    const total = price * quantity;

    // Actualiza el contenido del elemento del total
    document.querySelector('.line-item__line-price span').textContent = `Total: $${total.toFixed(3)}`;
}
