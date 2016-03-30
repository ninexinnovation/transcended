<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskViews extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("DataModel");
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
	public function getPrevTask(){
		echo json_encode(["name"=>$this->session->prevTask,"title"=>$this->session->prevTaskTitle]);
	}
	public function addTask($name){
		$taskArray=$this->session->prevTask;
		$taskTitleArray=$this->session->prevTaskTitle;
		$taskArray[]=$name;
		$taskTitleArray[]=$this->input->get("title");
		$this->session->set_userdata("prevTask",$taskArray);
		$this->session->set_userdata("prevTaskTitle",$taskTitleArray);
	}
	public function removeTask($name){
		if($this->session->prevTask!=null){
			$prevTaskArray=$this->session->prevTask;
			$prevTaskTitleArray=$this->session->prevTaskTitle;
			$key=array_search($name,$prevTaskArray);
			unset($prevTaskArray[$key]);
			unset($prevTaskTitleArray[$key]);
			$this->session->set_userdata("prevTask",$prevTaskArray);
			$this->session->set_userdata("prevTaskTitle",$prevTaskTitleArray);
		}
	}
}
