<?php
// CONTROLLER

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_login');
		$this->load->helper('html');
		$this->load->helper('url');
    }

    public function index() {
        $connexion_reussie = null;
        $email = $this->input->post("email"); 
        $password = $this->input->post("password");
        
        if ($email && $password) {
            $connexion_reussie = $this->model_login->connexionReussie($email, $password);

            if ($connexion_reussie) {
                $session_data = array(
                    'id' => $this->model_login->getUserId($email),
                    'email' => $email,
                    'logged_in' => true
                );

                $this->session->set_userdata($session_data);

                redirect('tvshow');
                return;
            }
        }

        $this->load->view('login', ['connexion_reussie' => $connexion_reussie]);

    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('tvshow');
    }

}
