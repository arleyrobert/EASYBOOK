<?php 
include ("conexao/conexao.php");
session_start();
$id = $_SESSION['usuarioId'];
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Easy Book">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Easy Book</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="home.php?id=<?php echo $id ?>">
    <img src="imagens/logo.png" width="110" height="60" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="home.php?id=<?php echo $id ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
  <a class="dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Categorias
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		<?php 
		$seleciona_categoria = mysqli_query($conn, "SELECT * FROM categorias");
		while($ln = mysqli_fetch_array($seleciona_categoria)){
		   
		
		?>
		<a class="dropdown-item" href="categorias.php?id=<?php echo $ln['id_categoria']?>"><?php echo $ln['nome_categoria']; ?></a>
		<?php } ?>
	
  </div>
</div>
     
    </ul>
    
    <form class="form-inline justify-content-center">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>

   
   <ul class="navbar-nav">
   <li class="nav-item">
        <div class="dropdown dropleft">
  <a class="dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-cogs"></i>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		
		<a class="dropdown-item" href="lista_favoritos.php?id=<?php echo $_SESSION['usuarioId']?>">Favoritos</a>
		<a class="dropdown-item" href="sugerir.php">Sugerir</a>
		<a class="dropdown-item" href="sair.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
		 </li>
      
        
      
		
	
  </div>
</div>
      </li>
      
   </ul>
   
   
  </div>
</nav>
</body>
</html>