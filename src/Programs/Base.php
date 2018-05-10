<?php
namespace Apps\Programs;
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Apiclient;
class Base extends \CI_Controller {

	private $_api_url = "";
	private $api = null;
	private $account = [];

	public function __construct()
	{
		parent::__construct();
		$config = $this->api("scripts/settings",[],"get");
		foreach ($config as $key => $value) {
			$this->config->set_item($key, $value);
		}
		if($this->config->item("api_server")){
			$this->_api_url = $this->config->item("api_server");
		}
	}


	public function setAPI($url){
		$this->_api_url = $url;
	}


	public function api_login(){
		if(is_login()){
			$this->account =["account_id" => is_login()];
		}else{
			$this->need_login();
			$this->account =["account_id" => "notlogin"];
		}
	}

	public function set_login(){
		$this->api_login();
		return $this;
	}

	public function need_login(){
		if(!is_login()){
			$this->go("login");
		}
	}

	
	public function api($path, $arv=[], $method="post", $login=false){

		/*
		Set Access Account ID
		*/
		if($login){
			$this->api_login();
		}

		if(isset($this->account["account_id"]) && intval($this->account["account_id"]) > 0){

			$arv = array_merge($arv, $this->account);

		}else if(isset($this->account["account_id"]) && $this->account["account_id"] == "notlogin"){

			return ["error" => "Not Login"];
			exit();

		}

		/*
		Call API
		*/

		$this->api = new Apiclient;

		if($method == "post"){
			$data = $this->api->post($this->_api_url."/".$path, $arv);
		}else{
			$data = $this->api->get($this->_api_url."/".$path, $arv);
		}

		
		//print_r($data);

		if(isset($data["success"]) == "ok" && isset($data["result"])){
			return $data["result"];
		}else if(isset($data["error"]) && $data["error"]){
			return ["error" => $data["error"]];
		}else{
			return [];
		}
	}



	public function sendmail($to, $subject, $msg){
		if($this->config->item("api_email")){
			$data = $this->api("scripts/sendmail",["to" => $to, "subject" => $subject, "msg" => $msg]);
			if(isset($data["send"]) && $data["send"] == "ok"){
				$this->session->set_flashdata('msg', 'Email được gởi thành công');
			}
		}else{
			$this->load->library('email'); // Note: no $config param needed
			$this->email->from('thietkewebvip@gmail.com', 'thietkewebvip@gmail.com');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($msg);
			$this->email->send();
		}
		
	}



	public function index()
	{
		$this->load->view('notsupport');
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
