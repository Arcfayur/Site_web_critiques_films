<?php
// CONTROLLER

defined('BASEPATH') OR exit('No direct script access allowed');

class Tvshow extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_tvshow');
		$this->load->helper('html');
		$this->load->helper('url');

	}
	public function index(){
		$genre_selectionne = $this->input->post('type');
		$recherche_utilisateur = $this->input->post('search');

		if ($recherche_utilisateur) {
			$tvshow = $this->model_tvshow->searchTvshow($recherche_utilisateur);
		}

		else if ($genre_selectionne) {
			$tvshow = $this->model_tvshow->getTvshowByGenre($genre_selectionne);
		}

		else {
			$tvshow = $this->model_tvshow->getTvshow();
		}

		$genres = $this->model_tvshow->getGenres();
		$this->load->view('layout/header', ['logged_in' => $this->session->userdata('logged_in') ,'genres'=>$genres, 'genre_selectionne'=>$genre_selectionne]);
		if (!empty($tvshow)) {
			$this->load->view('tvshow_list',['tvshow'=>$tvshow]);
		} else {
			$this->load->view('erreur_recherche');
		}
		$this->load->view('layout/footer');
	}
}
