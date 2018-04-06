<div class="row sbox">
	<div class="col-md-8">
		<div class="chart">
			<div class="card-body fix400"></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="network-prices">
			<div class="card-body fix400">
				<h4>Network Prices</h4>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-body fix400">
				<div class="row">
					<div class="col-md-6">
						
							<h4>Buy</h4>
							Your :  0.000006 BTC
							<form>
								<div class="form-group">
		                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("amout");?></label>
		                            <div class="mx-auto">
		                                <input type="number" name="amout" class="form-control" id="input2EmailForm" placeholder="Amout" required="true">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("prices");?></label>
		                            <div class="mx-auto">
		                                <input type="number" name="amout" class="form-control" id="input2EmailForm" placeholder="Prices" required="true">
		                            </div>
		                        </div>

		                        <hr>
		                        Total : <br>
		                        Fee : 
		                        <hr>
		                        <button class="btn btn-primary btn-block">Buy</button>

							</form>
						
					</div>

					<div class="col-md-6">
						
							<h4>Sell</h4>
							Your :  1 PIRL
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


	<!--// Trade task //-->
	<div class="col-md-6">
		<div class="card">
			<div class="card-body fix400 tradeBook">
				<div class="row">
					<div class="col-md-6">
						
							<div class="sroolHeader">
								<h4>Buy</h4>
								<table class="table table-hover table-sm" style="margin-bottom: 0;">
									<thead>
										<th class="col-xs-3" style="border-bottom:0;">Amout</th>
										<th class="col-xs-3" style="border-bottom:0;">Prices</th>
										<th style="border-bottom:0;">Total</th>
									</thead>
								</table>
							</div>
							<div class="sroolBody">
								<table class="table table-hover table-sm">
									<tbody>
										<?php for ($i=0; $i<=49;$i++) { ?>
											
										<tr id="item-<?php echo $i;?>">
											<td class="col-xs-3">-</td>
											<td class="col-xs-3">-</td>
											<td>-</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						
					</div>

					<div class="col-md-6">
						
							<div class="sroolHeader">
								<h4>Sell</h4>
								<table class="table table-hover table-sm" style="margin-bottom: 0;">
									<thead>
										<th class="col-xs-3" style="border-bottom:0;">Amout</th>
										<th class="col-xs-3" style="border-bottom:0;">Prices</th>
										<th style="border-bottom:0;">Total</th>
									</thead>
								</table>
							</div>
							<div class="sroolBody">
								<table class="table table-hover table-sm">
									<tbody>
										<?php for ($i=0; $i<=49;$i++) { ?>
											
										<tr id="item-<?php echo $i;?>">
											<td class="col-xs-3">-</td>
											<td class="col-xs-3">-</td>
											<td>-</td>
										</tr>
										<?php } ?>
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
			<div class="card-body fix400 orderBook">
				<div class="sroolHeader">
					<h4>Order book</h4>
					<table class="table table-hover" style="margin-bottom: 0;">
						<thead>
							<th class="col-xs-3" style="border-bottom:0;">Amout</th>
							<th class="col-xs-3" style="border-bottom:0;">Prices</th>
							<th style="border-bottom:0;">Total</th>
						</thead>
					</table>
				</div>
				<div class="sroolBody">
					<table class="table table-hover">
						<tbody id="order">
							<?php for ($i=0; $i<=49;$i++) { ?>
								
							<tr id="item-<?php echo $i;?>">
								<td class="col-xs-3">-</td>
								<td class="col-xs-3">-</td>
								<td>-</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>

</div>
<style type="text/css">
	.sroolBody{
		overflow-y: scroll;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$(".orderBook .sroolBody").each(function(index, value){
			var height = $(this).parent().outerHeight() - $(this).parent().find(".sroolHeader").outerHeight() - 30;

			$(this).height(height);
		});

		var height = $(".tradeBook").outerHeight() - $(".tradeBook .sroolHeader").first().outerHeight() - 30;
		
		$(".tradeBook .sroolBody").height(height);
		
	});
</script>