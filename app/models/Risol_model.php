<?php 

class Risol_model {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getHargaRisol(){
        $this->db->query("SELECT risol_id, namaRisol, harga FROM risol");
        return $this->db->resultSet();
    }
    
    public function getStokRisol(){
        $this->db->query("SELECT risol_id, namaRisol, jumlahStok FROM risol");
        return $this->db->resultSet();
    }

    public function getHarga_Stok(){
        $this->db->query("SELECT risol_id, namaRisol, jumlahStok, harga FROM risol");
        return $this->db->resultSet();
    }

    public function getNamaRisol(){
        $this->db->query("SELECT namaRisol FROM risol");
        return $this->db->resultSet();
    }

    public function updateJumlahStok($namaRisol, $jumlahStok){
        $query = "UPDATE risol
                    SET jumlahStok = $jumlahStok
                    WHERE namaRisol = '$namaRisol'";
        $this->db->query($query);
        $this->db->execute();

        return 1;
    }

    public function updateJumlahStok2($namaRisol, $jumlahStok){
        $query = "UPDATE risol
                    SET jumlahStok = $jumlahStok
                    WHERE namaRisol = '$namaRisol'";
        $this->db->query($query);
        $this->db->execute();
    }

    public function updateJumlahStok3($idRisol, $jumlahStok){
        $query = "UPDATE risol
                    SET jumlahStok = $jumlahStok
                    WHERE risol_id = $idRisol";
        $this->db->query($query);
        $this->db->execute();
    }

    public function getSatuStokRisol($data){
        $this->db->query("SELECT jumlahStok FROM risol WHERE namaRisol = '$data'");
        return $this->db->single();
    }

    public function updateHargaRisol($namaRisol, $harga){
        $query = "UPDATE risol
                    SET harga = $harga
                    WHERE namaRisol = '$namaRisol'";
        $this->db->query($query);
        $this->db->execute();

        return 1;
    }
}