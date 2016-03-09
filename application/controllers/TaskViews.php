<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskViews extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
	}
	public function menu()
	{
		$this->load->view('Menu/mainMenu');
	}
	public function submenu($title){
		$this->load->view('Menu/subMenu/'.$title);
	}
	public function loadTask($title){
		$data['title']=$title;
		$data['text']=$this->input->get("text");
		$this->load->view('taskView/taskViewStart',$data);
		$this->load->view('tasks/'.$title);
		$this->load->view('taskView/taskViewEnd');
		// echo $text;
		// echo $title;
	}
}
