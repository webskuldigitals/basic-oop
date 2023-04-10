<?php

class MilkController {

    protected $model;

    protected $_actions = [
        'save_milk'
    ];

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function dispatch($request){
        $method = implode("",array_map('ucfirst',(explode("_",$request['task']))))."Action";
        if(in_array($request['task'], $this->_actions) && method_exists($this, $method)){
            $result = call_user_func_array(array($this, $method),array($request));
            ob_clean();
            header('Content-Type: application/json; charset=utf-8');
            return json_encode($result);
        }else{
            throw new Exception("Either $method does not exist or you do not have enough permission to access this location.");
        }
    }

    public function SaveMilkAction($data)
    {
        $milk = $this->model->saveMilk();
    }

    public function getFirstView()
    {
        $farmers = $this->model->getAllFarmers();
        include __DIR__ ."/../view/milk-collection.html.php";
    }
}