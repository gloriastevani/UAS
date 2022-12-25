<?php

class Controller {
    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function view2($view, $data1 = [], $data2 = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function view3($view, $data1 = [], $data2 = [], $data3 = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}