<?php
namespace Apps\Programs;
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Base extends \CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function go($url=false, $msg=[]){
		foreach ($msg as $key => $value) {
			$this->session->set_flashdata($key, $value);
		}
		if(!$url){
			$url = "?ref=";
		}
		redirect($url, 'refresh');
	}
}
