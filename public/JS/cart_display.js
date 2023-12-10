src = "https://code.jquery.com/jquery-3.6.0.min.js"

document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('.update-cart-button').addEventListener('click', function () {

        document.querySelectorAll('.quantity-selector').forEach(selector => {
            const quantityInput = selector.querySelector('.quantity-input');
            const productId = quantityInput.getAttribute('data-product-id');

            let newQuantity = parseInt(quantityInput.value, 10);
            if (newQuantity <= 0) {
                alert('Quantity must be greater than zero.');
                return;
            }

            quantityInput.value = newQuantity;

            const priceElement = selector.closest('tr').querySelector('.price');
            const unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
            const totalPrice = newQuantity * unitPrice;
            priceElement.textContent = totalPrice.toFixed(2) + ' EGP';

            const form = document.querySelector('form');
            const formQuantityInput = form.querySelector(`[name="quantity[${productId}]"]`);
            formQuantityInput.value = newQuantity;
        });

        document.querySelector('form').submit();
    });

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
});
