<?php
namespace Apps\Programs;
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Apiclient;
class Base extends \CI_Controller {

	private $_api_url = "http://localhost:4444/";
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


	public function need_login(){
		if(!is_login()){
			$this->go("login");
		}
	}

	public function api($path, $arv=[], $method="post"){

		/*
		Set Access Account ID
		*/

		if($this->account && isset($this->account["account_id"]) && intval($this->account["account_id"]) > 0){

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



		if(isset($data["success"]) == "ok" && isset($data["result"])){
			return $data["result"];
		}else if(isset($data["error"]) && $data["error"]){
			return ["error" => $data["error"]];
		}else{
			return [];
		}
	}



	public function sendmail($to, $subject, $msg){
		$data = $this->api("scripts/sendmail",["to" => $to, "subject" => $subject, "msg" => $msg]);
		if(isset($data["send"]) && $data["send"] == "ok"){
			$this->session->set_flashdata('msg', 'Email được gởi thành công');
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
