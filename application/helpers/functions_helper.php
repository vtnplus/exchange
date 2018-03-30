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

function router($data=""){
	return base_url($data);
}

function alert(){
	if(isset($_SESSION["msg"])){
		echo '<div class="alert alert-success" role="alert"><strong>Thông báo</strong><br>'.$_SESSION["msg"].'</div>';
	}

	if(isset($_SESSION["error"])){
		echo '<div class="alert alert-danger" role="alert"><strong>Thông báo</strong><br>'.$_SESSION["error"].'</div>';
	}
}