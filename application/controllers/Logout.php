<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$this->user_model->logout();
		header("location:.");
	}
}
