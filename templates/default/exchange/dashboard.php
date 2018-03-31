<div class="row sbox">
	<div class="col-md-8">
		<div class="chart">
			<div class="card">
				<div class="card-body fix400"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="network-prices">
			<div class="card">
				<div class="card-body fix400"></div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-body fix400">
				<div class="row">
					<div class="col-md-6">
						<div class="buybox">
							<h4>Buy</h4>
							<form>
								<div class="form-group">
		                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("amout");?></label>
		                            <div class="mx-auto">
		                                <input type="number" name="amout" class="form-control" id="input2EmailForm" placeholder="email" required="true">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("prices");?></label>
		                            <div class="mx-auto">
		                                <input type="number" name="amout" class="form-control" id="input2EmailForm" placeholder="email" required="true">
		                            </div>
		                        </div>

		                        <hr>
		                        Total : <br>
		                        Fee : 
		                        <hr>
		                        <button class="btn btn-primary btn-block">Buy</button>

							</form>
						</div>
					</div>

					<div class="col-md-6">
						<div class="buybox">
							<h4>Sell</h4>
							<form>
								<div class="form-group">
		                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("amout");?></label>
		                            <div class="mx-auto">
		                                <input type="number" name="amout" class="form-control" id="input2EmailForm" placeholder="email" required="true">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("prices");?></label>
		                            <div class="mx-auto">
		                                <input type="number" name="amout" class="form-control" id="input2EmailForm" placeholder="email" required="true">
		                            </div>
		                        </div>

		                        <hr>
		                        Total : <br>
		                        Fee : 
		                        <hr>
		                        <button class="btn btn-info btn-block">Sell</button>

							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>


	<!--// Trade task //-->
	<div class="col-md-6">
		<div class="card">
			<div class="card-body fix400">
				<div class="row">
					<div class="col-md-6">
						<div class="buybox">
							<h4>Buy</h4>
							<table class="table table-hover">
								<thead>
									<th>Amout</th>
									<th>Prices</th>
									<th>Total</th>
								</thead>
								<tbody>
									<tr>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-md-6">
						<div class="buybox">
							<h4>Sell</h4>
							<table class="table table-hover">
								<thead>
									<th>Amout</th>
									<th>Prices</th>
									<th>Total</th>
								</thead>
								<tbody>
									<tr>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!--//My Trade -->
	<div class="col-md-6">
		<div class="card">
			<div class="card-body fix400">
				<ul class="nav nav-tabs navtabs-history">
				  <li class="nav-item">
				    <a class="nav-link active" href="#">Active</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Cancel order</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">My Trade</a>
				  </li>
				  
				</ul>
			</div>
		</div>
	</div>


	<!--//My Trade -->
	<div class="col-md-6">
		<div class="card">
			<div class="card-body fix400">
				<h4>Order book</h4>
			</div>
		</div>
	</div>

	
	

</div>