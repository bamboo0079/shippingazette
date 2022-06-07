<?php

class User {

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function getUser($user_name, $pass) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE user_name=? AND password=? AND status = 0");
        $stmt->execute([$user_name, $pass]);
        while ($row = $stmt->fetch()) {
            return $row;
        }
        return false;
    }
}
?>