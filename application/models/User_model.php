<?php
class User_model extends CI_Model{
	public function __construct(){
		// $this->load->database();
	}
	public function check(){
		// $this->load->helper('url');

		$query=$this->db->get_where('user',
				array(
					'user_name'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password'))
				)
			);
		return $query;
	}
	public function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('prevTask');
		$this->session->unset_userdata('prevTaskTitle');
	}
	public function register(){
		
	}

}
?>