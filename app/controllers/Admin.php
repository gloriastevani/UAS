<?php
session_start();
class Admin extends Controller{
    public function tampilkanAkunAdmin(){
        $data['judul'] = 'Akun Admin';
        $usernameAdmin = $_SESSION['usernameAdmin'];
        $data['akunAdmin'] = $this->model('Karyawan_model')->getKaryawan($usernameAdmin);
        $this->view('template/headerAdmin', $data);
        $this->view('akun/lihatAkunAdmin', $data);
        $this->view('template/footer');
    }

    public function halamanEditAkun(){
        $data['judul'] = 'Edit Akun Admin';
        $usernameAdmin = $_SESSION['usernameAdmin'];
        $data['akunAdmin'] = $this->model('Karyawan_model')->getKaryawan($usernameAdmin);
        $this->view('template/headerAdmin', $data);
        $this->view('akun/editAkunAdmin', $data);
        $this->view('template/footer');
    }

    public function editAkunAdmin(){
        $data['judul'] = 'Edit Akun Admin';
        $usernameAdmin = $_SESSION['usernameAdmin'];
        $data['akunAdmin'] = $this->model('Karyawan_model')->getKaryawan($usernameAdmin);

        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $tglLahir = $_POST['tglLahir'];
        $noTelepon = $_POST['noTelepon'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($this->model('Karyawan_model')->updateAkunAdmin($nip, $nama, $alamat, $email, $tglLahir, $noTelepon, $username, $password) > 0){
            header('Location: ' . BASEURL . '\Pesan\berhasilPerbaruiAkunAdmin');
            exit;
        }
    }

    public function halamanLihatHarga(){
        $data['judul'] = 'Lihat Harga';
        $data['hargaRisol'] = $this->model('Risol_model')->getHargaRisol();

        $this->view('template/headerAdmin', $data);
        $this->view('adminView/lihatHarga', $data);
        $this->view('template/footer');
    }

    public function halamanLihatStok(){
        $data['judul'] = 'Lihat Stok';
        $data['stokRisol'] = $this->model('Risol_model')->getStokRisol();

        $this->view('template/headerAdmin', $data);
        $this->view('adminView/lihatStok', $data);
        $this->view('template/footer');
    } 

    public function halamantambahStok(){
        $data['judul'] = 'Tambah Stok';
        $data['daftarNama'] = $this->model('Risol_model')->getNamaRisol();

        $this->view('template/headerAdmin', $data);
        $this->view('adminView/tambahStok', $data);
        $this->view('template/footer');
    }

    public function tambahStok(){
        $namaRisol = $_POST['daftar'];
        $jumlahStok = (int)$_POST['kolomTambahStok'];
        $data['stokRisol'] = $this->model('Risol_model')->getSatuStokRisol($namaRisol);
        $jumlahStokLama = $data['stokRisol']['jumlahStok'];
        $stokTerbaru = $jumlahStokLama +  $jumlahStok;

        if($this->model('Risol_model')->updateJumlahStok($namaRisol, $stokTerbaru) > 0){
            header('Location: ' . BASEURL . '\pesan\berhasilTambahStok');
            exit;
        }
    }

    public function halamanRevisiHarga(){
        $data['judul'] = 'Revisi Harga';
        $data['daftarNama'] = $this->model('Risol_model')->getNamaRisol();

        $this->view('template/headerAdmin', $data);
        $this->view('adminView/revisiHarga', $data);
        $this->view('template/footer');
    }

    public function revisiHarga(){
        $namaRisol = $_POST['daftar'];
        $harga = $_POST['kolomRevisiHarga'];

        if($this->model('Risol_model')->updateHargaRisol($namaRisol, $harga) > 0){
            header('Location: ' . BASEURL . '\pesan\berhasilRevisiHarga');
            exit;
        }
    }

    public function halamanLaporan(){
        $data['judul'] = 'Lihat Laporan';

        $this->view('template/headerAdmin', $data);
        $this->view('adminView/lihatLaporan');
        $this->view('template/footer');
    }

    public function lihatLaporan(){
        $data1['judul'] = 'Lihat Laporan';
        $tanggalAwal = $_POST['tanggalAwal'];
        $tanggalAkhir = $_POST['tanggalAkhir'];

        $data2['tanggalAwal'] = $tanggalAwal;
        $data2['tanggalAkhir'] = $tanggalAkhir;

        if($this->model('Pesan_model')->cekCustomerPalingSeringPesan($tanggalAwal, $tanggalAkhir) == true){
            $dataCustomer = $this->model('Pesan_model')->cekCustomerPalingSeringPesan($tanggalAwal, $tanggalAkhir);
            $idCustomer = $dataCustomer[0]['customer_id'];
            $data1['namaPalingSeringBeli'] = $this->model('Customer_model')->getNamaCustomer($idCustomer);

            $bayarTerbesar = $this->model('Pesan_model')->getTransaksiTerbanyak($tanggalAwal, $tanggalAkhir);
            $data1['namaBayarTerbanyak'] = $this->model('Customer_model')->getNamaCustomer($bayarTerbesar[0]['customer_id']);

            $data1['untung'] = $this->model('Pesan_model')->getTotalKeuntungan($tanggalAwal, $tanggalAkhir);

            $data1['totalBeliRisolMatang'] = $this->model('Pesan_model')->getTotalBeliRisolMatang($tanggalAwal, $tanggalAkhir);
            $data1['totalBeliRisolBeku'] = $this->model('Pesan_model')->getTotalBeliRisolBeku($tanggalAwal, $tanggalAkhir);
            $data1['totalBeliSemuaRisol'] = (int)$data1['totalBeliRisolMatang']['jumlahItem'] + (int)$data1['totalBeliRisolBeku']['jumlahItem'];

            $this->view('template/headerAdmin', $data1);
            $this->view2('adminView/lihatLaporan2', $data1, $data2);
            $this->view('template/footer');
        } else {
            header('Location: ' . BASEURL . '\pesan\laporanTidakDitemukan');
            exit;
        }
    }

    public function halamanTambahKaryawan(){
        $data['judul'] = 'Tambah Karyawan';

        $this->view('template/headerAdmin', $data);
        $this->view('adminView/tambahKaryawan');
        $this->view('template/footer');
    }

    public function tambahKaryawan(){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $tglLahir = $_POST['tglLahir'];
        $noTelepon = $_POST['noTelepon'];
        $jenisKaryawan = $_POST['jenisKaryawan'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $idToko = 1;
        $tglMasuk = $_POST['tglMasuk'];

        if($this->model('Karyawan_model')->tambahDataKaryawan($nama, $alamat, $email, $tglLahir, $noTelepon, $jenisKaryawan, $username, $password, $idToko, $tglMasuk) > 0){
            header('Location: ' . BASEURL . '\pesan\berhasilTambahKaryawan');
            exit;
        }
    }

    public function cetakLaporan(){
        $data['tglAwal'] = $_POST['tglAwal'];
        $data['tglAkhir'] = $_POST['tglAkhir'];
        $data['cpalingBanyakPesan'] = $_POST['cpalingBanyakPesan'];
        $data['cbayarPalingBanyak'] = $_POST['cbayarPalingBanyak'];
        $data['totalKeuntungan'] = $_POST['totalKeuntungan'];
        $data['jmlBeliSemuaRisol'] = $_POST['jmlBeliSemuaRisol'];
        $data['jmlBeliRisolMatang'] = $_POST['jmlBeliRisolMatang'];
        $data['jmlBeliRisolBeku'] = $_POST['jmlBeliRisolBeku'];
        
        $this->view('adminView/cetakLaporan', $data);
    }
}