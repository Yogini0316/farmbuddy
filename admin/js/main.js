// AJAX functions

function loadUsers() {
	// body...
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("content").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "users.php", true);
        xmlhttp.send();
}

function loadCrops() {
	// body...
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("content").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "crops.php", true);
        xmlhttp.send();
}

function loadProducts() {
    // body...
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("content").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "products.php", true);
        xmlhttp.send();
}

function loadOrders() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "orders.php", true);
    xmlhttp.send();
}

function loadStocks() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "stocks.php", true);
    xmlhttp.send();
}

function load_subtypes(type) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("select_subtype").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "get_subtypes.php?q="+type, true);
    xmlhttp.send();
}


// end of ajax functions


function delete_user(id) {
    c = confirm("Are You sure to delete this user?");
    if(c==true)
        window.location.href = "./controllers/users_controller.php?user_to_delete="+id;
}

function delete_crop(id) {
    c = confirm("Are You sure to delete this Crop record?");
    if(c==true)
        window.location.href = "./controllers/crops_controller.php?crop_to_delete="+id;
}

function delete_product(id) {
    c = confirm("Are You sure to delete this Product?");
    if(c==true)
        window.location.href = "./controllers/products_controller.php?product_to_delete="+id;
}

function add_to_cart(prod_id, cart_id) {
    window.location.href = "./controllers/carts_controller.php?user_id=" + id;
}


// functions for handeling routing when action is completed

function back_to_crops() {
    // body...
     setTimeout(() => { document.getElementById('menu-crops').click(); }, 0);
}

function back_to_products() {
    // body...
     setTimeout(() => { document.getElementById('menu-products').click(); }, 0);
}

function back_to_users() {
    // body...
     setTimeout(() => { document.getElementById('menu-users').click(); }, 0);
}

function back_to_orders() {
    // body...
     setTimeout(() => { document.getElementById('menu-orders').click(); }, 0);
}

