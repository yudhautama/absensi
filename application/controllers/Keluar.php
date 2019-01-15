<?php

class Keluar extends CI_Controller {
    
    public function index()
    {
        $this->session->sess_destroy();
		redirect('welcome');
    }
}