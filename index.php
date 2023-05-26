<?php

require_once('function/help.php');
require_once('function/connection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <div class="form">
            <div class="title">
                Login User
            </div>
            <form action="<?= BASE_URL . 'proses_login.php'?>" method="POST" id="submit">
                <div class="input_wrap">
                    <label for="input_text">
                        Username
                    </label>
                    <div class="input_field">
                        <input type="text" class="input" id="input_text" name="username" value="<?php echo $username?>">
                    </div>
                </div>
                <div class="input_wrap">
                    <label for="input_text">
                        Password
                    </label>
                    <div class="input_field">
                        <input type="password" class="input" id="input_password" name="password" value="<?php echo $password?>">
                    </div>
                </div>
                <div class="input_wrap">
                    <span class="error_msg">Username atau Password salah, Silahkan Coba Lagi</span>
                    <input type="submit" value="login" class="btn" id="login_btn">
                </div>
            </form>
        </div>
    </div>

    <script src="jquery-main/jquery.js"></script>

    <script>

        var input_text = document.querySelector('#input_text');
        var input_password = document.querySelector('#input_password');
        var error_msg = document.querySelector('#error_msg');

        $("#submit").submit(function*(e) {
            e.preventDefault();

            if (input_text.value.length < 1){
                error_msg.style.display = "inline-block";
                input_text.style.border = "1px solid #f74040";
                return false;
            }

            if (input_password.value.length < 1){
                error_msg.style.display = "inline-block";
                input_password.style.border = "1px solid #f74040";
                return false;
            }

            error_msg.style.display = none;
            alert("Login Sukses");
        });

        var input_field = document.querySelector(".input");

        input_field.forEach(function (input_item) {
            input_item.addEventListener("input", function () {

                if (input_text.value.length > 0 ) {
                    input_text.style.border = "1px solid #1dbf73"
                }

                if (input_password
                .value.length > 0 ) {
                    input_password.style.border = "1px solid #1dbf73"
                }

            })
        })

    </script>
</body>
</html>