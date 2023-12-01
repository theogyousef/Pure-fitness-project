function liveSearch() {
    var query = document.getElementById('search').value;
    var resultsContainer = document.getElementById('searchResults');

    if (query.length < 1) { 
    resultsContainer.innerHTML = '';
    return;
}


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            resultsContainer.innerHTML = ''; 

            response.forEach(function(item) {
                var resultItem = document.createElement('div');
                resultItem.className = 'search-result-item';

                var productLink = document.createElement('a');
                productLink.href = '/SWE/views/product?id=' + item.id;
                productLink.className = 'search-item';
                productLink.innerHTML = `
                    <div class="search-item-image">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="search-item-info">
                        <div class="search-item-name">${item.name}</div>
                        <div class="search-item-type">${item.type}</div>
                        <div class="search-item-price">${item.price}</div>
                    </div>
                `;

                resultItem.appendChild(productLink);
                resultsContainer.appendChild(resultItem);
            });
        }
    };
    xhttp.open("GET", "../controller/live_search.php?q=" + encodeURIComponent(query), true);
    xhttp.send();
}
