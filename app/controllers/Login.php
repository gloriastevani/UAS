<?php
session_start();
class Login extends Controller{
    public function index(){
        $data['judul'] = 'Login';
        $this->view('template/header', $data);
        $this->view('login/index', $data);
        $this->view('template/footer');
    }

    public function validasi(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data['customer'] = $this->model('Customer_model')->getCustomer($username);
        $data['karyawan'] = $this->model('Karyawan_model')->getKaryawan($username); 
        
        if($data['customer'] == true){ #apakah customer ada
            if($password == $data['customer']['password']) {
                session_start();
                $_SESSION['usernameCustomer'] = $data['customer']['username'];
                header('Location: ' . BASEURL . '\homeCustomer\index');
            } else {
                header('Location: ' . BASEURL . '\pesan\gagalLogin');
            }
        } else if($data['karyawan'] == true){ #apakah karyawan ada
            if($password == $data['karyawan']['password']){
                if($data['karyawan']['jenisKaryawan'] == 'sales'){
                    session_start();
                    $_SESSION['usernameSales'] = $data['karyawan']['username'];
                    header('Location: ' . BASEURL . '\HomeSales\index');
                } else {
                    session_start();
                    $_SESSION['usernameAdmin'] = $data['karyawan']['username'];
                    header('Location: ' . BASEURL . '\HomeAdmin\index');
                }
                
            } else {
                header('Location: ' . BASEURL . '\pesan\gagalLogin');
            }
        } else {
            header('Location: ' . BASEURL . '\pesan\gagalLogin');
        }
    }
}