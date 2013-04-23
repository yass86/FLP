<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/> 
    <title>FLP </title>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/content.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/footer.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/header.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/html.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/js.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/layout.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/menu.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/normalize.css.css')?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo site_url('theme/css/stylesheet.css')?>" media="all" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo site_url('theme/js/html5shiv-printshiv.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('theme/js/jquery-1.7.2.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('theme/js/css3-mediaqueries.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('theme/js/jquery.cycle.lite.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('theme/js/jquery.tinycarousel.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('theme/js/custom.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('theme/js/utiles.js')?>"></script>
  </head>
  <body class="front no-sidebars" dir="<?php echo site_url();?>">
      <div id="page">
      <?php echo $header; ?>
      <?php echo $preface; ?>
      <?php echo $main; ?>
      <?php echo $footer; ?> 
     </div><!--/.page -->  
  </body>
  <script type="text/javascript">
      urlbase = $('body').attr('dir');
  </script>
</html>