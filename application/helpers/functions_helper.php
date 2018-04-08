<?php
function is_login(){
	return (isset($_SESSION["is_login"]) && intval($_SESSION["is_login"]) > 0 ? $_SESSION["is_login"] : false);
}

function is_admin(){
	return 1;
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
		echo '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Thông báo!</h4>'.$_SESSION["msg"].'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
	}

	if(isset($_SESSION["error"])){
		echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Thông báo!</h4>'.$_SESSION["error"].'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
	}
}


