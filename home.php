<?php 
session_start();
include ("conexao/conexao.php");
include ("home_header.php");
?>
<html>
    <head>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0" charset="UTF-8">

  	    <link rel="icon" type="image/png" href="imagens/favicon.ico" /> 
  	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
			
		</head>
    <body>

        <?php
        
        include 'adm/pdf/config.inc.php';
        ?>
           
                      
         <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	 
		
		?>

           
                
         

<?php include('recentes.php'); ?>

<!-- Segundo container de livros -->

<?php include('tecnologia.php');?>

<?php include('literatura.php');?>


    </body>
</html>