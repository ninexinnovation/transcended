<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProcessing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("DataModel");
	}
	public function saveInventoryCatagory(){
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

// add user controller
	public function addUser()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','alpha'));
	    $this->form_validation->set_rules('value[1]',$name[1],array('required','alpha'));
	    $this->form_validation->set_rules('value[2]',$name[2],array('required','alpha_numeric','min_length[6]','max_length[30]'));
	    $this->form_validation->set_rules('value[3]',$name[3],array('required','alpha_numeric','min_length[6]','max_length[30]'));

		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			$this->DataModel->addUser($name,$value);
			echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["success"]
							]);
		}
	}
// add customer controller
	public function addCustomer()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','alpha'));
		$this->form_validation->set_rules('value[1]',$name[1],array('required','alpha'));
	    $this->form_validation->set_rules('value[2]',$name[2],array('required','numeric','min_length[7]','max_length[10]'));


		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			$this->DataModel->addCustomer($name,$value);
			echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["success"]
							]);
		}
	}
	// add Worker contorller

	public function addWorker()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','alpha'));



		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			$this->DataModel->addWorker($name,$value);
			echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["success"]
							]);
		}
	}

	// this is for item  addition
	public function addItem()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','numeric'));
		$this->form_validation->set_rules('value[1]',$name[1],array('required','numeric'));
		$this->form_validation->set_rules('value[2]',$name[2],array('required'));
		$this->form_validation->set_rules('value[3]',$name[3],array('required','numeric'));
		$this->form_validation->set_rules('value[4]',$name[4],array('required','numeric'));






		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			$this->DataModel->addItem($name,$value);
			echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["success"]
							]);
		}
	}
public function addCompany()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','alpha'));
		



		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			$this->DataModel->addCompany($name,$value);
			echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["success"]
							]);
		}
	}




	
	public function getItemCatagories(){
		$data=$this->DataModel->getItemCatagories();
		echo "<option value=''>Choose Item Type</option>";
		foreach ($data as $catagory) {
			echo "<option value='".$catagory->catagory_id."'>".$catagory->catagory_name."</option>";
		}
	}

	public function getCompanies(){
		$data=$this->DataModel->getCompanies();
		echo "<option value=''>Choose Item Type</option>";
		echo "<option value='' data-value='add'>Add New</option>";
		foreach ($data as $company) {
			echo "<option value='".$company->company_id."'>".$company->company_name."</option>";
		}
	}
	public function getAllCustomerJson(){
		$data=$this->DataModel->getCustomers();
		echo json_encode(["data"=>$data]);
	}

	// public function getCompanyCatagories(){
	// 	$data=$this->DataModel->getCompanyCatagories();
	// 	echo "<option value=''>Choose Company</option>";
	// 	foreach ($data as $companyName) {
	// 		echo "<option value='".$companyName->company_id."'>".$companyName->company_id."</option>";
	// 	}
	// }
	public function getLatestUserId(){
		echo $this->DataModel->getLatestUserId()+1;
	}

	public function getLatestCustomerId(){
		echo $this->DataModel->getLatestCustomerId()+1;
	}

	public function getLatestWorkerId(){
		echo $this->DataModel->getLatestWorkerId()+1;
	}
	public function getLatestCompanyId(){
		echo $this->DataModel->getLatestCompanyId()+1;
	}

	public function getLatestInventoryCategoryId(){
		echo $this->DataModel->getLatestInventoryCategoryId()+1;
	}
	public function getLatestInventoryId(){
		echo $this->DataModel->getLatestInventoryId()+1;
	}
	public function getLatestBillingId(){
		echo $this->DataModel->getLatestBillingId()+1;
	}
}
