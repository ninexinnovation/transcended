<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProcessing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("DataModel");
		$this->form_validation->set_message('alpha_dash_space', 'The %s field can only contain alpha characters or spaces.');
	}
	function alpha_dash_space($str)
	{
		// $this->form_validation->set_message('alpha_dash_space', 'The may only contain alpha-numeric characters or spaces.');
	    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}

	public function saveInventoryCatagory(){
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','alpha_dash_space'));
	    $this->form_validation->set_rules('value[1]',$name[1],array('required','numeric'));

		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			$this->DataModel->saveCatagory($name,$value);
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

		$this->form_validation->set_rules('value[0]',$name[0],array('required'));
		$this->form_validation->set_rules('value[1]',$name[1],array('required'));
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
	public function addNewBill(){
		$clothId=$this->input->post("clothId");
		$clothLength=$this->input->post("clothLength");
		$quantity=$this->input->post("quantity");
		if(count($clothId)!=0){
			$this->form_validation->set_rules('customerId','Customer',array('required'));
			$this->form_validation->set_rules('date','Date',array('required'));
			$this->form_validation->set_rules('deliveryDate','Delivery Date',array('required'));
			if($this->form_validation->run()===False){
				echo json_encode(['error'=>array_values($this->form_validation->error_array())]);	
			}else{
				if(strtotime($this->input->post("date"))<=strtotime($this->input->post("deliveryDate"))){
					$clothAvailable=true;
					for($i=0;$i<count($clothId);$i++){
						$item=$this->DataModel->getItemById($clothId[$i])[0];
						if($item['current_quantity']<$clothLength[$i]*$quantity[$i]){
							echo json_encode(['error'=>["Oops!! \n Shade No. ".$clothId[$i]." is not available."]]);
							$clothAvailable=false;
						}
					}
					if($clothAvailable){
						if($this->DataModel->addNewBill()){
							echo true;
						}else{
							echo json_encode(['error'=>["Oops!! \n This Bill Cannot be issued!!!"]]);
						}
					}
				}else{
					echo json_encode(['error'=>["Deliver date must be after bill Issue date."]]);
				}
			}
		}else{
			echo json_encode(['error'=>["Sorry you must add items."]]);
		}
	}


	public function updateDeleteCustomer()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[1]',$name[1],array('required'));
		$this->form_validation->set_rules('value[2]',$name[2],array('required'));
	    $this->form_validation->set_rules('value[3]',$name[3],array('required','numeric','min_length[7]','max_length[10]'));


		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			if($value[4]=="updateCustomer"){
				$this->DataModel->updateCustomer($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Updated"]
							]);
			}else if($value[4]=="deleteCustomer"){
				$this->DataModel->deleteCustomer($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Deleted"]
							]);
			}
		}
	}


	public function updateDeleteInventoryItem()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','numeric'));
		$this->form_validation->set_rules('value[1]',$name[1],array('required','numeric'));
		$this->form_validation->set_rules('value[2]',$name[2],array('required','numeric'));
		$this->form_validation->set_rules('value[3]',$name[3],array('required'));
		$this->form_validation->set_rules('value[4]',$name[4],array('required','numeric'));
		$this->form_validation->set_rules('value[5]',$name[4],array('required','numeric'));


		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			if($value[6]=="updateItem"){
				$this->DataModel->updateItem($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Item Updated"]
							]);
			}else if($value[6]=="deleteItem"){
				$this->DataModel->deleteItem($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Item Deleted"]
							]);
			}
		}
	}


	public function updateDeleteCatagory()
	{
		$name=$this->input->post("name");
		$value=$this->input->post("value");

		$this->form_validation->set_rules('value[0]',$name[0],array('required','numeric'));
		$this->form_validation->set_rules('value[1]',$name[1],array('required'));
	    $this->form_validation->set_rules('value[2]',$name[1],array('required','numeric'));



		if($this->form_validation->run()===False){
			// $error_messages=$this->form_validation->error_array();
			echo json_encode([
								"success"=>"false",
								"messageType"=>"danger",
								"message"=>array_values($this->form_validation->error_array())
							]);	
		}else{
			if($value[3]=="updateCatagory"){
				$this->DataModel->updateItem($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Item Updated"]
							]);
			}else if($value[3]=="deleteItem"){
				$this->DataModel->deleteCatagory($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Item Deleted"]
							]);
			}
		}
	}


