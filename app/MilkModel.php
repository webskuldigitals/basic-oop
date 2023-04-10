<?php

class MilkModel {

    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllFarmers()
    {
        $pdo = $this->db->prepare("SELECT * FROM farmer;");
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

}