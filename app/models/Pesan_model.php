<?php

class Pesan_model {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function simpanPesanan($tglBeli, $totalBayar, $diskon, $tglAntar, $tglBayar, $customer_id){
        $query = "INSERT INTO pesan
                    VALUES('', '$tglBeli', $totalBayar, $diskon, '$tglAntar', '$tglBayar', $customer_id)";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function simpanDetailPesanan($noNota, $risol_id, $jumlahItem, $totalPerItem){
        $query = "INSERT INTO detailpesan
                    VALUES('', $noNota, $risol_id, $jumlahItem, $totalPerItem)";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getNoNota($idCustomer, $tglAntar, $tglBayar, $totalBayar){
        $this->db->query("SELECT noNota FROM pesan WHERE customer_id = $idCustomer AND tglAntar = '$tglAntar' AND tglBayar = '$tglBayar' AND totalBayar = $totalBayar");
        return $this->db->single();
    }

    public function getDataPemesanan($tglBeli, $idCustomer){
        $this->db->query("SELECT noNota, tglBeli, totalBayar, diskon, tglAntar, tglBayar FROM pesan WHERE customer_id = $idCustomer AND tglBeli = '$tglBeli'");
        return $this->db->resultSet();
    }

    public function getDetailPesanan($noNota){
        $this->db->query("SELECT noNota, risol_id, jumlahItem FROM detailPesan WHERE noNota = $noNota");
        return $this->db->resultSet();
    }

    public function hapusPesanan_Pesan($noNota){
        $this->db->query("DELETE FROM pesan WHERE noNota = $noNota");
        $this->db->execute();
        return 1;
    }

    public function hapusPesanan_DetailPesan($noNota){
        $this->db->query("DELETE FROM detailPesan WHERE noNota = $noNota");
        $this->db->execute();
        return 1;
    }

    public function getDataPemesanan2($noNota){
        $this->db->query("SELECT noNota, tglBeli, totalBayar, diskon, tglAntar, tglBayar FROM pesan WHERE noNota = $noNota");
        return $this->db->single();
    }

    public function updateDetailPesan($noNota, $idRisol, $jumlahItem, $totalPerItem){
        $query = "UPDATE detailpesan
                    SET jumlahItem = $jumlahItem, totalPerItem = $totalPerItem
                    WHERE noNota = $noNota AND risol_id = $idRisol";
        $this->db->query($query);
        $this->db->execute();

        return 1;
    }

    public function updatePesan($noNota, $idCustomer, $totalBayar, $diskon, $tglAntar, $tglBayar){
        $query = "UPDATE pesan
                    SET totalBayar = $totalBayar, diskon = $diskon, tglAntar = '$tglAntar', tglBayar = '$tglBayar'
                    WHERE noNota = $noNota AND customer_id = $idCustomer";
        $this->db->query($query);
        $this->db->execute();

        return 1;
    }

    public function getJumlahPesanan($noNota, $idRisol){
        $this->db->query("SELECT jumlahItem FROM detailpesan WHERE noNota = $noNota AND risol_id = $idRisol");
        return $this->db->single();
    }

    public function cekCustomerPalingSeringPesan($tanggalAwal, $tanggalAkhir){
        $this->db->query("SELECT customer_id, count(customer_id) AS jumlahBeli FROM pesan WHERE tglBeli BETWEEN '$tanggalAwal' AND '$tanggalAkhir' GROUP BY customer_id ORDER BY count(customer_id) DESC LIMIT 1");
        return $this->db->resultSet();
    }

    public function getTransaksiTerbanyak($tanggalAwal, $tanggalAkhir){
        $this->db->query("SELECT customer_id, max(totalBayar) AS bayarTerbesar FROM pesan WHERE tglBeli BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
        return $this->db->resultSet();
    }

    public function getTotalKeuntungan($tanggalAwal, $tanggalAkhir){
        $this->db->query("SELECT SUM(totalBayar) AS totalKeuntungan FROM pesan WHERE tglBeli BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
        return $this->db->single();
    }

    public function getTotalBeliRisolMatang($tanggalAwal, $tanggalAkhir){
        $this->db->query("SELECT sum(jumlahItem) AS jumlahItem FROM detailpesan WHERE noNota IN (SELECT noNota FROM pesan WHERE tglBeli BETWEEN '$tanggalAwal' AND '$tanggalAkhir') AND risol_id = 1");
        return $this->db->single();
    }

    public function getTotalBeliRisolBeku($tanggalAwal, $tanggalAkhir){
        $this->db->query("SELECT sum(jumlahItem) AS jumlahItem FROM detailpesan WHERE noNota IN (SELECT noNota FROM pesan WHERE tglBeli BETWEEN '$tanggalAwal' AND '$tanggalAkhir') AND risol_id = 2");
        return $this->db->single();
    }
}