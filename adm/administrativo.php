<?php
	session_start();
	include_once("seguranca.php");
	include_once("conexao/conexao.php");
	seguranca_adm();
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

		<title>Administrativo - Easy Book</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Dashboard</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="#">Usuários</a></li>
					<li><a href="ver_contatos.php">Contatos</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livros<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Sugestões</a></li>
							<li><a href="#">Biblioteca</a></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>
	
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	
	//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 10;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		
		?>
	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Usuários</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
				<?php
					$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
					$resultado_usuarios = mysqli_query($conn, $result_usuarios);
					while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
					echo"
					<thead>
						<tr>
							<th>Inscrição</th>
							<th>Nome</th>
							<th>Situação</th>
							<th>Nivel de acesso</th>
							<th>Cadastrado</th>
							<th>Ações</th>
						</tr>
					</thead>	
					
					<tbody>
						<tr>
							<td>". $row_usuario['id'] ."</td>
							<td>". $row_usuario['nome'] ."</td>
							<td>". $row_usuario['situacoe_id'] ."</td>
							<td>". $row_usuario['niveis_acesso_id'] ."</td>
							<td>". $row_usuario['created'] ."</td>
							<td>
								<a button type='button' class='btn btn-xs btn-primary'>Visualizar</button>
								<a button type='button' class='btn btn-xs btn-warning' href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</button>
								<a button type='button' class='btn btn-xs btn-danger' href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</button>
							</td>
						</tr>              
					</tbody>";
						
				}
				
				
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='administrativo.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='administrativo.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='administrativo.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='administrativo.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>
							
				</table>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

