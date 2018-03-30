<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Apps\Programs\Base;
class Account extends Base {

	
	public function index()
	{
		return $this->views->layout('home');
	}

	public function login(){

	}

	public function register(){

	}

	public function forget(){

	}

	public function logout(){
		
	}
}
