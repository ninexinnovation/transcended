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
				case "catagoryName":
					$data["catagory_name"]=$value[$i];
					break;
				case "stichingPrice":
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

	function addNewBill(){
		$clothId=$this->input->post("clothId");
		$clothLength=$this->input->post("clothLength");
		$catagoryId=$this->input->post("catagoryId");
		$quantity=$this->input->post("quantity");

		$customerId=$this->input->post("customerId");
		$date=strtotime($this->input->post("date"));
		$paid=$this->input->post("paid");
		$deliveryDate=strtotime($this->input->post("deliveryDate"));
		$remarks=$this->input->post("remarks");
		$referrerId=$this->input->post("referrer_id");
		$discount=$this->input->post("discount");

		$upperMeasurementName=$this->input->post("measurementUpName");
		$upperMeasurementValue=$this->input->post("measurementUpValue");

		$lowerMeasurementName=$this->input->post("measurementLowName");
		$lowerMeasurementValue=$this->input->post("measurementLowValue");


		$data=array();
		$data["customer_id"]=$customerId;
		$data["delivery_date"]=$deliveryDate;
		$data["current_date"]=$date;
		$data["reffer_id"]=$referrerId;
		$data["discount"]=$discount;
		$data["advance"]=$paid;
		$data["user_id"]=$this->session->userdata("user_id");

		if($this->db->insert('bill_details',$data)){
			$billNo=$this->db->insert_id();
			$itemData=array();
			for($i=0;$i<count($clothId);$i++){
				$itemData[]=array(
						'item_code_no'=>$clothId[$i],
						'item_catagory_id'=>$catagoryId[$i],
						'length'=>$clothLength[$i],
						'quantity'=>$quantity[$i],
						'bill_no'=>$billNo
					);
			}
			if($this->db->insert_batch("bill_item_details",$itemData)){
				foreach ($itemData as $itemDetails) {
					// insert data in item_deduction table
					$deductData=array(
						'item_code_no'=>$itemDetails['item_code_no'],
						'deducted_quantity'=>$itemDetails['length']*$itemDetails['quantity'],
						'deducted_date'=>time(),
						'bill_no'=>$billNo
					);
					$this->db->insert("item_deduction",$deductData);
					//update item details table
					$this->db->where('item_code_no',$itemDetails['item_code_no']);
					$this->db->set('current_quantity','current_quantity-'.$deductData['deducted_quantity'],FALSE);
					$this->db->update('item_details');
				}
				$i=0;
				$upperdata=array();
				if($upperMeasurementName!=null){
					foreach ($upperMeasurementName as $key) {
						switch($key){
							case "ulength":
								$upperdata["length"]=$upperMeasurementValue[$i];
								break;
							case "uChest":
								$upperdata["chest"]=$upperMeasurementValue[$i];
								break;
							case "uWaist":
								$upperdata["waist"]=$upperMeasurementValue[$i];
								break;
							case "uHip":
								$upperdata["hip"]=$upperMeasurementValue[$i];
								break;
							case "ushoulder":
								$upperdata["shoulder"]=$upperMeasurementValue[$i];
								break;
							case "uSleeve":
								$upperdata["sleeve"]=$upperMeasurementValue[$i];
								break;
							case "uHBack":
								$upperdata["hback"]=$upperMeasurementValue[$i];
								break;
							case "uNeck":
								$upperdata["neck"]=$upperMeasurementValue[$i];
								break;
							case "ukf":
								$upperdata["kf"]=$upperMeasurementValue[$i];
								break;
							case "uSO":
								$upperdata["so"]=$upperMeasurementValue[$i];
								break;
						}
						$i++;
					}
					$this->db->insert("measurement_details",$upperdata);
					$measurement_details_id=$this->db->insert_id();
					$this->db->insert("measurement",array(
							'bill_no'=>$billNo,
							'measurement_type_id'=>1,
							'measurement_detail_id'=>$measurement_details_id));
				}



				$i=0;
				$lowerdata=array();
				if($lowerMeasurementName!=null){
					foreach ($lowerMeasurementName as $key) {
						switch($key){
							case "llength":
								$lowerdata["length"]=$lowerMeasurementValue[$i];
								break;
							case "lWaist":
								$lowerdata["waist"]=$lowerMeasurementValue[$i];
								break;
							case "lthai":
								$lowerdata["thai"]=$lowerMeasurementValue[$i];
								break;
							case "lhip":
								$lowerdata["hip"]=$lowerMeasurementValue[$i];
								break;
							case "lknee":
								$lowerdata["knee"]=$lowerMeasurementValue[$i];
								break;
							case "lbottom":
								$lowerdata["bottom"]=$lowerMeasurementValue[$i];
								break;
							case "lsheet":
								$lowerdata["sheet"]=$lowerMeasurementValue[$i];
								break;
							case "linSeam":
								$lowerdata["inseam"]=$lowerMeasurementValue[$i];
								break;
						}
						$i++;
					}
					$this->db->insert("measurement_details",$lowerdata);
					$measurement_details_id=$this->db->insert_id();
					$this->db->insert("measurement",array(
							'bill_no'=>$billNo,
							'measurement_type_id'=>2,
							'measurement_detail_id'=>$measurement_details_id));
				}
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
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

	function getCustomizedReport(){
		$this->db->select("*");
		$this->db->from("bill_details AS b");
		$this->db->join("bill_item_details AS bItem",'b.bill_no=bItem.bill_no','INNER');
		$this->db->join("catagory_details AS cat",'cat.catagory_id=bItem.item_catagory_id','INNER');
		$this->db->join("customer_details AS cust",'cust.customer_id=b.customer_id','INNER');
		$data=$this->db->get()->result();
		// var_dump($data);
		$returnData=array();
		foreach ($data as $custom) {
			$result=array();
			$result['sn']=0;
			$result['delivery_date']=date('Y-m-d',$custom->delivery_date);
			$result['bill_no']=$custom->bill_no;
			$result['product_name']=$custom->catagory_name;
			$result['customer_name']=$custom->customer_name;
			$result['phone_no']=$custom->phone_no;
			$returnData[]=$result;
		}
		return $returnData;
	}
	function getSalesReport($i){
		$this->db->select("*");
		$this->db->from("bill_details AS b");
		$this->db->join("bill_item_details AS bItem",'b.bill_no=bItem.bill_no','INNER');
		$this->db->join("catagory_details AS cat",'cat.catagory_id=bItem.item_catagory_id','INNER');
		$this->db->join("customer_details AS cust",'cust.customer_id=b.customer_id','INNER');
		$data=$this->db->get()->result();
		// var_dump($data);
		$returnData=array();
		foreach ($data as $custom) {
			$result=array();
			$result['sn']=0;
			$result['delivery_date']=date('Y-m-d',$custom->delivery_date);
			$result['bill_no']=$custom->bill_no;
			$result['product_name']=$custom->catagory_name;
			$result['customer_name']=$custom->customer_name;
			$result['phone_no']=$custom->phone_no;
			$returnData[]=$result;
		}
		return $returnData;
	}
	function getAllViewBill(){
		$this->db->select("*");
		$this->db->from("bill_details AS b");
		$this->db->join("customer_details AS cust",'cust.customer_id=b.customer_id','INNER');
		$data=$this->db->get()->result();
		// var_dump($data);
		$returnData=array();
		foreach ($data as $custom) {
			$result=array();
			$result['sn']=0;
			$result['order_date']=date('Y-m-d',$custom->current_date);
			$result['bill_no']=$custom->bill_no;
			$result['customer_name']=$custom->customer_name;
			$result['phone_no']=$custom->phone_no;
			$result['action']=0;
			$returnData[]=$result;
		}
		return $returnData;
	}

	function getNoOfCoatsPerMonth(){
		$data=$this->db->get("item_details");
		$result=[];
		$result['jan']=0;
		$result['feb']=0;
		$result['mar']=0;
		$result['apr']=0;
		$result['may']=0;
		$result['jun']=0;
		$result['jul']=0;
		$result['aug']=0;
		$result['sep']=0;
		$result['oct']=0;
		$result['nov']=0;
		$result['dec']=0;

		if($data->num_rows()!=0){
			foreach ($data->result() as $item) {
				if($item->catagory_id==3){
					switch(date('Y/m',$item->added_date)){
						case date('Y').'/01':
							$result['jan']=$result['jan']+1;
						break;
						case date('Y').'/02':
							$result['feb']=$result['feb']+1;
						break;
						case date('Y').'/03':
							$result['mar']=$result['mar']+1;
						break;
						case date('Y').'/04':
							$result['apr']=$result['apr']+1;
						break;
						case date('Y').'/05':
							$result['may']=$result['may']+1;
						break;
						case date('Y').'/06':
							$result['jun']=$result['jun']+1;
						break;
						case date('Y').'/07':
							$result['jul']=$result['jul']+1;
						break;
						case date('Y').'/08':
							$result['aug']=$result['aug']+1;
						break;
						case date('Y').'/09':
							$result['sep']=$result['sep']+1;
						break;
						case date('Y').'/10':
							$result['oct']=$result['oct']+1;
						break;
						case date('Y').'/11':
							$result['nov']=$result['nov']+1;
						break;
						case date('Y').'/12':
							$result['dec']=$result['dec']+1;
						break;
					}
				}
			}
			// var_dump($result);
			return $result;
		}else{
			return false;
		}
	}
	function getNoOfShirtsPerMonth(){
		$data=$this->db->get("item_details");
		$result=[];
		$result['jan']=0;
		$result['feb']=0;
		$result['mar']=0;
		$result['apr']=0;
		$result['may']=0;
		$result['jun']=0;
		$result['jul']=0;
		$result['aug']=0;
		$result['sep']=0;
		$result['oct']=0;
		$result['nov']=0;
		$result['dec']=0;

		if($data->num_rows()!=0){
			foreach ($data->result() as $item) {
				if($item->catagory_id==2){
					switch(date('Y/m',$item->added_date)){
						case date('Y').'/01':
							$result['jan']=$result['jan']+1;
						break;
						case date('Y').'/02':
							$result['feb']=$result['feb']+1;
						break;
						case date('Y').'/03':
							$result['mar']=$result['mar']+1;
						break;
						case date('Y').'/04':
							$result['apr']=$result['apr']+1;
						break;
						case date('Y').'/05':
							$result['may']=$result['may']+1;
						break;
						case date('Y').'/06':
							$result['jun']=$result['jun']+1;
						break;
						case date('Y').'/07':
							$result['jul']=$result['jul']+1;
						break;
						case date('Y').'/08':
							$result['aug']=$result['aug']+1;
						break;
						case date('Y').'/09':
							$result['sep']=$result['sep']+1;
						break;
						case date('Y').'/10':
							$result['oct']=$result['oct']+1;
						break;
						case date('Y').'/11':
							$result['nov']=$result['nov']+1;
						break;
						case date('Y').'/12':
							$result['dec']=$result['dec']+1;
						break;
					}
				}
			}
			// var_dump($result);
			return $result;
		}else{
			return false;
		}
	}
	function getNoOfPantsPerMonth(){
		$data=$this->db->get("item_details");
		$result=[];
		$result['jan']=0;
		$result['feb']=0;
		$result['mar']=0;
		$result['apr']=0;
		$result['may']=0;
		$result['jun']=0;
		$result['jul']=0;
		$result['aug']=0;
		$result['sep']=0;
		$result['oct']=0;
		$result['nov']=0;
		$result['dec']=0;

		if($data->num_rows()!=0){
			foreach ($data->result() as $item) {
				if($item->catagory_id==1){
					switch(date('Y/m',$item->added_date)){
						case date('Y').'/01':
							$result['jan']=$result['jan']+1;
						break;
						case date('Y').'/02':
							$result['feb']=$result['feb']+1;
						break;
						case date('Y').'/03':
							$result['mar']=$result['mar']+1;
						break;
						case date('Y').'/04':
							$result['apr']=$result['apr']+1;
						break;
						case date('Y').'/05':
							$result['may']=$result['may']+1;
						break;
						case date('Y').'/06':
							$result['jun']=$result['jun']+1;
						break;
						case date('Y').'/07':
							$result['jul']=$result['jul']+1;
						break;
						case date('Y').'/08':
							$result['aug']=$result['aug']+1;
						break;
						case date('Y').'/09':
							$result['sep']=$result['sep']+1;
						break;
						case date('Y').'/10':
							$result['oct']=$result['oct']+1;
						break;
						case date('Y').'/11':
							$result['nov']=$result['nov']+1;
						break;
						case date('Y').'/12':
							$result['dec']=$result['dec']+1;
						break;
					}
				}
			}
			// var_dump($result);
			return $result;
		}else{
			return false;
		}
	}
	function getNoOfOthersPerMonth(){
		$data=$this->db->get("item_details");
		$result=[];
		$result['jan']=0;
		$result['feb']=0;
		$result['mar']=0;
		$result['apr']=0;
		$result['may']=0;
		$result['jun']=0;
		$result['jul']=0;
		$result['aug']=0;
		$result['sep']=0;
		$result['oct']=0;
		$result['nov']=0;
		$result['dec']=0;

		if($data->num_rows()!=0){
			foreach ($data->result() as $item) {
				if($item->catagory_id!=1 && $item->catagory_id!=2 && $item->catagory_id!=3){
					switch(date('Y/m',$item->added_date)){
						case date('Y').'/01':
							$result['jan']=$result['jan']+1;
						break;
						case date('Y').'/02':
							$result['feb']=$result['feb']+1;
						break;
						case date('Y').'/03':
							$result['mar']=$result['mar']+1;
						break;
						case date('Y').'/04':
							$result['apr']=$result['apr']+1;
						break;
						case date('Y').'/05':
							$result['may']=$result['may']+1;
						break;
						case date('Y').'/06':
							$result['jun']=$result['jun']+1;
						break;
						case date('Y').'/07':
							$result['jul']=$result['jul']+1;
						break;
						case date('Y').'/08':
							$result['aug']=$result['aug']+1;
						break;
						case date('Y').'/09':
							$result['sep']=$result['sep']+1;
						break;
						case date('Y').'/10':
							$result['oct']=$result['oct']+1;
						break;
						case date('Y').'/11':
							$result['nov']=$result['nov']+1;
						break;
						case date('Y').'/12':
							$result['dec']=$result['dec']+1;
						break;
					}
				}
			}
			// var_dump($result);
			return $result;
		}else{
			return false;
		}
	}
}
?>