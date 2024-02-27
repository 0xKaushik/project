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

$(document).ready(function() {
    $("#addHostForm").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "add_host.php",
            data: $("#addHostForm").serialize(),
            success: function(response) {
                console.log(response);
                alert(response);
                window.location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});

$(document).ready(function() {
    $("#addHostBtn").click(function() {
        var modal = `
            <div id="addHostModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Add Host</h2>
                    <form id="addHostForm">
                        <label for="hostName">Host Name:</label>
                        <input type="text" id="hostName" name="hostName" required>
                        <label for="hostUrl">Host URL:</label>
                        <input type="text" id="hostUrl" name="hostUrl" required>
                        <button type="submit">Add Host</button>
                    </form>
                </div>
            </div>`;

        $("body").append(modal);

        $("#addHostModal .close").click(function() {
            $("#addHostModal").remove();
        });

        $("#addHostForm").submit(function(event) {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "add_host.php",
                data: $("#addHostForm").serialize(),
                success: function(response) {
                    console.log(response);
                    alert(response);
                    window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
});