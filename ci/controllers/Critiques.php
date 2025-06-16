<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Critiques extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_critiques');
		$this->load->helper('html');
		$this->load->helper('url');
    }

    public function ajouter() {
        $idUser = $this->session->userdata('id');
        $idSerie = $this->input->post('idSerie');
        $idSaison = $this->input->post('idSaison');
        $note = $this->input->post('note');
        $contenu = $this->input->post('contenu');

        $this->model_critiques->ajouterCritique($idUser, $idSerie, $idSaison, $note, $contenu);

        redirect('tvshow');
    }
}

?>