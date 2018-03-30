<?php
defined('BASE_ADMIN') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if(!is_login()){
			$this->go();
			exit(0);
		}

		if(!is_admin()){
			$this->go();
			exit(0);
		}
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

	public function is_admin(){
		if(!is_login()){
			return false;
		}else{
			$row = $this->db->query("select * from admin where account_id='".is_login()."' limit 1")->row();
			if(isset($row->admin_id)){
				return true;
			}
		}
		return false;
	}

	public function index()
	{
		$this->views->layout('index');
	}

	public function dashboard()
	{
		$this->views->layout('dashboard');
	}
}
