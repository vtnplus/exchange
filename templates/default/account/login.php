<div class="loginForm">

<h2 class="text-left mb-4"><?php $this->views->lang("login_title");?></h2>
<?php alert();?>
<div class="card">
	<div class="row">
		
		<div class="col">
            
			<div class="card-body">
			
                    <form role="form" method="post" action="<?php echo router("login");?>" accept-charset="UTF-8">
                        <div class="form-group">
                            <label for="input2EmailForm" class="form-control-label"><?php echo $this->views->lang("email");?></label>
                            <div class="mx-auto">
                                <input type="email" name="email" class="form-control" id="input2EmailForm" placeholder="email" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input2PasswordForm" class="form-control-label"><?php echo $this->views->lang("password");?></label>
                            <div class="mx-auto">
                                <input type="password" name="password" class="form-control" id="input2PasswordForm" placeholder="password" required="true">
                            </div>
                        </div>

                        <?php if($this->config->item("open_recaptcha") == true){ ?>
                        <div class="form-group">
                            <?php echo $this->recaptcha->render(); ?>
                        </div>
                        <?php } ?>
                        
                        <div class="form-group">
                            <label>
                               <a href="<?php echo router("register");?>"><?php echo $this->views->lang("register");?></a>
                            </label>
                            <label class="pull-right">
                                <a href="<?php echo router("forget");?>"><?php echo $this->views->lang("forget");?></a>
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary btn-block btn-lg" value="1" name="login"><?php echo $this->views->lang("btn_login");?></button>
                            </div>
                        </div>
                    </form>
                    <div class="title-line"><span><?php $this->views->lang("or_with");?></span></div>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-warning btn-sm" href="<?php echo router("account/facebook");?>">Facebook</a>
                        </div>
                        <div class="col text-right">
                            <a class="btn btn-info btn-sm" href="<?php echo router("account/google");?>">Google</a>
                        </div>
                    </div>
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