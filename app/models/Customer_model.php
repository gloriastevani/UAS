<?php 

class Customer_model {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function tambahDataCustomer($data){
        $query = "INSERT INTO customer
                    VALUES
                    ('', :nama, :alamat, :email, :noTelepon, :username, :password)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('noTelepon', $data['noTelepon']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getCustomer($data){
        $query = "SELECT * FROM customer WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $data);
        return $this->db->single();
    }

    public function getSemuaAkun(){
        $this->db->query("SELECT * FROM customer");
        return $this->db->resultSet();
    }
    
    public function updateAkunCustomer($customer_id, $nama, $alamat, $email, $noTelepon, $username, $password){
        $query = "UPDATE customer
                    SET nama = '$nama', alamat = '$alamat', 
                    email = '$email', noTelepon = '$noTelepon', username = '$username', password = '$password'
                    WHERE customer_id = '$customer_id'";
        $this->db->query($query);
        $this->db->execute();

        return 1;
    }

    public function getNamaCustomer($idCustomer){
        $query = "SELECT nama FROM customer WHERE customer_id = $idCustomer";
        $this->db->query($query);
        return $this->db->single();
    }
    
}