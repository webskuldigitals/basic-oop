<?php

class Controller {
    public function getData($post){
        switch ($post['data']) {
            case 'car' : 
                return json_encode(['data' => View::generateTable(Data::$cars), 'array' => Data::$cars]);
            case 'driver' : 
                return json_encode(['data' => View::generateTable(Data::$driver)]);
            case 'route' : 
                return  json_encode(['data' => View::generateTable(Data::$route)]);
        }
    }
}