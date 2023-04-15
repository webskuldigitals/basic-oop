<?php

class MigrationModel {
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
 
    /**
     * @return array<mixed>
     */
    public function checkTableExist() : array
    {
        $sql = "SELECT count(*) as count FROM information_schema.TABLES WHERE TABLE_NAME = :table AND TABLE_SCHEMA in (SELECT DATABASE());";
        
        $stmt = $this->db->prepare($sql);

        $stmt->execute(['table' => 'database_migration']);

        $rows = $stmt->fetch();
        
        return $rows;
    }

    /**
     * @return array<mixed>
     */
    public function getMigrations() : array
    {
        $sql = "SELECT * FROM  database_migration;";
        $pdo = $this->db->prepare($sql);
        $pdo->execute();
        return $pdo->fetchAll();
    }

    public function importSqlFile($file)
    {
        $file = './' . $file;
        $pdo = $this->db->prepare(file_get_contents($file));
        return $pdo->execute();
    }

    public function deleteAllTables()
    {
        $this->db->exec('SET foreign_key_checks = 0');

        $pdo = $this->db->prepare("SHOW TABLES");
        $pdo->execute();
        $tables = $pdo->fetchAll();

        if(!empty($tables)){
            $tables = implode(', ', array_column($tables, 'Tables_in_milk'));
    
            $pdo = $this->db->prepare("DROP TABLE IF EXISTS {$tables}");
            if($pdo->execute()){
                echo "Tables removed!\n";
            }
            
            $this->db->exec('SET foreign_key_checks = 1');
        }
    }

    public function addMigratedFolder($folder)
    {
        $pdo = $this->db->prepare("INSERT INTO database_migration (folder_name) VALUES (?)");
        $pdo->execute([$folder]);
        $tables = $pdo->fetchAll();
    }
}