<?php
session_start();
class Sales extends Controller{
    public function tampilkanAkunSales(){
        $data['judul'] = 'Akun Sales';
        $usernameSales = $_SESSION['usernameSales'];
        $data['akunSales'] = $this->model('Karyawan_model')->getKaryawan($usernameSales);
        $this->view('template/headerSales', $data);
        $this->view('akun/lihatAkunSales', $data);
        $this->view('template/footer');
    }

    public function halamanEditAkun(){
        $data['judul'] = 'Edit Akun Sales';
        $usernameSales = $_SESSION['usernameSales'];
        $data['akunSales'] = $this->model('Karyawan_model')->getKaryawan($usernameSales);
        $this->view('template/headerSales', $data);
        $this->view('akun/editAkunSales', $data);
        $this->view('template/footer');
    }

    public function editAkunSales(){
        $usernameSales = $_SESSION['usernameSales'];
        $data['akunSales'] = $this->model('Karyawan_model')->getKaryawan($usernameSales);

        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $tglLahir = date("Y-m-d",strtotime($_POST['tglLahir']));
        $noTelepon = $_POST['noTelepon'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($this->model('Karyawan_model')->updateAkunSales($nip, $nama, $alamat, $email, $tglLahir, $noTelepon, $username, $password) > 0){
            header('Location: ' . BASEURL . '\Pesan\berhasilPerbaruiAkunSales');
            exit;
        }
    }

    public function halamanLihatHarga(){
        $data['judul'] = 'Lihat Harga';
        $data['hargaRisol'] = $this->model('Risol_model')->getHargaRisol();

        $this->view('template/headerSales', $data);
        $this->view('SalesView/lihatHarga', $data);
        $this->view('template/footer');
    }

    public function halamanLihatStok(){
        $data['judul'] = 'Lihat Stok';
        $data['stokRisol'] = $this->model('Risol_model')->getStokRisol();

        $this->view('template/headerSales', $data);
        $this->view('SalesView/lihatStok', $data);
        $this->view('template/footer');
    } 
}