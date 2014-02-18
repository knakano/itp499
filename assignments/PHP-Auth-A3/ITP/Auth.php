<?php

namespace ITP;

class Auth {

    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function attempt($username, $password) {

        $user = $this->checkUser($username);

        if (is_null($user)) {
            return false; // invalid credentials
        }
        else {
            return $user["password"] == SHA1($password);
        }
    }

    public function checkUser($username) {

        // Check if a username and password are valid credentials

        $sql = "SELECT * FROM users WHERE username = :username";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':username', $username);

        $statement->execute();
        $success = $statement->fetchAll();

        return count($success) > 0 ? $success[0] : null;
    }
}