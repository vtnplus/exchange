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
		return $this->views->layout('home');
	}

	public function login(){
		return $this->views->layout('account/login');
	}

	public function register(){
		return $this->views->layout('account/register');
	
	}

	public function forget(){
		return $this->views->layout('account/forget');
	}

	public function logout(){

	}
}
