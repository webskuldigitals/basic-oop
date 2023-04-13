<?php

class ModuleModel
{   
    public PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getModule($moduleId)
    {        
        $stmt = $this->db->prepare("SELECT * FROM module WHERE id = ? AND active = 1 LIMIT 1;");
        $stmt->execute([$moduleId]);
        return $stmt->fetch();
    }
}