<?php
session_start();
include('home_header.php');
include('conexao/conexao.php');
include('valida.php');
	
	ini_set('defaut_charset', 'UTF-8');
	$result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		if(isset($_POST['send'])){
			$user = $_POST['id_usuario'];
			$livro = $_POST['id_livro'];
			
			if (empty($user)){
				$erro = 'usuario vazio';
			}else if(empty($livro)){
				$erro = 'selecione um livro';
			
			}else{
				include('conexao/conexao.php');
				$qr=mysqli_query($conn,"
				INSERT INTO `favoritos`
				VALUES(NULL, 
					'{$user}',
					'{$livro}')
				");
				
				if($qr){
				    $id= $_SESSION['usuarioId'];
				$_SESSION['msg'] = "<div class='container'><p style='color:green;'>Favoritado com sucesso</p></div>";
	header("Location: home.php?id=$id");
						
				}
			}
			if(isset($erro)):
				echo $erro. '<br/>';
			endif;
			
		}
		
	?>