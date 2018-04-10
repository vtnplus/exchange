<div class="loginForm">
<?php alert();?>
<h2 class="text-left mb-4"><?php $this->views->lang("forget_title");?></h2>
<div class="card">
	<div class="row">
		
		<div class="col">
            
			<div class="card-body">
			
                    <form role="form" method="post" action="<?php echo router("validate_code");?>" accept-charset="UTF-8">
                        <div class="form-group">
                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("code");?></label>
                            <div class="mx-auto">
                                <input type="text" name="code" class="form-control" id="input2EmailForm" placeholder="Enter code" required="true">
                            </div>
                        </div>
                        
                        <?php if($this->config->item("open_recaptcha") == true){ ?>
                        <div class="form-group">
                            <?php echo $this->recaptcha->render(); ?>
                        </div>
                        <?php } ?>

                        
                        <div class="form-group">
                            <div class="mx-auto">
                                <button type="submit"  name="validate" value="1" class="btn btn-primary btn-block btn-lg"><?php echo $this->views->lang("btn_forget");?></button>
                            </div>
                        </div>
                    </form>
                    
			</div>       
		</div>
	</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var margin = ($(window).outerHeight() - $(".loginForm").outerHeight()) / 2;
        $(".loginForm").css("margin-top",margin);
    });
</script>