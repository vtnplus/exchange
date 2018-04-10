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
		
		$this->load->library('recaptcha');

		if($this->input->post("login") == 1){

			if($this->config->item("open_recaptcha") && !$this->validate_captcha()){
				$this->session->set_flashdata('error', $this->views->lang("error_captcha",true));
				return redirect('/login', 'refresh');
			}

			return $this->validate_login();
		}


		return $this->views->layout('account/login');
	}

	public function register(){

		$this->load->library('recaptcha');

		if($this->input->post("register") == 1){
			
			if($this->config->item("open_recaptcha") && !$this->validate_captcha()){
				$this->session->set_flashdata('error', $this->views->lang("error_captcha",true));
				return redirect('/register', 'refresh');
			}


			return $this->validate_register();
		}
		

		return $this->views->layout('account/register');
	
	}



	private function validate_captcha(){
		$this->load->library('recaptcha');


		$captcha_answer = $this->input->post('g-recaptcha-response');

		// Verify user's answer
		$response = $this->recaptcha->verifyResponse($captcha_answer);
		// Processing ...
		if ($response['success']) {
		    return true;
		} else {
		    return false;
		}
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
			
			
		}else if(isset($data["is_validate"]) && intval($data["is_validate"]) > 0){
			
			if($data["security"] == "email"){
				$this->sendmail($this->input->post("email"),"Login Security", "You code login :".$code);
			}


			$this->session->set_userdata(["is_validate" => $data["is_validate"],"token" => $data["token"]]);
			$this->session->set_flashdata('msg', 'Đăng nhập thành công hiện tại bạn có thể sử dụng chức năng này');
			redirect('/validate', 'refresh');

		}else{
			$this->session->set_flashdata('error', 'Tên đăng nhập khặc mật khẩu của bạn không đúng');
			redirect('/login', 'refresh');
		}
		
	}

	public function forget(){

		$this->load->library('recaptcha');
		
		if($this->input->post("forget") == 1){

			if($this->config->item("open_recaptcha") && !$this->validate_captcha()){
				$this->session->set_flashdata('error', $this->views->lang("error_captcha",true));
				return redirect('/forget', 'refresh');
			}

			return $this->validate_login();
		}

		return $this->views->layout('account/forget',["title" => $this->views->lang("forget_title",true)]);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}



	/*
	Validate Code Login
	*/

	public function validate(){
		$this->load->library('recaptcha');
		if($this->input->post("validate") == 1){
			$data = $this->api("account/validate",[
				"code" 			=> $this->input->post("code"),
				"account_id"	=>	$_SESSION["is_validate"]
			]);
			if(isset($data["is_login"]) && intval($data["is_login"]) > 0){
				$this->session->set_userdata(["is_login" => $data["is_login"],"is_validate" => false,"token" => $data["token"]]);
				$this->session->set_flashdata('msg', 'Đăng nhập thành công hiện tại bạn có thể sử dụng chức năng này');
				redirect('/validate', 'refresh');
			}
		}

		return $this->views->layout('account/validate',["title" => $this->views->lang("forget_title",true)]);

	}

	public function google(){

	}

	public function facebook(){

	}
}
