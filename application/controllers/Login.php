<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
	}
	public function index()
	{
		if($this->session->has_userdata('user_id')){
			header("Location:.");
		}else{
			$this->form_validation->set_rules('username','Username',array('required','min_length[6]','max_length[12]'));
	    	$this->form_validation->set_rules('password','Password',array('required','min_length[6]','max_length[12]'));

			if($this->form_validation->run()===False){
	    		// $this->load->view('templates/header',$data);
	    		$this->load->view('login');
	    		// $this->load->view('register',$data);
	    		// $this->load->view('templates/footer');
	    	}else{
	    		$result=$this->User_model->check();
	    		if($result->num_rows()==1){
	    			$resultData=$result->row_array();
	    			$this->session->set_userdata('user_id',$resultData['user_id']);
	    			// $this->load->view('loginsuccess');
	    			header("Location:.");
	    		}else{
	    			$data['error']='Login Failed';
		    		$this->load->view('login',$data);
	    		}
	    	}
		}
	}
}
