<?php
// MODEL

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model_login extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function createAccount($mail, $password) {
        $query = $this->db->query("
            SELECT MAX(id) AS max
            FROM users;
        ");

        $id_max = $query->result();

        $nouvel_id = $id_max[0]->max + 1;
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = $this->db->query("
            INSERT INTO users VALUES (
            {$nouvel_id}, '{$mail}', '{$password}');
        ");
    }

    public function emailUnique($email) {
        $query = $this->db->query("SELECT email FROM users WHERE email = '{$email}'");

        return ($query->num_rows() == 0);
    }

    public function connexionReussie($email, $password) {
        $query = $this->db->query("SELECT email, passwd FROM users WHERE email = '{$email}';");

        $email = $query->row();

        return ($email && password_verify($password, $email->passwd));
    }

    public function getUserId($email) {
        $query = $this->db->query("SELECT id FROM users WHERE users.email = '$email';");
        return $query->row()->id;
    }
    
}