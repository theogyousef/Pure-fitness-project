$(document).ready(function() {
    // Fetch products when page loads for the first time
    fetchData(1);

    // Rest of the event listeners and functions
    $('.pagination').on('click', '.page-link', function(e) {
        e.preventDefault();
        var page = $(this).data('page');
        fetchData(page);
    });

    $('#showItems').on('change', function() {
        fetchData(1);
    });

    function fetchData(page) {
        $.ajax({
            url: "../controller/pagination.php",
            type: "GET",
            data: {
                page: page,
                show: $('#showItems').val()
            },
            success: function(data) {
                $('.grid-container').html(data);
            }
        });
    }
});