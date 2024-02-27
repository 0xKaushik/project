function login() {
    var username = jQuery("#username").val();
    var password = jQuery("#password").val();

    jQuery.ajax({
        type: "POST",
        url: "login.php",
        data: { username: username, password: password },
        success: function(response) {
            if (response.trim() === "true") {
                window.location.href = "dashboard.php";
            } else {
                alert("Login failed. Please check your credentials.");
            }
        },
        error: function() {
            alert("Error occurred during login.");
        }
    });
}



function logout() {
    jQuery.ajax({
        type: "POST",
        url: "logout.php",
        success: function(response) {
            window.location.href = "index.html";
        },
        error: function() {
            alert("Error occurred during logout.");
        }
    });
}

function add_host(){
    jQuery.ajax({
        type: "POST",
        url: "add_host.php",
        success: function(respone){
            window.location.href = "add_host.html";
        },
        error: function(){
            alert("Error occured, please try again");
        }
    })
}

function view_host(){
    jQuery.ajax({
        type:"POST",
        url: "view_host.php",
        success: function(respone){
            window.location.href = "view_host.php"
        },
        error: function(){
            alert("Error occured");
        }
    })
}
