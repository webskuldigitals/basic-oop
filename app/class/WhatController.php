<?php

class WhatController
{   
    private WhatModel $model;
    
    public function __construct(WhatModel $model)
    {
        $this->model = $model;
    }

    public function getWhat(int $whatId) : array
    {
        return $this->model->getWhat($whatId);
    }

}