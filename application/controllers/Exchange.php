<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Exchange extends Base {
	private $_api_url = "http://localhost/api";
	public function __construct()
	{
		parent::__construct();
		$this->views->set_layout("layout/exchange");

	}

	public function index(){
		return $this->views->layout("exchange/dashboard");
	}
}