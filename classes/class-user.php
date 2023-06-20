<?php
    session_start();

    class User extends Database {

        const MIN_PASSWORD_LENGTH = 6;
        const MIN_USERNAME_LENGTH = 6;
        private $login;
        private $password;
        private $confirm_password;

        public function __construct($login, $password, $confirm_password) {

            $this->login = $login;
            $this->password = $password;
            $this->confirm_password = $confirm_password;
        }

        public function signUp() {

            $errors = $this->getErrors();
            if (!empty($errors)) {
                $_SESSION["error"] = $errors;
                header("Location: ../pages/form.php");
                return;
            }

            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (login, password) VALUES (:login, :password)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$this->login, $this->password]);
            $_SESSION["success"] = "Votre compte a bien été créé.";
            header("Location: ../pages/form.php");
        }

        public function logIn() {

            $sql = "SELECT * FROM user WHERE login = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$this->login]);
            $user = $stmt->fetch();
            if ($user && password_verify($this->password, $user["password"])) {
                $_SESSION["id"] = $user["id"];
                $_SESSION["login"] = $user["login"];
                $_SESSION["success"] = "Vous êtes connecté.";
                header("Location: ../includes/functions.php");
            } else {
                $_SESSION["error"] = "Identifiants incorrects.";
                header("Location: ../pages/form.php");
            }
        }

        public function update() {

            $errors = $this->getErrors();
            if (!empty($errors)) {
                $_SESSION["error"] = $errors;
                header("Location: ../pages/profile.php");
                return;
            }

            $sql = "UPDATE user SET login = ?, password = ? WHERE id = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$this->login, $this->password, $_SESSION["id"]]);
            $_SESSION["login"] = $this->login;
            $_SESSION["success"] = "Votre compte a bien été mis à jour.";
            header("Location: ../pages/profile.php");
        }

        private function getErrors() {

            if (empty($this->login) || empty($this->password) || empty($this->confirm_password)) {
                $errors = "Merci de remplir tous les champs correctement.";
            }

            if ($this->uniqueUser()) {
                $errors = "Cet utilisateur existe déjà.";
            }

            if ($this->password !== $this->confirm_password) {
                $errors = "Les mots de passe ne correspondent pas.";
            }

            if (strlen($this->password) < self::MIN_PASSWORD_LENGTH) {
                $errors = "Le mot de passe doit contenir au moins " . self::MIN_PASSWORD_LENGTH . " caractères.";
            }

            if (!$this->validatePassword()) {
                $errors = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
            }
            return $errors;
        }

        private function uniqueUser() {

            $sql = "SELECT * FROM user WHERE login = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$this->login]);
            $result = $stmt->fetch();
            if ($result) {
                return true;
            }
            return false;
        }

        private function validatePassword() {

            $uppercase = preg_match('@[A-Z]@', $this->password);
            $lowercase = preg_match('@[a-z]@', $this->password);
            $number    = preg_match('@[0-9]@', $this->password);
            $specialChars = preg_match('@[^\w]@', $this->password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->password) < 8) {
                return false;
            }
            return true;
        }
    }
?>