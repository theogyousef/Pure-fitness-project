//  jQuery for live search in index
$(document).ready(function() {
    $('#submitMailButton').click(function() {
      $.ajax({
        type: "POST",
        url: "../controller/indexMail.php", 
        data: {
          email: $('#email').val(),
          firstname: 'Friend', 
          submitemail: true 
        },
        success: function(response) {
          $('#message').text(response);
        },
        error: function() {
          $('#message').text('An error occurred while sending the email.');
        }
      });
    });
  });

//   jQuery for the quick view
  
  $(document).ready(function() {
    $('.quick-view').on('click', function(event) {
      event.preventDefault(); 
      var productId = $(this).data('product-id'); 
  
      // << fetching the product details
      $.ajax({
    url: '../controller/quickview.php',
    type: 'GET',
    cache: false,
    data: { 'id': productId },
    dataType: 'json',
        success: function(product) {
          
          // << Update the details of the product
          $('#quickViewModalLabel').text(product.name);
          var imagePath = product.file;
          $('#mainProductImage').attr('src', imagePath);
          $('.brand').text(product.type); 
          $('.act-price').text(product.price + ' EGP'); 
          $('.about').text(product.description);
          $('#prodname').text(product.name); 
  
          $('#quickViewModal').modal('show');
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error: ' + status + error);
          alert('Error: Could not retrieve product details.');
        }
      });
    });
  });
  