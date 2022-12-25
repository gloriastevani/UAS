<?php 

class About extends Controller{
    public function index(){
        $data['judul'] = 'About Us';
        $this->view('template/header', $data);
        $this->view('about/index');
        $this->view('template/footer');
    }

    public function halamanCustomer(){
        $data['judul'] = 'About Us';
        $this->view('template/headerCustomer', $data);
        $this->view('about/index');
        $this->view('template/footer');
    }
}