<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>{{TITLE}}</title>
    <script type="text/javascript" src="<?php echo resource("js/app.js");?>"></script>
    <script type="text/javascript" src="<?php echo resource("js/customs.js");?>"></script>
    <link href="<?php echo base_url("templates/default/css/app.css");?>" rel="stylesheet">
  </head>

<body>
<header>
<?php include __DIR__."/../header.php";?>
</header>

<div class="container-fluid">
    <div class="row">
    
    <main class="col-md-12 col-lg-12" style="margin-top:15px;">
    <?php alert();?>
    <?php echo $data;?>

    
    </main>
</div>
<footer>
  <?php include __DIR__."/../footer.php";?>
</footer>

</body>
</html>