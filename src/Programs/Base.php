<?php
namespace Apps\Programs;
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Apiclient;
class Base extends \CI_Controller {

	private $_api_url = "http://localhost.api:4444/";
	private $api = null;
	public function setAPI($url){
		$this->_api_url = $url;
	}

	public function api($path, $arv=[], $method="post"){
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
