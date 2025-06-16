<?php
// CONTROLLER

defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_login');
		$this->load->helper('html');
		$this->load->helper('url');
    }

    public function index() {

        $email = $this->input->post("email"); 
        $password = $this->input->post("password");

        $email_unique = $this->model_login->emailUnique($email);
        $confirmation_password = $password == $this->input->post("confirmation");

        $this->load->view('signin', ['email_unique' => $email_unique, 'confirmation_password' => $confirmation_password]);

        if ($email_unique && $password && $confirmation_password) {
            $this->model_login->createAccount($email, $password);

            redirect('login');
        }
    }


}