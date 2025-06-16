<?php
// CONTROLLER

defined('BASEPATH') OR exit('No direct script access allowed');

class ListeEpisodes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_tvshow');
        $this->load->model('model_critiques');
		$this->load->helper('html');
		$this->load->helper('url');
    }

    public function index($id) {
        $noms = $this->model_tvshow->getSeriesNameBySeasonId($id);
        $episodes = $this->model_tvshow->getEpisodesBySeasonId($id);
        $imageSaison = $this->model_tvshow->getImageBySeasonId($id);
        $nbEpisodes = $this->model_tvshow->getNumberOfEpisodesBySeasonId($id);
        $logged_in = $this->session->userdata('logged_in');

        $critiques = $this->model_critiques->getCritiquesBySeasonId($id);

        $this->load->view("layout/header", ['logged_in' => $logged_in]);
        $this->load->view("liste_episodes", ['noms' => $noms, 'episodes' => $episodes, 'imageSaison' => $imageSaison, 'nbEpisodes' => $nbEpisodes]);
        $this->load->view("layout/footer_critique_serie", ['nom_url' => $this->uri->segment(1), 'critiques' => $critiques]);
        $this->load->view("layout/footer_creation_critique", ['logged_in' => $logged_in, 'idSaison' => $id, 'idSerie' => null]);

    }

}