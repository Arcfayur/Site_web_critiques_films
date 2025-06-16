<?php
// CONTROLLER

defined('BASEPATH') OR exit('No direct script access allowed');

class ListeSaisons extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_tvshow');
        $this->load->model('model_critiques');
		$this->load->helper('html');
		$this->load->helper('url');
    }

    public function index($id) {
        $details = $this->model_tvshow->getTvshowById($id);
        $saisons = $this->model_tvshow->getSeasonsById($id);
        $logged_in = $this->session->userdata('logged_in');

        $critiques = $this->model_critiques->getCritiquesBySeriesId($id);

        $this->load->view("layout/header", ['logged_in' => $logged_in]);
        $this->load->view("liste_saisons", ['details' => $details[0], 'saisons' => $saisons]);
        $this->load->view("layout/footer_critique_serie", ['nom_url' => $this->uri->segment(1), 'critiques' => $critiques]);
        $this->load->view("layout/footer_creation_critique", ['logged_in' => $logged_in, 'idSerie' => $id, 'idSaison' => null]);

    }

}