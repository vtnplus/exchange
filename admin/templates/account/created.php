<div class="card">
	<div class="card-body">
	<h3>Controller Contents <div class="pull-right"><button class="btn btn-primary">Submit</button></div></h3>
	<hr>
	<form action="<?php echo admin_url("account/created//$id");?>" method="post" accept="UTF-8">
	<div class="form-group row">
    <label for="input_account_id" class="col-sm-2 col-form-label">account_id</label>
    <div class="col-sm-10">
      <input type="number" name="account_id" class="form-control" id="input_account_id" value="<?php echo $data->account_id;?>">
    </div>
  </div><div class="form-group row">
    <label for="input_account_email" class="col-sm-2 col-form-label">account_email</label>
    <div class="col-sm-10">
      <input type="text" name="account_email" class="form-control" id="input_account_email" value="<?php echo $data->account_email;?>" max-length="255">
    </div>
  </div><div class="form-group row">
    <label for="input_account_password" class="col-sm-2 col-form-label">account_password</label>
    <div class="col-sm-10">
      <input type="text" name="account_password" class="form-control" id="input_account_password" value="<?php echo $data->account_password;?>" max-length="255">
    </div>
  </div><div class="form-group row">
    <label for="input_account_status" class="col-sm-2 col-form-label">account_status</label>
    <div class="col-sm-10">
      <div class="form-check form-check-inline"><input type="radio" name="account_status" class="form-check-input" id="inlineaccount_status0" value="0" <?php echo ($data->account_status == 0 ? "selected" : "");?>> <label class="form-check-label" for="inlineaccount_status0">Off</label>
</div><div class="form-check form-check-inline"><input type="radio" name="account_status" class="form-check-input" id="inlineaccount_status1" value="1" <?php echo ($data->account_status == 1 ? "selected" : "");?>> <label class="form-check-label" for="inlineaccount_status1">On</label>
</div>
    </div>
  </div><div class="form-group row">
    <label for="input_account_login" class="col-sm-2 col-form-label">account_login</label>
    <div class="col-sm-10">
      
    </div>
  </div><div class="form-group row">
    <label for="input_account_attach" class="col-sm-2 col-form-label">account_attach</label>
    <div class="col-sm-10">
      <input type="number" name="account_attach" class="form-control" id="input_account_attach" value="<?php echo $data->account_attach;?>">
    </div>
  </div><div class="form-group row">
    <label for="input_account_lock" class="col-sm-2 col-form-label">account_lock</label>
    <div class="col-sm-10">
      <div class="form-check form-check-inline"><input type="radio" name="account_lock" class="form-check-input" id="inlineaccount_lock0" value="0" <?php echo ($data->account_lock == 0 ? "selected" : "");?>> <label class="form-check-label" for="inlineaccount_lock0">Off</label>
</div><div class="form-check form-check-inline"><input type="radio" name="account_lock" class="form-check-input" id="inlineaccount_lock1" value="1" <?php echo ($data->account_lock == 1 ? "selected" : "");?>> <label class="form-check-label" for="inlineaccount_lock1">On</label>
</div>
    </div>
  </div><div class="form-group row">
    <label for="input_account_lock" class="col-sm-2 col-form-label">&nbsp;</label>
    <div class="col-sm-10">
      <button type="submit" name="submit" value="1">Submit</button>
    </div>
  </div>
	<button type="submit" name="submit" value="1" class="btn btn-info">Submit</button>
	</form>
	</div>
</div>