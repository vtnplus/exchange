<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Account extends Base {
	
	public function __construct()
	{
		parent::__construct();
		$this->views->set_layout("layout/account");

	}
	
	public function index()
	{
		return $this->views->layout('account/login');
	}

	public function login(){
		
		if($this->input->post("login") == 1){
			return $this->validate_login();
		}


		return $this->views->layout('account/login');
	}

	public function register(){
		if($this->input->post("register") == 1){
			return $this->validate_register();
		}

		return $this->views->layout('account/register');
	
	}

	private function validate_register(){
		
		$data = $this->api("account/register",[
			"username" => $this->input->post("email"), 
			"password" => $this->input->post("password")
		]);

		

		if(isset($data["error"])){
			$this->session->set_flashdata('error', $this->views->lang($data["error"],true));
			return redirect('/register', 'refresh');
		}else{
			$this->session->set_flashdata('msg', 'Bạn đăng ký thành công. Bạn có thể đăng nhập vào hệ thống');
			return redirect('/login', 'refresh');
		}
	}



	public function validate_login(){
		
		$data = $this->api("account/login",[
			"username" => $this->input->post("email"), 
			"password" => $this->input->post("password")
		]);

		

		if(isset($data["is_login"]) && intval($data["is_login"]) > 0){

			$this->session->set_userdata(["is_login" => $data["is_login"],"token" => $data["token"]]);
			$this->session->set_flashdata('msg', 'Đăng nhập thành công hiện tại bạn có thể sử dụng chức năng này');
			redirect('/', 'refresh');
			
		}else{
			$this->session->set_flashdata('error', 'Tên đăng nhập khặc mật khẩu của bạn không đúng');
			redirect('/login', 'refresh');
		}
		
	}

	public function forget(){
		return $this->views->layout('account/forget',["title" => $this->views->lang("forget_title",true)]);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}


	public function google(){

	}

	public function facebook(){

	}
}
