<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>{{TITLE}}</title>
    <script type="text/javascript" src="<?php echo resource("js/app.js");?>"></script>
    <link href="<?php echo base_url("templates/default/css/app.css");?>" rel="stylesheet">
  </head>

<body>

<header>
<?php include __DIR__."/../header.php";?>
</header>
<main>
  <div class="container-fluid">
    <?php alert();?>
    <?php echo $data;?>
  </div>
</main>
<footer>
  <?php include __DIR__."/../footer.php";?>
</footer>
</body>
</html>