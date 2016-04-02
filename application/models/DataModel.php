<?php
class DataModel extends CI_Model{
	public function __construct(){
		// $this->load->database();
	}
	// public function check(){
	// 	// $this->load->helper('url');

	// 	$query=$this->db->get_where('user',
	// 			array(
	// 				'user_name'=>$this->input->post('username'),
	// 				'password'=>md5($this->input->post('password'))
	// 			)
	// 		);
	// 	return $query;
	// }
	function getLatestInventoryCategoryId(){
		$this->db->select("catagory_id")->limit(1)->order_by("catagory_id","desc");
		$data=$this->db->get("catagory_details")->result();
		// var_dump($data);
		if(count($data)!=0){
			return $data[0]->catagory_id;
		}
	}
	function getLatestInventoryId(){
		$this->db->select("item_code_no")->limit(1)->order_by("item_code_no","desc");
		$data=$this->db->get("item_details")->result();
		// var_dump($data);
		if(count($data)!=0){
			return $data[0]->item_code_no;
		}
	}
	function getItemCatagories(){
		$this->db->order_by("catagory_id","asc");
		$data=$this->db->get("catagory_details")->result();
		return $data;
	}
	function getLatestUserId(){
		$this->db->select("user_id")->limit(1)->order_by("user_id","desc");
		$data=$this->db->get("user")->result();
		// var_dump($data);
		if(count($data)!=0){
			return $data[0]->user_id;
		}
	}

	function getLatestCustomerId(){
		$this->db->select("customer_id")->limit(1)->order_by("customer_id","desc");
		$data=$this->db->get("customer_details")->result();
		// var_dump($data);
		if(count($data)!=0){
			return $data[0]->customer_id;
		}
	}

	function getLatestWorkerId(){
		$this->db->select("worker_id")->limit(1)->order_by("worker_id","desc");
		$data=$this->db->get("worker_details")->result();
		// var_dump($data);
		if(count($data)!=0){
			return $data[0]->worker_id;
		}
	}

	function getLatestCompanyId(){
		$this->db->select("company_id")->limit(1)->order_by("company_id","desc");
		$data=$this->db->get("company_details")->result();
		// var_dump($data);
		if(count($data)!=0){
			return $data[0]->company_id;
		}
	}










	function saveInventoryCatagory($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "catagoryName":
					$data["catagory_name"]=$value[$i];
					break;
				case "stichingPrice":
					$data["stiching_charge"]=$value[$i];
					break;
			}
			$i++;
		}

		$this->db->insert('catagory_details',$data);
		return true;
	}


	function addWorker($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "workerName":
					$data["worker_name"]=$value[$i];
					break;
				
			}
			$i++;
		}

		$this->db->insert('worker_details',$data);
		return true;
	}


	function addUser($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "UsFName":
					$data["f_name"]=$value[$i];
					break;
				
				case "UsLName":
					$data["l_name"]=$value[$i];
					break;
				case "UsUName":
					$data["user_name"]=$value[$i];
					break;
				case "UsPass":
					$data["password"]=md5($value[$i]);
					break;
				// case "UsType":
				// 	$data["user_type_id"]=$value[$i];
				// 	break;

			}
			$i++;
		}

		$this->db->insert('user',$data);
		return true;
	}



	// this is adding customer section 
	function addCustomer($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "CusName":
					$data["customer_name"]=$value[$i];
					break;
				
				case "CusAddress":
					$data["address"]=$value[$i];
					break;
				case "CusPhone":
					$data["phone_no"]=$value[$i];
					break;
				

			}
			$i++;
		}

		$this->db->insert('customer_details',$data);
		return true;
	}


	// this is for adding item in the invertory
	function addItem($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "companyName":
					$data["company_id"]=$value[$i];
					break;
				
				case "category":
					$data["catagory_id"]=$value[$i];
					break;
				case "addedDate":
					$data["added_date"]=strtotime($value[$i]);
					break;
				case "sellingPrice":
					$data["selling_price"]=$value[$i];
					break;
				case "currentQuantity":
					$data["current_quantity"]=$value[$i];
					break;
				

			}
			$i++;
		}
		// var_dump($data);
		$this->db->insert('item_details',$data);
		return true;
	}

function addCompany($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "ComName":
					$data["company_name"]=$value[$i];
					break;				
			}
			$i++;
		}

		$this->db->insert('company_details',$data);
		return true;
	}

	function getCustomers(){
		$data=$this->db->get("customer_details")->result();
		// var_dump($data);
			return $data;
	}

	function getWorkers(){
		$data=$this->db->get("worker_details")->result();
		// var_dump($data);
			return $data;
	}
	function getUsers(){
		$data=$this->db->get("user")->result();
		// var_dump($data);
			return $data;
	}
	function getInventoryItem(){
		$data=$this->db->get("item_details")->result();
		// var_dump($data);
			return $data;
	}
	function getCompanies(){
		$data=$this->db->get("company_details")->result();
		// var_dump($data);
			return $data;
	}
}
?>