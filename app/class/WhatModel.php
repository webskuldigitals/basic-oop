<?php

class WhatModel
{   
    public PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getWhat($whatId)
    {        
        $stmt = $this->db->prepare("SELECT * FROM what WHERE id = ? AND active = 1 LIMIT 1;");
        $stmt->execute([$whatId]);
        return $stmt->fetch();
    }
}