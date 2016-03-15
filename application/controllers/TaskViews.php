<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskViews extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function menu()
	{
		if($this->input->is_ajax_request()){
			$this->load->view('Menu/mainMenu');
		}
	}
	public function submenu($title){
		if($this->input->is_ajax_request()){
			$this->load->view('Menu/subMenu/'.$title);
		}
	}
	public function loadTask($title){
		if($this->input->is_ajax_request()){
			$data['title']=$title;
			$data['text']=$this->input->get("text");
			$this->load->view('taskView/taskViewStart',$data);
			$this->load->view('tasks/'.$title);
			$this->load->view('taskView/taskViewEnd');
			// echo $text;
			// echo $title;
		}
	}
}
