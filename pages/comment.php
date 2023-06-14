<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Livre d'or - Comments</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <h1>Comments</h1>

    <?php if (!isset($_SESSION["id"])) { ?>
        <p><a href="../pages/form.php">Sign In</a> to leave a comment!</p>
        <?php } ?>

    <?php include "../includes/error-success-messages.php"; ?>

    <?php if (isset($_SESSION["coment"])) {

        foreach ($_SESSION["coment"] as $coment) { ?>

            <?php if (isset($_SESSION["login"]) && $coment["login"] == $_SESSION["login"]) { ?>

                <article class="self">
                    <h4><?= $coment["login"] ?></h4>
                    <p><?= $coment["coment"] ?></p>
                    <footer><small><?= $coment["formatted_date"] ?></small></footer>
                </article>

            <?php } else { ?>

                <article>
                    <h4><?= $coment["login"] ?></h4>
                    <p><?= $coment["coment"] ?></p>
                    <footer><small><?= $coment["formatted_date"] ?></small></footer>
                </article>

            <?php } }

                if (isset($_SESSION["id"])) { ?>

                    <section id="accordions">
                        <details>
                            <summary>Envoyer un message</summary>
                            <form action="../includes/functions.php" method="post">
                                <textarea name="comments" placeholder="YOUR COMMENT" required></textarea>
                                <input type="submit" name="comments" value="Send" class="contrast">
                            </form>
                        </details>
                    </section>

            <?php }
</body>
</html>