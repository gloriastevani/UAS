<?php

class HomeCustomer extends Controller{
    public function index(){
        $data['judul'] = 'Home';
        $this->view('template/headerCustomer', $data);
        $this->view('homeCustomer/index');
        $this->view('template/footer');
    }
}