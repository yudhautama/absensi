<?php

class Member extends CI_Controller {
    
    public function index()
	{
        $data["title"] = "Halaman Member";
        $this->load->view('templates/head', $data);
        $this->load->view('home.1/index', $data);
        $this->load->view('templates/footer');	
    }
}