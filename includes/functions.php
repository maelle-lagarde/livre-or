<?php
    include 'classes/class-database.php';
    include 'classes/class-user.php';
    include 'classes/class-comment.php';

    if (isset($_POST["disconnect"])) {
        session_start();
        session_destroy();
        header("index.php");
    } elseif (isset($_POST["login"])) {
        $login = htmlspecialchars($_POST["login_user"]);
        $password = htmlspecialchars($_POST["password_user"]);
        $user = new User($login, $password, $confirm_password);
        $user->logIn();
    } elseif (isset($_POST["signup"])) {
        $login = htmlspecialchars($_POST["signup_login"]);
        $password = htmlspecialchars($_POST["signup_password"]);
        $confirm_password = htmlspecialchars($_POST["confirm_password"]);
        $user = new User($login, $password, $confirm_password);
        $user->signUp();
    } elseif (isset($_POST["update"])) {
        $login = htmlspecialchars($_POST["update_login"]);
        $password = htmlspecialchars($_POST["update_password"]);
        $confirm_password = htmlspecialchars($_POST["confirm_password"]);
        $user = new User($login, $password, $confirm_password);
        $user = update();
    } elseif (isset($_POST["comments"])) {
        $comments = htmlspecialchars($_POST["coment"]);
        $id_user = $_SESSION["id"];
        $coment = new Comment();
        $coment->addComment($comments, $id_user);
    } else {
        $coment = new Comment();
        $coment->getComments();
        header("../pages/comment.php");
    }
