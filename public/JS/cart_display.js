document.querySelectorAll('.quantity-selector').forEach(selector => {
    const decrementButton = selector.querySelector('.decrement');
    const incrementButton = selector.querySelector('.increment');
    const quantityInput = selector.querySelector('.quantity-input');

    decrementButton.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value, 10);
        if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;
        }
    });

    incrementButton.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value, 10);
        quantity++;
        quantityInput.value = quantity;
    });
});


