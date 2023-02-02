<?php
include("Login php.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="./Style/RegisterStyle.css">
</head>

<body>
    <div class="container">
        <!-- Create login box -->
        <form class="form" id="login" action="#" method="POST">
            <h1 class="title">Login</h1>



            <!-- Create a box to fill in your name or username -->
            <div class="form__input-group">
                <input type="text" class="input" autofocus placeholder="Username" name="username" required>
            </div>


            <!-- Create a box to fill in your password -->
            <div class="form__input-group">
                <input type="password" class="input" autofocus placeholder="Password" name="password" required>
            </div>

            <input type="hidden" name="userId" value="">

            <!-- Create a submit button -->
            <button class="button" type="submit">Login</button>

            <p class="form__text">
                <a class="form__link" href="./create account.php" id="linkCreateAccount">Don't have an account? Create an account</a>
            </p>
        </form>
    </div>
</body>

</html>