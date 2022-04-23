<?php

class Dokter_model
{
    private $table = 'dokter';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDokter()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDokterById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function cekEmail($data)
    {
        $this->db->query('SELECT email FROM ' . $this->table . ' WHERE email=:email');
        $this->db->bind('email', $data['email']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cekPassword($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
        $this->db->bind('email', $data['email']);
        $row = $this->db->single();
        if (password_verify($data['password'], $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            return true;
        } else {
            return false;
        }
    }
}