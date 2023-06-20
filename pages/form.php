<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Livre d'or - Form</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php include '../includes/header.php';
    ini_set('display_errors', 'on'); ?>

    <div class="box">
        <div class="box1">
            <h1>Sign Up</h1>
            <form action="../includes/functions.php" method="POST">

                <?php include "../includes/error-success-messages.php"; ?>

                <label for="signup_login"></label>
                <input type="text" name="signup_login" placeholder="LOGIN" required><br>

                <label for="signup_password"></label>
                <input type="password" name="signup_password" placeholder="PASSWORD" required><br>

                <label for="confirm_password"></label>
                <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required><br>

                <button type="submit" name="signup_submit">Sign Up</button>
            </form>
        </div>

        <div class="box2">
            <h1>Sign In</h1>
            <form action="../includes/functions.php" method="POST">

                <?php include "../includes/error-success-messages.php"; ?>

                <label for="login"></label>
                <input type="text" name="login_user" placeholder="LOGIN" required><br>

                <label for="password"></label>
                <input type="password" name="password_user" placeholder="PASSWORD" required><br>

                <button type="submit" name="login_submit">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>