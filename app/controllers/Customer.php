<?php
session_start();
class Customer extends Controller{
    public function index(){
        $data['judul'] = 'Registrasi';
        $this->view('template/header', $data);
        $this->view('registrasi/index');
        $this->view('template/footer');
    }

    // public function detail($id){
    //     $data['judul'] = 'Detail Mahasiswa';
    //     $data['mhs'] = $this->model('Customer_model')->getMahasiswaById($id);
    //     $this->view('template/header', $data);
    //     $this->view('mahasiswa/detail', $data);
    //     $this->view('template/footer');
    // } 

    public function tambah(){
        if($this->model('Customer_model')->tambahDataCustomer($_POST) > 0){
            header('Location: ' . BASEURL . '\login\index');
            exit;
        }
    }

    public function tampilkanAkunCustomer(){
        $data['judul'] = 'Akun Customer';
        $usernameCustomer = $_SESSION['usernameCustomer'];
        $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);
        $this->view('template/headerCustomer', $data);
        $this->view('akun/lihatAkunCustomer', $data);
        $this->view('template/footer');
    }

    public function halamanEditAkun(){
        $data['judul'] = 'Edit Akun Customer';
        $usernameCustomer = $_SESSION['usernameCustomer'];
        $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);
        $this->view('template/headerCustomer', $data);
        $this->view('akun/editAkunCustomer', $data);
        $this->view('template/footer');
    }

    public function editAkunCustomer(){
        $data['judul'] = 'Edit Akun Customer';
        $usernameCustomer = $_SESSION['usernameCustomer'];
        $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);

        $customer_id = $data['akunCustomer']['customer_id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $noTelepon = $_POST['noTelepon'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($this->model('Customer_model')->updateAkunCustomer($customer_id, $nama, $alamat, $email, $noTelepon, $username, $password) > 0){
            header('Location: ' . BASEURL . '\Pesan\berhasilPerbaruiAkunCustomer');
            exit;
        }
    }

    public function halamanPemesanan(){
        $data['judul'] = 'Pesan Risol';
        $data['dataRisol'] = $this->model('Risol_model')->getHarga_Stok();

        $this->view('template/headerCustomer', $data);
        $this->view('customerView/halamanPesan', $data);
        $this->view('template/footer');
    }

    public function pemesanan(){ 
        $jmlRisolMatang = $_POST['jmlPesanMatang'];
        $jmlRisolBeku = $_POST['jmlPesanBeku'];
        $tglBayar = date("Y-m-d",strtotime($_POST['tglBayar']));
        $tglAntar = date("Y-m-d",strtotime($_POST['tglAntar']));
        $tglBeli = new DateTime('now');
        $tglBeli = $tglBeli->format('Y-m-d');
        $data['hargaRisol'] = $this->model('Risol_model')->getHargaRisol();

        $hargaBeliRisolMatang = ((int)$data['hargaRisol'][0]['harga']) * $jmlRisolMatang;
        $hargaBeliRisolBeku = ((int)$data['hargaRisol'][1]['harga']) * $jmlRisolBeku;
        $totalBayar = $hargaBeliRisolMatang + $hargaBeliRisolBeku;

        $usernameCustomer = $_SESSION['usernameCustomer'];
        $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);
        $customer_id = $data['akunCustomer']['customer_id'];

        $diskon = 0;
        if(($jmlRisolMatang + $jmlRisolBeku) >= 20 && ($jmlRisolMatang + $jmlRisolBeku) < 50){
            $diskon = 5;
            $totalBayar = $totalBayar - (($totalBayar * $diskon) / 100);
        } else if(($jmlRisolMatang + $jmlRisolBeku) >= 50){
            $diskon = 10;
            $totalBayar = $totalBayar - (($totalBayar * $diskon) / 100);
        }

        $data['cekStok'] = $this->model('Risol_model')->getStokRisol();
        $jmlStokRisolMatang = $data['cekStok'][0]['jumlahStok'];
        $jmlStokRisolBeku = $data['cekStok'][1]['jumlahStok'];
        if ($jmlRisolMatang && $jmlRisolBeku > 0) {
            if((($jmlStokRisolMatang - $jmlRisolMatang) >= 0) && (($jmlStokRisolBeku - $jmlRisolBeku) >= 0)){
                $stokRisolMatangBaru = $jmlStokRisolMatang - $jmlRisolMatang;
                $stokRisolBekuBaru = $jmlStokRisolBeku - $jmlRisolBeku;
                $this->model('Risol_model')->updateJumlahStok2($data['hargaRisol'][0]['namaRisol'], $stokRisolMatangBaru);
                $this->model('Risol_model')->updateJumlahStok2($data['hargaRisol'][1]['namaRisol'], $stokRisolBekuBaru);
            } else {
                header('Location: ' . BASEURL . '\Pesan\stokTidakCukup');
                exit;
            }
        } else if($jmlRisolMatang > 0){
            if(($jmlStokRisolMatang - $jmlRisolMatang) >= 0){
                $stokRisolMatangBaru = $jmlStokRisolMatang - $jmlRisolMatang;
                $this->model('Risol_model')->updateJumlahStok2($data['hargaRisol'][0]['namaRisol'], $stokRisolMatangBaru);
            } else {
                header('Location: ' . BASEURL . '\Pesan\stokTidakCukup');
                exit;
            }
        } else {
            if(($jmlStokRisolBeku - $jmlRisolBeku) >= 0){
                $stokRisolBekuBaru = $jmlStokRisolBeku - $jmlRisolBeku;
                $this->model('Risol_model')->updateJumlahStok2($data['hargaRisol'][1]['namaRisol'], $stokRisolBekuBaru);
            } else {
                header('Location: ' . BASEURL . '\Pesan\stokTidakCukup');
                exit;
            }
        }

        if ($this->model('Pesan_model')->simpanPesanan($tglBeli, $totalBayar, $diskon, $tglAntar, $tglBayar, $customer_id) > 0) {
            $data['noNota'] = $this->model('Pesan_model')->getNoNota($customer_id, $tglAntar, $tglBayar, $totalBayar);
            $noNota = $data['noNota']['noNota'];
            if ($jmlRisolMatang && $jmlRisolBeku > 0) {    
                if ($this->model('Pesan_model')->simpanDetailPesanan($noNota, 1, $jmlRisolMatang, $hargaBeliRisolMatang) > 0) {
                    if ($this->model('Pesan_model')->simpanDetailPesanan($noNota, 2, $jmlRisolBeku, $hargaBeliRisolBeku) > 0) {
                        header('Location: ' . BASEURL . '\pesan\berhasilPesan');
                        exit;
                    }
                }
            } else if ($jmlRisolMatang > 0){
                if ($this->model('Pesan_model')->simpanDetailPesanan($noNota, 1, $jmlRisolMatang, $hargaBeliRisolMatang) > 0) {
                    header('Location: ' . BASEURL . '\pesan\berhasilPesan');
                    exit;
                }
            } else {
                if ($this->model('Pesan_model')->simpanDetailPesanan($noNota, 2, $jmlRisolBeku, $hargaBeliRisolBeku) > 0) {
                    header('Location: ' . BASEURL . '\pesan\berhasilPesan');
                    exit;
                }
            }
        }
    }

    public function lihatKeranjang(){
        $data['judul'] = 'Keranjang';
        $usernameCustomer = $_SESSION['usernameCustomer'];
        $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);
        $customer_id = $data['akunCustomer']['customer_id'];
        
        $tglBeli = new DateTime('now');
        $tglBeli = $tglBeli->format('Y-m-d');
        $data['dataPemesanan'] = $this->model('Pesan_model')->getDataPemesanan($tglBeli, $customer_id);
        // var_dump($data['dataPemesanan']);
        $this->view('template/headerCustomer', $data);
        $this->view('customerView/lihatKeranjang', $data);
        $this->view('template/footer');
    }

    public function halamanBatalPesan(){
        $data['judul'] = 'Batal Pesan';
        $usernameCustomer = $_SESSION['usernameCustomer'];
        $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);
        $customer_id = $data['akunCustomer']['customer_id'];
        
        $tglBeli = new DateTime('now');
        $tglBeli = $tglBeli->format('Y-m-d');
        $data['dataPemesanan'] = $this->model('Pesan_model')->getDataPemesanan($tglBeli, $customer_id);

        $this->view('template/headerCustomer', $data);
        $this->view('customerView/batalPesan', $data);
        $this->view('template/footer');
    }

    public function batalkanPesanan(){
        $noNota = $_POST['btnHapus'];

        if($this->model('Pesan_model')->getJumlahPesanan($noNota, 1) == true && $this->model('Pesan_model')->getJumlahPesanan($noNota, 2) == true){
            $jmlPesanRisolMatang = $this->model('Pesan_model')->getJumlahPesanan($noNota, 1);
            $jmlPesanRisolMatang = $jmlPesanRisolMatang['jumlahItem'];
            $jmlPesanRisolBeku = $this->model('Pesan_model')->getJumlahPesanan($noNota, 2);
            $jmlPesanRisolBeku = $jmlPesanRisolBeku['jumlahItem'];
        } else if($this->model('Pesan_model')->getJumlahPesanan($noNota, 1) == true){
            if($this->model('Pesan_model')->getJumlahPesanan($noNota, 1) == null){
                $jmlPesanRisolMatang = 0;
            } else {
                $jmlPesanRisolMatang = $this->model('Pesan_model')->getJumlahPesanan($noNota, 1);
                $jmlPesanRisolMatang = $jmlPesanRisolMatang['jumlahItem'];
            }
            $jmlPesanRisolBeku = 0;
        }else if($this->model('Pesan_model')->getJumlahPesanan($noNota, 2) == true){
            $jmlPesanRisolMatang = 0;
            if($this->model('Pesan_model')->getJumlahPesanan($noNota, 2) == null){
                $jmlPesanRisolBeku = 0;
            } else {
                $jmlPesanRisolBeku = $this->model('Pesan_model')->getJumlahPesanan($noNota, 2);
                $jmlPesanRisolBeku = $jmlPesanRisolBeku['jumlahItem'];
            }
        }

        $data['stokRisol'] = $this->model('Risol_model')->getStokRisol();
        $jmlStokRisolMatang = $data['stokRisol'][0]['jumlahStok'];
        $jmlStokRisolBeku = $data['stokRisol'][1]['jumlahStok'];

        $stokRisolMatangKembali = $jmlStokRisolMatang + $jmlPesanRisolMatang;
        $stokRisolBekuKembali = $jmlStokRisolBeku + $jmlPesanRisolBeku;

        $this->model('Risol_model')->updateJumlahStok3(1, $stokRisolMatangKembali);
        $this->model('Risol_model')->updateJumlahStok3(2, $stokRisolBekuKembali);
        if ($this->model('Pesan_model')->hapusPesanan_Pesan($noNota) > 0) { 
            if ($this->model('Pesan_model')->hapusPesanan_DetailPesan($noNota) > 0) { 
                header('Location: ' . BASEURL . '\pesan\berhasilHapusPesanan');
                exit;
            }
        }
    }

    public function halamanRevisi(){ #daftar pesanan dan tombol revisi
        $data['judul'] = 'Revisi Pesanan';
        $usernameCustomer = $_SESSION['usernameCustomer'];
        $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);
        $customer_id = $data['akunCustomer']['customer_id'];
        
        $tglBeli = new DateTime('now');
        $tglBeli = $tglBeli->format('Y-m-d');
        $data['dataPemesanan'] = $this->model('Pesan_model')->getDataPemesanan($tglBeli, $customer_id);

        $this->view('template/headerCustomer', $data);
        $this->view('customerView/halamanRevisiPesanan', $data);
        $this->view('template/footer');
    }

    public function tampilanRevisiPesanan(){ #mengubah data pemesanan
        $data1['judul'] = 'Revisi Pesanan';
        $noNota = $_POST['btnRevisi'];

        $data1['detailPesanan'] = $this->model('Pesan_model')->getDetailPesanan($noNota);

        $data2['dataRisol'] = $this->model('Risol_model')->getHarga_Stok();

        $data3['dataRisol2'] = $this->model('Pesan_model')->getDataPemesanan2($noNota);

        $this->view('template/headerCustomer', $data1);
        $this->view3('customerView/revisiPesanan', $data1, $data2, $data3);
        $this->view('template/footer');
        
    }

    public function revisiPesanan(){
        $noNota = (int)$_POST['noNota'];

        if($this->model('Pesan_model')->getJumlahPesanan($noNota, 1) == true && $this->model('Pesan_model')->getJumlahPesanan($noNota, 2) == true){
            $jmlPesanRisolMatang = $this->model('Pesan_model')->getJumlahPesanan($noNota, 1);
            $jmlPesanRisolMatang = $jmlPesanRisolMatang['jumlahItem'];
            $jmlPesanRisolBeku = $this->model('Pesan_model')->getJumlahPesanan($noNota, 2);
            $jmlPesanRisolBeku = $jmlPesanRisolBeku['jumlahItem'];
        } else if($this->model('Pesan_model')->getJumlahPesanan($noNota, 1) == true){
            if($this->model('Pesan_model')->getJumlahPesanan($noNota, 1) == null){
                $jmlPesanRisolMatang = 0;
            } else {
                $jmlPesanRisolMatang = $this->model('Pesan_model')->getJumlahPesanan($noNota, 1);
                $jmlPesanRisolMatang = $jmlPesanRisolMatang['jumlahItem'];
            }
            $jmlPesanRisolBeku = 0;
        }else if($this->model('Pesan_model')->getJumlahPesanan($noNota, 2) == true){
            $jmlPesanRisolMatang = 0;
            if($this->model('Pesan_model')->getJumlahPesanan($noNota, 2) == null){
                $jmlPesanRisolBeku = 0;
            } else {
                $jmlPesanRisolBeku = $this->model('Pesan_model')->getJumlahPesanan($noNota, 2);
                $jmlPesanRisolBeku = $jmlPesanRisolBeku['jumlahItem'];
            }
        }
        
        $data['stokRisol'] = $this->model('Risol_model')->getStokRisol();
        $jmlStokRisolMatang = $data['stokRisol'][0]['jumlahStok'];
        $jmlStokRisolBeku = $data['stokRisol'][1]['jumlahStok'];

        #tambahkan jumlah pemesanan dengan jumlah stok
        $stokRisolMatangKembali = $jmlStokRisolMatang + $jmlPesanRisolMatang;
        $stokRisolBekuKembali = $jmlStokRisolBeku + $jmlPesanRisolBeku;

        #ambil data revisi
        $jmlRisolMatangRevisi = (int)$_POST['jmlPesanMatang'];
        $jmlRisolBekuRevisi = (int)$_POST['jmlPesanBeku'];

        if(($stokRisolMatangKembali - $jmlRisolMatangRevisi) >= 0 && ($stokRisolBekuKembali - $jmlRisolBekuRevisi) >= 0){
            $stokMatangTerbaru = $stokRisolMatangKembali - $jmlRisolMatangRevisi;
            $stokBekuTerbaru = $stokRisolBekuKembali - $jmlRisolBekuRevisi;
            
            $tglBayar = date("Y-m-d",strtotime($_POST['tglBayar'])); 
            $tglAntar = date("Y-m-d",strtotime($_POST['tglAntar'])); 
            
            $data['hargaRisol'] = $this->model('Risol_model')->getHargaRisol();

            $usernameCustomer = $_SESSION['usernameCustomer'];
            $data['akunCustomer'] = $this->model('Customer_model')->getCustomer($usernameCustomer);
            $customer_id = $data['akunCustomer']['customer_id'];

            $hargaBeliRisolMatang = ((int)$data['hargaRisol'][0]['harga']) * $jmlRisolMatangRevisi;
            $hargaBeliRisolBeku = ((int)$data['hargaRisol'][1]['harga']) * $jmlRisolBekuRevisi; 
            $totalBayar = $hargaBeliRisolMatang + $hargaBeliRisolBeku; 

            $diskon = 0; #SSS
            if(($jmlRisolMatangRevisi + $jmlRisolBekuRevisi) >= 20 && ($jmlRisolMatangRevisi + $jmlRisolBekuRevisi) < 50){
                $diskon = 5; 
                $totalBayar = $totalBayar - (($totalBayar * $diskon) / 100);
            } else if(($jmlRisolMatangRevisi + $jmlRisolBekuRevisi) >= 50){
                $diskon = 10;
                $totalBayar = $totalBayar - (($totalBayar * $diskon) / 100); 
            }

            $this->model('Risol_model')->updateJumlahStok3(1, $stokMatangTerbaru);
            $this->model('Risol_model')->updateJumlahStok3(2, $stokBekuTerbaru);
            
            if($this->model('Pesan_model')->updateDetailPesan($noNota, 1, $jmlRisolMatangRevisi, $hargaBeliRisolMatang) > 0){
                if($this->model('Pesan_model')->updateDetailPesan($noNota, 2, $jmlRisolBekuRevisi, $hargaBeliRisolBeku) > 0){
                    if($this->model('Pesan_model')->updatePesan($noNota, $customer_id, $totalBayar, $diskon, $tglAntar, $tglBayar) > 0){
                        header('Location: ' . BASEURL . '\pesan\berhasilRevisiPesanan');
                        exit;
                    }
                }
            }
        } else {
            header('Location: ' . BASEURL . '\pesan\stokRevisiTidakCukup');
            exit;
        }      
    }
}