public function updateDeleteWorker()
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
			if($value[2]=="updateWorker"){
				$this->DataModel->updateWorker($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Worker Updated"]
							]);
			}else if($value[2]=="deleteWorker"){
				$this->DataModel->deleteWorker($name,$value);

				echo json_encode([
								"success"=>"true",
								"messageType"=>"success",
								"message"=>["Successfully Worker Deleted"]
							]);
			}
		}
	}







	
	public function getItemCatagories(){
		$data=$this->DataModel->getItemCatagories();
		echo "<option value=0>Choose Item Type</option>";
		foreach ($data as $catagory) {
			echo "<option value='".$catagory->catagory_id."'>".$catagory->catagory_name."</option>";
		}
	}
	public function getItems(){
		$data=$this->DataModel->getItems();
		echo "<option value='0'>Other</option>";
		
		foreach ($data as $item) {
			echo "<option value='".$item->item_code_no."'>".$item->item_code_no."</option>";
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
	public function getAllCustomizedReportJson(){
		$data=$this->DataModel->getCustomizedReport();
		echo json_encode(["data"=>$data]);
	}
	public function getAllViewBillJson(){
		$data=$this->DataModel->getAllViewBill();
		echo json_encode(["data"=>$data]);
	}
	public function getCustomerByIdJson(){
		$name=$this->input->post("name");
		$value=$this->input->post("value");
		$id=0;
		$i=0;
		foreach ($name as $n) {
			if($n=="id"){
				$id=$value[$i];
			}
			$i++;
		}
		$data=$this->DataModel->getCustomerById($id);
		echo json_encode(["data"=>$data]);
	}

	public function getItemByIdJson(){
		$name=$this->input->post("name");
		$value=$this->input->post("value");
		$id=0;
		$i=0;
		foreach ($name as $n) {
			if($n=="id"){
				$id=$value[$i];
			}
			$i++;
		}
		$data=$this->DataModel->getItemById($id);
		echo json_encode(["data"=>$data]);
	}


	public function getCatagoryByIdJson(){
		$name=$this->input->post("name");
		$value=$this->input->post("value");
		$id=0;
		$i=0;
		foreach ($name as $n) {
			if($n=="id"){
				$id=$value[$i];
			}
			$i++;
		}
		$data=$this->DataModel->getCatagoryById($id);
		echo json_encode(["data"=>$data]);
	}

	public function getWorkerByIdJson(){
		$name=$this->input->post("name");
		$value=$this->input->post("value");
		$id=0;
		$i=0;
		foreach ($name as $n) {
			if($n=="id"){
				$id=$value[$i];
			}
			$i++;
		}
		$data=$this->DataModel->getWorkerById($id);
		echo json_encode(["data"=>$data]);
	}
	public function getTransactionByCatagoryJson(){
		$catagory=$this->input->post("catagory");
		$value=$this->input->post("value");
		$month=$this->input->post("month");
		switch (strtolower($catagory)) {
			case 'yearly':
				// echo "yearly";
				$data=$this->DataModel->getTransactionYearly($value);
				break;
			case 'monthly':
				// echo "monthly";
				$data=$this->DataModel->getTransactionMonthly($value,$month);
				break;
			case 'weekly':
				// echo "monthly";
				$data=$this->DataModel->getTransactionWeekly($value,$month);
				break;
			default:
				$data=[];
				echo "unknown";
				break;
		}
		// $data=$this->DataModel->getWorkerById($id);
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
	public function getLatestInventoryCatagoryId(){
		echo $this->DataModel->getLatestInventoryCatagoryId()+1;
	}
	public function getLatestInventoryId(){
		echo $this->DataModel->getLatestInventoryId()+1;
	}
	public function getLatestBillingId(){
		echo $this->DataModel->getLatestBillingId()+1;
	}
	public function getMonthlyDetailsForChartJson(){
		echo json_encode(['coat'=>$this->DataModel->getNoOfCoatsPerMonth(),
							'pant'=>$this->DataModel->getNoOfPantsPerMonth(),
							'shirt'=>$this->DataModel->getNoOfShirtsPerMonth(),
							'others'=>$this->DataModel->getNoOfOthersPerMonth()]);
	}
}
