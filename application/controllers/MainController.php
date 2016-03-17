<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		if($this->session->has_userdata('user_id')){
			$this->load->view('main');
		}else{
			redirect("Login","Refresh");
		}
	}
}
