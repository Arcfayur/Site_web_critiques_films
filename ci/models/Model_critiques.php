<?php
// MODEL

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model_critiques extends CI_Model {

    public function __construct() {
        $this->load->database();	
    }

    public function ajouterCritique($userId, $idSerie, $idSaison, $note, $contenu) {
        $query = $this->db->query("SELECT COUNT(*) AS nb FROM critiques;");

        $suivant = $query->row()->nb + 1;

        $data = [
            'id' => $suivant, 
            'userId' => $userId,
            'idSerie' => $idSerie ?: null,  
            'idSaison' => $idSaison ?: null,
            'note' => $note,
            'contenu' => $contenu
        ];

        $this->db->insert('critiques', $data);
    }

    public function getCritiquesBySeasonId($id) {
        $query = $this->db->query("SELECT * FROM critiques WHERE critiques.idSaison = {$id};");
        return $query->result();
    }

    public function getCritiquesBySeriesId($id) {
        $query = $this->db->query("SELECT * FROM critiques WHERE critiques.idSerie = {$id};");
        return $query->result();
    }
}