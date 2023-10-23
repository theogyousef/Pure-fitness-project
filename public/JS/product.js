// change the image of the product
function change_image(image) {
    var mainProductImage = document.getElementById("mainProductImage");
    mainProductImage.src = image.src;
 }
  

//  The plus minus input to add to cart
  const decrementButton = document.getElementById("decrement");
  const incrementButton = document.getElementById("increment");
  const quantityInput = document.getElementById("quantity");
  

  decrementButton.addEventListener("click", () => {
      let quantity = parseInt(quantityInput.value, 10);
      if (quantity > 1) {
          quantity--;
          quantityInput.value = quantity;
      }
  });
  
  incrementButton.addEventListener("click", () => {
      let quantity = parseInt(quantityInput.value, 10);
      quantity++;
      quantityInput.value = quantity;
  });

