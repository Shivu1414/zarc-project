$(document).ready(function () {
    $(".loginForm").on("submit", function (e) {
        e.preventDefault();
        let email = $("#agent_email").val();
        let password = $("#pass").val();

        $.ajax({
            url: 'index.php',
            method: 'POST',
            data: {
                login: true,
                email: email,
                password: password,
            },            
            success: function (res) {
                try {
                    let result = JSON.parse(res);

                    if (result.status === 'success') {
                        window.location.replace("index.php?dashboard=true");
                    } else {
                        alert("Error: " + result.message);
                    }
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                    $("#loginError").text("An unexpected error occurred. Please try again later.");
                }
            },
            error: function () {
                $("#loginError").text("An unexpected error occurred. Please try again later.");
            }
        });
    });
});
