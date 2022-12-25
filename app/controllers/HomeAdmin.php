<?php

class HomeAdmin extends Controller{
    public function index(){
        $data['judul'] = 'Home Sales';
        $this->view('template/headerAdmin', $data);
        $this->view('homeKaryawan/homeAdmin');
        $this->view('template/footer');
    }
}