<?php
session_start();
ob_start();

$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once ("conexao/conexao.php");
	//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$nome_usuario = $_POST['nome'];
	$senha_usuario = md5($_POST['senha']);
	$senhaConfirma  = md5($_POST['senha_confirma']);
	$email_usuario = $_POST['email'];
	$validade = date('Y-m-d H:i:s', strtotime('+30 days'));
	
	$result_usuario = "INSERT INTO usuarios(nome,senha,email, niveis_acesso_id, validade, created) VALUES ('$nome_usuario','$senha_usuario','$email_usuario', 3, '$validade', NOW())";
	//var_dump($dados);
	//$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	//$result_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES (
	//				'" .$dados['nome']. "',
		//			'" .$dados['email']. "',
			//		'" .$dados['senha']. "',
				//	)";
	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msgcad'] = "Usuário cadastrado com sucesso!";
		header("Location: entrar.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<meta charset="utf-8">
		<title>EASYBOOK - Cadastrar</title>
	</head>
	<body class="bg-light">
	    <div class="container">
	    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="imagens/logo.png" alt="" width="72" height="72">
        <h2>Fórmulario de Cadastro</h2>
        <p class="lead">Tenha acesso a livros de uma forma fácil e organizada</p>
      </div>

      <div class="row">
         
		
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<div class="col-md-8 order-md-1">
          <h4 class="mb-3">Informações</h4>
		<form method="POST" action="">
		    
		    <div class="row">
              <div class="col-md-6 mb-3">
			<label>Nome</label>
			<input type="text" name="nome" class="form-control" placeholder="Digite o nome e o sobrenome"></div></div>
			<div class="mb-3">
			<label>E-mail</label>
			<input type="text" name="email" class="form-control" placeholder="Digite o seu e-mail"><br><br>
			</div>
			<div class="mb-3">
			<label>Senha</label>
			<input type="password" name="senha" class="form-control" placeholder="Digite a senha"><br><br>
			</div>
			<div class="mb-3">
			<label>Confirme sua senha</label>
			<input type="password" name="senha_confirma" class="form-control" placeholder="Digite a senha novamente"><br><br>
			</div>
			<hr class="mb-4">
			<input type="submit" name="btnCadUsuario" class="btn btn-success" value="Efetuar cadastro"><br><br>
			
			
		
		</form>
		</div>
		</div>
		</div>
	</body>
</html>