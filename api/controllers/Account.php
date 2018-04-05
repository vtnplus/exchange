<?php
use Apps\Programs\Api;
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Api {

	
	public function index()
	{
		return $this->views->layout('home');
	}

	public function login_post(){
		
		$this->load->library('encryption');
		$this->encryption->initialize(array('driver' => 'mcrypt'));
		$email = $this->input->post("username");
		$password = $this->input->post("password");

		if(!$email || !$password) return $this->response(["error" => "Username + password empty"]);

		$user = $this->db->query("select * from account where account_email='".$email."' limit 1")->row();
		if($user){
			
			$validate = $this->encryption->decrypt($user->account_password);

			$makePassword = $password.$user->account_security;
			$key = bin2hex($this->encryption->create_key(16));// Gen key next login

			$next_password = $this->encryption->encrypt($this->input->post("password").$key); // Gen password next login

			if($makePassword == $validate){
				$this->db->query("update account set account_password='".$next_password."', account_security='".$key."' where account_id='".$user->account_id."'");
				
				//print_r($this->session->userdata());
				return $this->response(["is_login" => $user->account_id, "msg" => "ok","token" => $key]);
			}else{
				return $this->response(["is_login" => 0, "error" => "password"]);
			}
			

		}

		return $this->response(["is_login" => false, "error" => "notlogin"]);
	}

	public function register_post(){
		$this->load->library('encryption');
		$this->encryption->initialize(array('driver' => 'mcrypt'));
		$email = $this->input->post("username");
		$password = $this->input->post("password");
		if(!$email || !$password) return $this->response(["error" => "Username + password empty"]);
		$user = $this->db->query("select * from account where account_email='".$email."' limit 1")->row();
		if(!$user){
			
			
			$key = bin2hex($this->encryption->create_key(16));// Gen key next login

			$next_password = $this->encryption->encrypt($password.$key); // Gen password next login

			$this->db->query("insert into account (account_email, account_password, account_security) VALUES ('".$email."', '".$next_password."', '".$key."');");
			
			
			return $this->response(["msg" => "ok"]);

		}else{
			return $this->response(["error" => "emailready"]);
		}
		return $this->response(["error" => "notcreated"]);
	}

	public function forget(){

	}

	
}
