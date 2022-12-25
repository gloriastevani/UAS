<?php

class Contact extends Controller{
    public function index(){
        $data['judul'] = 'Contact Us';
        $this->view('template/header', $data);
        $this->view('contact/index');
        $this->view('template/footer');
    }

    public function halamanCustomer(){
        $data['judul'] = 'Contact Us';
        $this->view('template/headerCustomer', $data);
        $this->view('contact/index');
        $this->view('template/footer');
    }
}