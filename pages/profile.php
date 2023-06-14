<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Livre d'or - Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Profile</h1>

    <?php if (!isset($_SESSION['id'])) { ?>

        <p><a href="../pages/form.php">Connectez-vous</a> pour voir votre profil !</p>

    <?php } include "../includes/error-success-messages.php";

    if (isset($_SESSION['id'])) { ?>

    <form action="../includes/functions.php" method="POST">
        <label for="update_login"></label>
        <input type="text" name="update_login" placeholder="<?= $_SESSION['login'] ?>" required>

        <label for="update_password"></label>
        <input type="password" name="update_password" placeholder="NEW PASSWORD" required>

        <label for="confirm_password"></label>
        <input type="password" name="confirm_password" placeholder="CONFIRM NEW PASSWORD" required>

        <button type="submit" name="update_submit">Update Profile</button>
    </form>
</body>
</html>