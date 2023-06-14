<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Livre d'Or</title>
</head>

<body>

<nav class="container-fluid">
    <ul>
        <li><a href="../index.php"><strong><i class="fa fa-fw fa-home"></i> LIVRE D'OR</strong></a></li>
    </ul>
    <ul>

        <li><a href="../includes/functions.php"><i class="fa fa-envelope"></i></a></li>

        <?php if (isset($_SESSION["id"])) { ?>

            <li><a href="../pages/profile.php"><?php echo $_SESSION["login"] ?></a></li>
            <li><form action="../includes/functions.php" method="post">
                    <button type="submit" name="disconnect" class="icon-button">
                        <i class="fa fa-fw fa-sign-out"></i>
                    </button>
                </form></li>

        <?php } else { ?>

            <li><a href="../pages/profile.php"><i class="fa fa-fw fa-user"></i></a></li>

        <?php } ?>

    </ul>
</nav>
