<div class="row">
	<div class="col-sm-2">
		<div class="card">
			<div class="card-header">
				Select database
			</div>
			<div class="card-body">
				<select name="database" class="form-control">
					<optgroup label="Choise">
						<option value="">Not select</option>
					</optgroup>
					<optgroup label="Database">
					<?php foreach ($database as $key => $value) { ?>
						
					<option value="<?php echo trim($value);?>" <?php echo ($this->input->get("database") == trim($value) ? "selected" : "");?>><?php echo ucfirst($value);?></option>
					<?php } ?>
					</optgroup>
				</select>
			</div>
		</div>
	</div>
	<div class="col-sm-10">
		<div class="card">
		<div class="card-header">All Field in database <?php echo $this->input->get("database");?></div>
			<div class="card-body">
				<form action="<?php echo admin_url("tools/gendata/".$this->input->get("database"));?>" method="post">
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<select class="form-control" name="layout">
									<option value="2-10">2-10</option>
									<option value="3-9">3-9</option>
									<option value="4-8">4-8</option>
								</select>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card">
							<div class="card-body">
								<select class="form-control"></select>
							</div>
						</div>
					</div>

				</div>
				<br />
				<table class="table table-hover">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Type</th>
						<th>Requice</th>
						<th></th>
					</thead>
					<tbody>
						<?php foreach ($field as $key => $value) {

						?>
							
						<tr>
							<td><input type="checkbox" checked="true" name="<?php echo $value;?>[render]"></td>
							<td><?php echo $value;?></td>
							<td>
								<select class="form-control" name="<?php echo $value;?>[type_html]">
									<option value="">Automatic</option>
									<option value="text">Text</option>
									<option value="number">Number</option>
									<option value="textarea">Memo</option>
									<option value="select">Select</option>
									<option value="radio">Radio</option>
									<option value="checkbox">Checkbox</option>
								</select>
							</td>
							<td><input type="checkbox"  name="<?php echo $value;?>[requice]"></td>
							<td><input type="text" name="<?php echo $value;?>[injoin]" class="form-control"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary">Gen Code</button>
			</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("[name=database]").on("change", function(){
			window.location.href="?database="+this.value;
		});
	});
</script>