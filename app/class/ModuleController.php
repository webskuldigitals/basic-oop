<?php

class ModuleController
{   
    private ModuleModel $model;
    
    public function __construct(ModuleModel $model)
    {
        $this->model = $model;
    }

    public function getModule(int $moduleId) : array
    {
        return $this->model->getModule($moduleId);
    }

}