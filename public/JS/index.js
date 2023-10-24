
function change_image(image) {

    var container = document.getElementById("main-image");

    container.src = image.src;
  }

  const openBtn = document.getElementById('open_cart_btnn');
  const cart = document.querySelector('.sidecart');
  const closeBtn = document.getElementById('close_btn');
  const backdrop = document.querySelector('.backdrop');

  openBtn.addEventListener('click', openCart);
  closeBtn.addEventListener('click', closeCart);

  // open cart
  function openCart() {
    cart.classList.add('open');
    backdrop.style.display = 'block';
    backdrop.classList.add('show');
  }

  // close cart
  function closeCart() {
    cart.classList.remove('open');
    backdrop.classList.remove('show');
    backdrop.style.display = 'none';
  }

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

  const decrementButton2 = document.getElementById("decrement2");
  const incrementButton2 = document.getElementById("increment2");
  const quantityInput2 = document.getElementById("quantity2");


  decrementButton2.addEventListener("click", () => {
    let quantity = parseInt(quantityInput2.value, 10);
    if (quantity > 1) {
      quantity--;
      quantityInput2.value = quantity;
    }
  });

  incrementButton2.addEventListener("click", () => {
    let quantity = parseInt(quantityInput2.value, 10);
    quantity++;
    quantityInput2.value = quantity;
  });

  function change_image(image) {
  var mainProductImage = document.getElementById("mainProductImage");
  mainProductImage.src = image.src;
}

const reviews = document.querySelectorAll('.feedback-review');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
let currentIndex = 0;

function showReview(index) {
  reviews.forEach((review, i) => {
      review.style.transform = `translateX(-${100 * index}%)`;
  });
}

prevButton.addEventListener('click', () => {
  if (currentIndex > 0) {
      currentIndex--;
      showReview(currentIndex);
  }
});

nextButton.addEventListener('click', () => {
  if (currentIndex < reviews.length - 1) {
      currentIndex++;
      showReview(currentIndex);
  }
});

showReview(currentIndex);