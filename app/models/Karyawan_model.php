<?php 

class Karyawan_model {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getKaryawan($data){
        $query = "SELECT * FROM karyawan WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $data);
        return $this->db->single();
    }

    public function updateAkunSales($nip, $nama, $alamat, $email, $tglLahir, $noTelepon, $username, $password){
        $query = "UPDATE karyawan
                    SET nama = '$nama', alamat = '$alamat', 
                    email = '$email', tglLahir = '$tglLahir', noTelepon = '$noTelepon', username = '$username', password = '$password'
                    WHERE nip = $nip";
        $this->db->query($query);
        $this->db->execute();

        return 1;
    }

    public function updateAkunAdmin($nip, $nama, $alamat, $email, $tglLahir, $noTelepon, $username, $password){
        $query = "UPDATE karyawan
                    SET nama = '$nama', alamat = '$alamat', 
                    email = '$email', tglLahir = '$tglLahir', noTelepon = '$noTelepon', username = '$username', password = '$password'
                    WHERE nip = $nip";
        $this->db->query($query);
        $this->db->execute();

        return 1;
    }
    
    public function tambahDataKaryawan($nama, $alamat, $email, $tglLahir, $noTelepon, $jenisKaryawan, $username, $password, $idToko, $tglMasuk){
        $query = "INSERT INTO karyawan
                    VALUES
                    ('', '$nama', '$alamat', '$email', '$tglLahir', '$noTelepon', '$jenisKaryawan', '$username', '$password', $idToko, '$tglMasuk')";
    $this->db->query($query);
    $this->db->execute();
    return $this->db->rowCount();    
    }
}