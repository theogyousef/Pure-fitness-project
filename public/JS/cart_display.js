document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const decrementButton = selector.querySelector('.decrement');
        const incrementButton = selector.querySelector('.increment');
        const quantityInput = selector.querySelector('.quantity-input');
        const productId = quantityInput.getAttribute('data-product-id');
        console.log('Product ID:', productId);

        decrementButton.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value, 10);
            if (quantity > 1) {
                quantity--;
                updateQuantity(productId, quantity);
            }
        });

        incrementButton.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value, 10);
            quantity++;
            updateQuantity(productId, quantity);
        });
    });

    function updateQuantity(productId, newQuantity) {
        // Use AJAX to update the server-side quantity
        const formData = new FormData();
        formData.append('updatecart', true);
        formData.append('product_id', productId);
        formData.append('quantity', newQuantity);

        fetch('update_cart.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Optionally handle success, e.g., update total price
                    console.log('Quantity updated successfully');

                    // Reload the page after successful update
                    window.location.reload();
                } else {
                    console.error('Failed to update quantity:', data.message);
                }
            })
            .catch(error => {
                console.error('Error updating quantity:', error);
            });
    }

});

