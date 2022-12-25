<?php

class Pesan extends Controller{
    public function gagalLogin(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/header', $data);
        $this->view('pesan/gagalLogin');
        $this->view('template/footer');
    }

    public function berhasilPerbaruiAkunCustomer(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerCustomer', $data);
        $this->view('pesan/perbaruiAkunCustomer');
        $this->view('template/footer');
    }

    public function berhasilPerbaruiAkunSales(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerSales', $data);
        $this->view('pesan/perbaruiAkunSales');
        $this->view('template/footer');
    }

    public function berhasilPerbaruiAkunAdmin(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerAdmin', $data);
        $this->view('pesan/perbaruiAkunAdmin');
        $this->view('template/footer');
    }

    public function berhasilTambahStok(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerAdmin', $data);
        $this->view('pesan/perbaruiJumlahStok');
        $this->view('template/footer');
    }

    public function berhasilRevisiHarga(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerAdmin', $data);
        $this->view('pesan/perbaruiHargaRisol');
        $this->view('template/footer');
    }

    public function berhasilPesan(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerCustomer', $data);
        $this->view('pesan/berhasilPesan');
        $this->view('template/footer');
    }

    public function stokTidakCukup(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerCustomer', $data);
        $this->view('pesan/stokTidakCukup');
        $this->view('template/footer');
    }
 
    public function berhasilHapusPesanan(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerCustomer', $data);
        $this->view('pesan/berhasilHapusPesanan');
        $this->view('template/footer');
    }

    public function stokRevisiTidakCukup(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerCustomer', $data);
        $this->view('pesan/revisiStokTidakCukup');
        $this->view('template/footer');
    }

    public function berhasilRevisiPesanan(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerCustomer', $data);
        $this->view('pesan/berhasilRevisiPesanan');
        $this->view('template/footer');
    }

    public function berhasilTambahKaryawan(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerAdmin', $data);
        $this->view('pesan/berhasilTambahKaryawan');
        $this->view('template/footer');
    }

    public function laporanTidakDitemukan(){
        $data['judul'] = 'Notifikasi';
        $this->view('template/headerAdmin', $data);
        $this->view('pesan/laporanTidakDitemukan');
        $this->view('template/footer');
    }
}