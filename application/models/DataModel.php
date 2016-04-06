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
	function getLatestInventoryCatagoryId(){
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
	function getLatestBillingId(){
		$this->db->select("bill_no")->limit(1)->order_by("bill_no","desc");
		$data=$this->db->get("bill_details")->result();
		// var_dump($data);
		if(count($data)!=0){
			return $data[0]->bill_no;
		}
	}

	// function getLatestInventoryCatagoryId(){
	// 	$this->db->select("catagory_id")->limit(1)->order_by("catagory_id","desc");
	// 	$data=$this->db->get("catagory_details")->result();
	// 	// var_dump($data);
	// 	if(count($data)!=0){
	// 		return $data[0]->catagory_id;
	// 	}
	// }





	function saveCatagory($id,$value){
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
	
	function addItemCatagory($id,$value){
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

	function updateCustomer($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "customer_name":
					$data["customer_name"]=$value[$i];
					break;
				
				case "address":
					$data["address"]=$value[$i];
					break;
				case "phone_no":
					$data["phone_no"]=$value[$i];
					break;
				

			}
			$i++;
		}
		$this->db->update('customer_details',$data,array('customer_id'=>$value[0]));
		return true;
	}
	function deleteCustomer($id,$value){
		$this->db->delete('customer_details',array('customer_id'=>$value[0]));
		return true;
	}


	function updateItem($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "company_id":
					$data["company_id"]=$value[$i];
					break;
				
				case "catagory_id":
					$data["catagory_id"]=$value[$i];
					break;
				case "f_date":
					$data["added_date"]=strtotime($value[$i]);
					break;
				case "selling_price":
					$data["selling_price"]=$value[$i];
					break;
				case "current_quantity":
					$data["current_quantity"]=$value[$i];
					break;
				

			}
			$i++;
		}
		$this->db->update('item_details',$data,array('item_code_no'=>$value[0]));
		return true;
	}
	function deleteItem($id,$value){
		$this->db->delete('item_details',array('item_code_no'=>$value[0]));
		return true;
	}

function updateCatagory($id,$value){
		$i=0;
		$data=array();
		foreach ($id as $key) {
			switch($key){
				case "catagory_name":
					$data["catagory_name"]=$value[$i];
					break;
				case "stiching_charge":
					$data["stiching_charge"]=$value[$i];
					break;
				

			}
			$i++;
		}
		$this->db->update('catagory_details',$data,array('catagory_id'=>$value[0]));
		return true;
	}
	function deleteCatagory($id,$value){
		$this->db->delete('catagory_details',array('catagory_id'=>$value[0]));
		return true;
	}

function updateWorker($id,$value){
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
		$this->db->update('worker_details',$data,array('Worker_id'=>$value[0]));
		return true;
	}
	function deleteWorker($id,$value){
		$this->db->delete('worker_details',array('Worker_id'=>$value[0]));
		return true;
	}


	function getItemCatagories(){
		// $this->db->order_by("catagory_id","asc");
		$data=$this->db->get("catagory_details")->result();
		return $data;
	}
	function getItems(){
		// $this->db->order_by("item_code_no","asc");
		$data=$this->db->get("item_details")->result();
		// var_dump($data);
		return $data;
	}
	function getCustomers(){
		$data=$this->db->get("customer_details")->result();
		// var_dump($data);
			return $data;
	}
	function getCustomerById($id){
		$data=$this->db->get_where("customer_details",array("customer_id"=>$id))->result();
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
		// $data=$this->db->get("item_details")->result();
		// // var_dump($data);


		$this->db->select('*');
		$this->db->from('item_details');
		$this->db->join('company_details', 'company_details.company_id = item_details.company_id');
		$this->db->join('catagory_details', 'catagory_details.catagory_id = item_details.catagory_id');
		$data = $this->db->get()->result();

			return $data;
	}

	function getItemById($id){
		$data=$this->db->get_where("item_details",array("item_code_no"=>$id))->result_array();
		$data[0]["f_date"]=date("Y-m-d",$data[0]['added_date']);
		// var_dump($data);
			return $data;
	}
	function getCatagoryById($id){
		$data=$this->db->get_where("catagory_details",array("catagory_id"=>$id))->result();
		// var_dump($data);
			return $data;
	}
	function getWorkerById($id){
		$data=$this->db->get_where("worker_details",array("worker_id"=>$id))->result();
		// var_dump($data);
			return $data;
	}




	function getInventoryItemCatagoryId(){
		$data=$this->db->get("catagory_details")->result();
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