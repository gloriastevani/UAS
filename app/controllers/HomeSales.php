<?php

class HomeSales extends Controller{
    public function index(){
        $data['judul'] = 'Home Sales';
        $this->view('template/headerSales', $data);
        $this->view('homeKaryawan/homeSales');
        $this->view('template/footer');
    }
}