<?php

class Port
{

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function getPort()
    {
        $stmt = $this->db->prepare("SELECT * FROM port ORDER BY id ASC");
        $stmt->execute();
        $data = array();
        while ($row = $stmt->fetchAll()) {
            $data[] = $row;
        }
        return $data;
    }

    public function insertPort($port_nm_vn, $port_nm_en) {
        try {
            $sql = $this->db->prepare("INSERT INTO port (port_nm_vn, port_nm_en, status) VALUES (? ,? ,?)");
            $sql->execute(array($port_nm_vn, $port_nm_en, 0));
            return true;
        } catch (ErrorException $e) {
            return false;
        }

    }

    public function checkPort($port_nm_vn, $port_nm_en) {

        try{
            $stmt = $this->db->prepare("SELECT * FROM port WHERE UPPER(port_nm_vn)=? OR UPPER(port_nm_en)=?");
            $stmt->execute(array(strtoupper($port_nm_vn), strtoupper($port_nm_en)));

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

    public function deletePort($port_id) {
        try{
            $stmt = $this->db->prepare("UPDATE port SET status = :status WHERE id = :id ");

            $status = 1;

            $stmt->bindParam(':status', $status,PDO::PARAM_INT);
            $stmt->bindParam(':id', $port_id,PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } catch (ErrorException $e) {
            return false;
        }
    }

    public function getPortDetail($port_id) {
        $stmt = $this->db->prepare("SELECT * FROM port WHERE id=?");
        $stmt->execute(array($port_id));
        $data = array();
        while ($row = $stmt->fetchAll()) {
            return $row;
        }
        return $data;
    }

    public function updatePort($port_id, $port_nm_vn, $port_nm_en, $status) {
        try{
            $stmt = $this->db->prepare("UPDATE port SET port_nm_vn = :port_nm_vn, port_nm_en = :port_nm_en, status = :status WHERE id = :id ");
            $stmt->bindParam(':port_nm_vn', $port_nm_vn,PDO::PARAM_STR);
            $stmt->bindParam(':port_nm_en', $port_nm_en,PDO::PARAM_STR);
            $stmt->bindParam(':status', $status,PDO::PARAM_INT);
            $stmt->bindParam(':id', $port_id,PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } catch (ErrorException $e) {
            return false;
        }
    }
}
?>