<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Profiles extends Base {
	
	public function __construct()
	{
		parent::__construct();
		$this->views->set_layout("layout/profiles");
		$this->need_login();
	}
	
	public function index()
	{
		return $this->views->layout('account/profiles');
	}

	public function changepass(){

	}

	/**
	F2A
	*/
	public function openf2a(){

	}

	/*
	Bank Account
	*/

	public function bankaccount(){

	}

	/*
	API
	*/

	public function myapi(){
		
	}
}