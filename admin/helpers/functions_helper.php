<?php
function is_login(){
	return 1;
}

function is_admin(){
	return true;
}

function resource($data=""){
	return base_url("resource/".$data);
}

function admin_url($data=""){
	return base_url("admin/".$data);
}