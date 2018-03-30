<div class="card">
	<div class="card-body">
	<form action="<?php echo admin_url("{{ACTION}}");?>" method="post" accept="UTF-8">
	<div class="form-group row">
    <label for="input_account_email" class="col-sm-2 col-form-label">account_email</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="input_account_email" placeholder="account_email">
    </div>
  </div><div class="form-group row">
    <label for="input_account_password" class="col-sm-2 col-form-label">account_password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="input_account_password" placeholder="account_password">
    </div>
  </div><div class="form-group row">
    <label for="input_account_status" class="col-sm-2 col-form-label">account_status</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="input_account_status" placeholder="account_status">
    </div>
  </div>
  <hr>
	<button type="submit" class="btn btn-info">Submit</button>
	</form>
	</div>
</div>