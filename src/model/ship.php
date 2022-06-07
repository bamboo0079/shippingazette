<?php

class Ship {

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function getShip() {
        $stmt = $this->db->prepare("SELECT * FROM ship ORDER BY id ASC");
        $stmt->execute();
        $data = array();
        while ($row = $stmt->fetchAll()) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertShip($ship_nm_vn, $ship_nm_en) {
        try {
            $sql = $this->db->prepare("INSERT INTO ship (ship_nm_vn, ship_nm_en, status) VALUES (? ,? ,?)");
            $sql->execute(array($ship_nm_vn, $ship_nm_en, 0));
            return true;
        } catch (ErrorException $e) {
            return false;
        }

    }

    public function checkShip($ship_nm_vn, $ship_nm_en) {

        try{
            $stmt = $this->db->prepare("SELECT * FROM ship WHERE UPPER(ship_nm_vn)=? OR UPPER(ship_nm_en)=?");
            $stmt->execute(array(strtoupper($ship_nm_vn), strtoupper($ship_nm_en)));

            while ($row = $stmt->fetch()) {
                if(!empty($row)) {
                    return false;
                }
            }
            return true;
        } catch (ErrorException $e) {
            return false;
        }
    }

    public function deleteShip($ship_id) {
        try{
            $stmt = $this->db->prepare("UPDATE ship SET status = :status WHERE id = :id ");

            $status = 1;

            $stmt->bindParam(':status', $status,PDO::PARAM_INT);
            $stmt->bindParam(':id', $ship_id,PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } catch (ErrorException $e) {
            return false;
        }
    }

    public function getShipDetail($ship_id) {
        $stmt = $this->db->prepare("SELECT * FROM ship WHERE id=?");
        $stmt->execute(array($ship_id));
        $data = array();
        while ($row = $stmt->fetchAll()) {
            return $row;
        }
        return $data;
    }

    public function updateShip($ship_id, $ship_nm_vn, $ship_nm_en, $status) {
        try{
            $stmt = $this->db->prepare("UPDATE ship SET ship_nm_vn = :ship_nm_vn, ship_nm_en = :ship_nm_en, status = :status WHERE id = :id ");
            $stmt->bindParam(':ship_nm_vn', $ship_nm_vn,PDO::PARAM_STR);
            $stmt->bindParam(':ship_nm_en', $ship_nm_en,PDO::PARAM_STR);
            $stmt->bindParam(':status', $status,PDO::PARAM_INT);
            $stmt->bindParam(':id', $ship_id,PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } catch (ErrorException $e) {
            return false;
        }
    }
}
?>