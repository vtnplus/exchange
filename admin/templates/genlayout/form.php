<div class="card">
	<div class="card-body">
	<h3>Controller Contents <div class="pull-right"><button class="btn btn-primary">Submit</button></div></h3>
	<hr>
	<form action="<?php echo admin_url("{{ACTION}}/$id");?>" method="post" accept="UTF-8">
	{{DATA}}
	<button type="submit" name="submit" value="1" class="btn btn-info">Submit</button>
	</form>
	</div>
</div>