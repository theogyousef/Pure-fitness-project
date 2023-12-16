$(document).ready(function() {
    $("#searchInput").keyup(function() {
        var searchText = $(this).val();
        if (searchText.length > 0) {
            $.ajax({
                url: '../controller/searchproduct.php', 
                type: 'GET',
                data: {
                    query: searchText,
                    type: 'product' 
                },
                success: function(response) {
                    var products = JSON.parse(response);

                    if (products.length === 0) {
                        // << If no users are found, display "product not found" >>
                        $(".custom-table tbody").html('<tr><td colspan="9">product not found</td></tr>');
                    } else {
                    var rowsHtml = '';

                    $.each(products, function(index, product) {
                        rowsHtml += '<tr>';
                        rowsHtml += '<td>' + product.id + '</td>';
                        rowsHtml += '<td>' + product.name + '</td>';
                        rowsHtml += '<td>' + product.type + '</td>';
                        rowsHtml += '<td>' + product.price + '</td>';
                        rowsHtml += '<td>' + product.stock + '</td>';
                        rowsHtml += '<td><a href="editproduct?id=' + product.id + '" style="color: orange;"><span class="fas fa-edit"></span></a></td>';
                        rowsHtml += '<td><a href="deleteproduct?id=' + product.id + '" style="color: red;"><span class="fas fa-trash-alt"></span></a></td>';
                        rowsHtml += '</tr>';
                    });

                    $(".custom-table tbody").html(rowsHtml);
                }
                },
                error: function(err) {
                    $(".custom-table tbody").html('<tr><td colspan="7">Error searching products</td></tr>'); 
                }
            });
        } else {
            fetchAllProducts(); 
        }
    });
});

function fetchAllProducts() {
    $.ajax({
        url: '../controller/searchproduct.php', 
        type: 'GET',
        data: {
            query: '',
            html: 'true',
            type: 'product' 
        },
        success: function(response) {
            $(".custom-table tbody").html(response);
        },
        error: function(err) {
            $(".custom-table tbody").html('<tr><td colspan="7">Error fetching products</td></tr>'); // Adjust the colspan as needed
        }
    });
}
