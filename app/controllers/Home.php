<?php

class Home extends Controller{
    public function index(){
        $data['judul'] = 'Home';
        $this->view('template/header', $data);
        $this->view('home/index');
        $this->view('template/footer');
        if(isset($_SESSION['usernameCustomer']) || isset($_SESSION['usernameSales']) || isset($_SESSION['usernameAdmin'])){
            session_destroy();
        }  
    }
}