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


$(document).ready(function () {
    // Use event delegation for dynamic elements
    $('.table-wishlist').on('click', '.decrement', function () {
        handleQuantityChange(this, -1);
    });

    $('.table-wishlist').on('click', '.increment', function () {
        handleQuantityChange(this, 1);
    });

    $('.table-wishlist').on('click', '.update-cart-button', function (e) {
        e.preventDefault();
        var form = $(this).closest('form');
        var quantity = form.find('.quantity-input').val(); // This line should be updated
        var productId = form.find('[name="product_id"]').val();

        // Validate the quantity (you may want to add additional validation)
        if (quantity <= 0) {
            alert('Quantity must be greater than zero.');
            return;
        }

        $.ajax({
            url: 'update_cart.php',
            method: 'POST',
            data: {
                updatecart: true,
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                // Handle success (if needed)
                console.log('Cart updated successfully');
                // Optionally, you might want to refresh the page or update the displayed quantity
            },
            error: function (error) {
                // Handle error (if needed)
                console.error('Error updating cart');
            }
        });
    });
});

function handleQuantityChange(element, delta) {
    var input = $(element).closest('.input-group').find('.quantity-input');
    var currentQuantity = parseInt(input.val());

    // Validate the quantity (you may want to add additional validation)
    if (currentQuantity + delta <= 0) {
        alert('Quantity must be greater than zero.');
        return;
    }

    input.val(currentQuantity + delta);
}





