<?php

class Mahasiswa_model {

    private $tabel = 'mahasiswa';
    private $db;

    public function __construct() {
        
        $this->db = new Database;
        
    }

    public function getAllMahasiswa() {

        $this->db->query("SELECT * FROM $this->tabel");
        return $this->db->fetch_assoc();

    }

    public function getMahasiswa($id) {

        $this->db->query("SELECT * FROM $this->tabel WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch_data();
        
    }

    public function tambah($data) {

        $this->db->query("INSERT INTO `mahasiswa`(`id`, `nim`, `nama`, `email`, `jurusan`) VALUES ('', :nim, :nama, :email, :jurusan)");

        foreach($data as $key => $value) {
            $this->db->bind($key, $value);
        }

        $this->db->execute();
        
        return $this->db->numrow();
        
    }

    public function delete($id) {
        
        $this->db->query("DELETE FROM `mahasiswa` WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->numrow();
        
    }

    public function update($data) {
        
        $this->db->query("UPDATE `mahasiswa` SET `nim`=:nim,`nama`=:nama,`email`=:email,`jurusan`=:jurusan WHERE id=:id");

        foreach($data as $key => $value) {
            $this->db->bind($key, $value);
        }

        $this->db->execute();

        return $this->db->numrow();
        
    }

    public function search($keyword) {

        $this->db->query("SELECT * FROM `mahasiswa` WHERE nim LIKE :keyword OR nama LIKE :keyword OR email LIKE :keyword OR jurusan LIKE :keyword");

        $this->db->bind('keyword', "%$keyword%");
        
        return $this->db->fetch_assoc();
        
    }
    
}