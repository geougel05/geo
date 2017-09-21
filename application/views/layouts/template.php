<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $this->layout->getTitle()?></title>
	<meta charset="UTF-8" />
	<meta name="description" content="<?php echo $this->layout->getDescripcion()?>" />
  	<meta name="keywords" content="<?php echo $this->layout->getKeywords()?>" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."public/css/bootstrap.min.css"?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."public/css/estilo.css"?>">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.PrintArea.js"></script>

	<style>

	      #map {
	        height: 100%;
	      }

	      .panel-body{
	       min-height: 500px;
	      }
	    </style>

</head>


<body>



<?php echo $content_for_layout;?>


</body>
</html>