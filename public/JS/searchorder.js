$(document).ready(function() {
    $("#searchInput").keyup(function() {
        var searchText = $(this).val();
        if (searchText.length > 0) {
            $.ajax({
                url: '../controller/searchorder.php', 
                type: 'GET',
                data: {
                    orderId: searchText 
                },
                success: function(response) {
                    var orders = JSON.parse(response);

                    if (orders.length === 0) {
                        $(".custom-table tbody").html('<tr><td colspan="6">Order not found</td></tr>');
                    } else {
                        var rowsHtml = '';
                        $.each(orders, function(index, order) {
                            rowsHtml += '<tr>';
                            rowsHtml += '<td>' + order.order_id + '</td>';
                            rowsHtml += '<td>' + order.status + '</td>';
                            rowsHtml += '<td>' + order.Date + ' at ' + order.time + '</td>';
                            rowsHtml += '<td>' + order.total + '</td>';
                            rowsHtml += '<td><a href="editorder?id=' + order.order_id + '" style="color: orange;"><span class="fas fa-edit"></span></a></td>';
                            rowsHtml += '<td><a href="vieworder?id=' + order.order_id + '" style="color: green;"><span class="fas fa-list-ol"></span></a></td>';
                            rowsHtml += '</tr>';
                        });

                        $(".custom-table tbody").html(rowsHtml);
                    }
                },
                error: function(err) {
                    $(".custom-table tbody").html('<tr><td colspan="6">Error searching orders</td></tr>');
                }
            });
        } else {
            fetchAllOrders(); 
        }
    });
});

function fetchAllOrders() {
    $.ajax({
        url: '../controller/searchorder.php', 
        type: 'GET',
        data: {
            query: '',
            html: 'true',
            type: 'order' 
        },
        success: function(response) {
            $(".custom-table tbody").html(response);
        },
        error: function(err) {
            $(".custom-table tbody").html('<tr><td colspan="7">Error fetching products</td></tr>'); // Adjust the colspan as needed
        }
    });
}