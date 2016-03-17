<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProcessing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("DataModel");
	}
	public function saveInventoryCatagory()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','alpha'));
	    $this->form_validation->set_rules('value[1]',$name[1],array('required','numeric'));

		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			$this->DataModel->saveInventoryCatagory($name,$value);
			echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["success"]
							]);
		}
	}
	public function getLatestInventoryCategoryId(){
		echo $this->DataModel->getLatestInventoryCategoryId()+1;
	}
}
