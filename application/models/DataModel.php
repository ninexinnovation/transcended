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
}
?>