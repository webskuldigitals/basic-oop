<?php

class MigrationController {
    private $model;
    public function __construct(MigrationModel $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        $res = [];
        $checkMigrationTable = $this->model->checkTableExist();
        if($checkMigrationTable['count'] > 0){
            $migrations = $this->model->getMigrations();
            $res = $this->migrate($migrations);
        }else{
            $res = $this->fresh();
        }
        return $res;
    }

    public function fresh()
    {
        $this->model->deleteAllTables();
        $this->migrate();
    }

    private function migrate($migrations = [])
    {
        $migrations = CommonHelper::groupArrayByKey($migrations, 'folder_name');
        $folders = $this->listAllMigratinFolder();
        foreach($folders as $folder){
            if(!array_key_exists($folder, $migrations)){
                $files = $this->listAllMigrationFile($folder);
                if(count($files) > 0){
                    foreach ($files as $file) {
                        $res = $this->importSqlFile($file);
                        if($res){
                            $this->model->addMigratedFolder($folder);
                            echo "$file imported!\n";
                        }
                    }
                }
            }
        }
    }

    private function importSqlFile($file)
    {
        return $this->model->importSqlFile($file);
    }

    private function listAllMigrationFile($folder)
    {
        return glob( $folder . '/*.sql');
    }

    private function listAllMigratinFolder()
    {
        $dirs = array_filter(glob('*'), 'is_dir');
        return $dirs;
    }
}