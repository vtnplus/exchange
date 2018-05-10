<div class="tabs-span-node row">
	<div  class="col">
		<h4><?php echo $coinbase;?>/<?php echo $symbol;?></h4>
	</div>

	<div class="col">
		Giá gần nhất<br>
		0.062710 $502.31
	</div>


	<div  class="col">
		Thay đổi giá 24h<br>
		-0.000252 -0.40%
	</div>


	<div  class="col">
		Giá cao nhất 24h<br>
		0.064686
	</div>
	
	<div  class="col">
		Giá thấp nhất 24h<br>
		0.062100
	</div>

	<div  class="col">
		Khối lượng 24h<br>
		11,011.69 BTC
	</div>


</div>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/drag-panes.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

<div class="row sbox">

	<div class="col-lg-9">
		<div id="containerChart" style="height: 550px; min-width: 310px"></div>
	</div>

	<div class="col-lg-3">
		<div class="card" id="zoomcontainerChart">
			<div class="card-body">
				<a href="<?php echo router("exchange/trade/BTC/".$symbol);?>" class="btn btn-sm btn-<?php echo ($coinbase == "BTC" ? "info" : "default");?>">BTC</a>
				<a href="<?php echo router("exchange/trade/USDT/".$symbol);?>" class="btn btn-sm btn-<?php echo ($coinbase == "USDT" ? "info" : "default");?>">USDT</a>
				<a href="<?php echo router("exchange/trade/ETH/".$symbol);?>" class="btn btn-sm btn-<?php echo ($coinbase == "ETH" ? "info" : "default");?>">ETH</a>
				<a href="<?php echo router("exchange/trade/BTCR/".$symbol);?>" class="btn btn-sm btn-<?php echo ($coinbase == "BTCR" ? "info" : "default");?>">BTCR</a>

				<table class="table table-hover">
		            <thead>
		              <th style="border-top:0;">Name</th>
		              <th style="border-top:0;">Prices</th>
		              <th style="border-top:0;">Vol</th>
		            </thead>
		            <tbody>
		              <?php foreach ($coind as $key => $value) { ?>
		              <tr>
		                <td><a href="<?php echo router("exchange/trade/".$coinbase."/".$value["symbol"]);?>"><?php echo ($value["coind_icoins"] ? '<img src="'.$value["coind_icoins"].'">' : "");?> <?php echo $value["symbol"];?></a></td>
		                <td>6700</td>
		                <td>89</td>
		              </tr>
		              <?php } ?>
		              
		            </tbody>
		          </table>
		    </div>
		</div>

		
	</div>

	
	
	<div class="col-lg-12"><br></div>
	

	
	
	<div class="col-lg-6">
		<div class="card fix500">
			<div class="card-body">
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
								<table class="table table-hover table-sm" id="buy">
									<tbody>
										<?php for ($i=0; $i<=10;$i++) { ?>
											
										<tr id="item-<?php echo $i;?>">
											<td class="col-xs-3 amount">-</td>
											<td class="col-xs-3 prices">-</td>
											<td class="totals">-</td>
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
								<table class="table table-hover table-sm" id="sell">
									<tbody>
										<?php for ($i=0; $i<=10;$i++) { ?>
											
										<tr id="item-<?php echo $i;?>">
											<td class="col-xs-3 amount">-</td>
											<td class="col-xs-3 prices">-</td>
											<td class="totals">-</td>
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

	<div class="col-lg-6">
		<div class="card fix500">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						
							<h4>Buy <div class="pull-right small-text text-right">Fee : 0.1%<br>0.05% with BTCR</div></h4>
							<hr>
							<form class="buyForm" data-balancer="<?php echo (is_login() ? $balancer["balancer_basecoins"] : 0);?>">
								<div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 form-control-label"><?php echo $this->views->lang("balancer");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <?php echo (is_login() ? $balancer["balancer_basecoins"] : 0);?> <?php echo $coinbase;?>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 form-control-label"><?php echo $this->views->lang("prices");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <input type="text" name="prices" class="form-control  form-control-sm" id="input2EmailForm" placeholder="Prices" required="true">
		                            </div>
		                        </div>

								<div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 form-control-label"><?php echo $this->views->lang("amout");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <input type="text" name="amount" class="form-control form-control-sm" id="input2EmailForm" placeholder="Amout" required="true">
		                                <div class="row" style="margin-top:10px;">
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">25%</a>
		                                	</div>
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">50%</a>
		                                	</div>
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">75%</a>
		                                	</div>
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">100%</a>
		                                	</div>
		                                </div>
		                            </div>
		                        </div>

		                        

		                        <div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 col-form-label"><?php echo $this->views->lang("Total");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <input type="text" name="totals" class="form-control form-control-sm" id="input2EmailForm" placeholder="Total">
		                            </div>
		                        </div>

		                        
		                        <hr>
		                        <?php if(!is_login()){ ?>
		                        <button class="btn btn-primary">Login and Buy</button>
		                    	<?php }else{ ?>
		                    	<button class="btn btn-secondary btn-block" type="button" id="btnBuy">Buy</button>
		                    	<?php } ?>
		                        

							</form>
						
					</div>

					<div class="col-md-6">
						
							<h4>Sell <div class="pull-right small-text text-right">Fee : 0.1%<br>0.05% with BTCR</div></h4>
							<hr>
							<form class="sellForm"  data-balancer="<?php echo (is_login() ? $balancer["balancer_trader"] : 0);?>">
								<div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 form-control-label"><?php echo $this->views->lang("balancer");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <?php echo (is_login() ? $balancer["balancer_trader"] : 0);?> <?php echo $symbol;?>
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 form-control-label"><?php echo $this->views->lang("prices");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <input type="text" name="prices" class="form-control form-control-sm" id="input2EmailForm" placeholder="Prices" required="true">
		                            </div>
		                        </div>

								<div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 form-control-label"><?php echo $this->views->lang("amout");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <input type="text" name="amount" class="form-control form-control-sm" id="input2EmailForm" placeholder="Amount" required="true">
		                                <div class="row" style="margin-top:10px;">
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">25%</a>
		                                	</div>
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">50%</a>
		                                	</div>
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">75%</a>
		                                	</div>
		                                	<div class="col">
		                                		<a class="btn btn-sm btn-block btn-default">100%</a>
		                                	</div>
		                                </div>
		                            </div>
		                        </div>

		                        
		                        <div class="form-group row">
		                            <label for="input2EmailForm" class="col-sm-3 col-form-label"><?php echo $this->views->lang("Total");?></label>
		                            <div class="col-sm-9 mx-auto">
		                                <input type="text" name="totals" class="form-control form-control-sm" id="input2EmailForm" placeholder="Total">
		                            </div>
		                        </div>
		                        
		                        <hr>

		                        <?php if(!is_login()){ ?>
		                        <button class="btn btn-primary">Login and Sell</button>
		                    	<?php }else{ ?>
		                    	<button class="btn btn-info btn-block" type="button" id="btnSell">Sell</button>
		                    	<?php } ?>

		                       

							</form>
						
					</div>


					

				</div>
				<hr>
					Use BTCR -50% fee when your trade
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

				<table class="table table-hover" id="myorder">
					<thead>
						<th>Coins</th>
						<th>Prices</th>
						<th>Amount</th>
						<th>Totals</th>
					</thead>
					<tbody>
						<tbody>

						</tbody>
					</tbody>
				</table>
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
	var coinbase = '<?php echo $coinbase;?>';
	var symbol = '<?php echo $symbol;?>';
	var coinsbase_blancer = '<?php echo $symbol;?>';
	var symbol_balancer = '<?php echo $symbol;?>';



	

	$(document).ready(function(){
		$(".sellForm #sellprofucts").on("click", function(){
			var prices = $(".sellForm [name=prices").val();
			var amount = $(".sellForm [name=amount").val();
			saveOrder(prices, amount, totals, "sell");
		});

		var containerChart = $("#containerChart").height();
		$("#zoomcontainerChart").height(containerChart);

		$(".orderBook .sroolBody").each(function(index, value){
			var height = $(this).parent().outerHeight() - $(this).parent().find(".sroolHeader").outerHeight() - 30;

			$(this).height(height);
		});

		var height = $(".tradeBook").outerHeight() - $(".tradeBook .sroolHeader").first().outerHeight() - 30;
		
		$(".tradeBook .sroolBody").height(height);

		chart();
		//setInterval(chart, 60000);

	});



</script>