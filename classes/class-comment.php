<?php
    session_start();

    class Comment extends Database {

        public function addComment($coment, $id_user) {

            $errors = $this->getErrors($coment);
            if (!empty($errors)) {
                $_SESSION["error"] = $errors;
                header("Location: pages/comment.php");
                return;
            }

            $sql = "INSERT INTO coment (coment, id_user) VALUES (:coment, :id_user)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$coment, $id_user]);
            $_SESSION["success"] = "Votre message a bien été envoyé.";
            header("Location: includes/functions.php");
        }

        public function getComments() {

            $sql = "SELECT DATE_FORMAT(m.date, 'Le %d/%m/%Y à %H:%i') AS formatted_date, u.login, m.message
            FROM coment m
            JOIN user u ON m.id_user = u.id
            ORDER BY m.date DESC";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();
            $messages = $stmt->fetchAll();
            $_SESSION["messages"] = $messages;
            header("Location: includes/functions.php");
        }

        private function getErrors($message) {

            if (strlen($message) < 5) {
                $errors = "Le message doit contenir au moins 5 caractères";
            }

            return $errors;
        }
    }