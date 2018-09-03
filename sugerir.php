<html>
<?php 
include('conexao/conexao.php');
include('home_header.php');
?>
	<body>
		
		
		
		
		
			
			<form name="formulario" action="" method="post">
	<?php
	
	ini_set('defaut_charset', 'UTF-8');
		
		if(isset($_POST['send'])){
			$nome = $_POST['nome'];
			$autor = $_POST['autor'];
			$mensagem = $_POST['mensagem'];	
			
			if (empty($nome)){
				$erro = 'por favor preencha o campo nome';
			}else if(empty($autor)){
				$erro = 'por favor preencha o campo autor';
			}else if(empty($mensagem)){
				$erro = 'por favor preencha o campo mensagem';
			}else{
				include('conexao.php');
				$qr=mysqli_query($conn,"
				INSERT INTO `sugestao`
				VALUES(NULL, 
					'{$nome}',
					'{$autor}',
					'{$mensagem}')
				");
				
				if($qr){
					echo'
					<script type="text/javascript">
					alert("Mensagem enviada com sucesso!");
					</script>
					';
				}
			}
			if(isset($erro)):
				echo $erro. '<br/>';
			endif;
			
		}
		
	?>
		
			<div class="container">
		
			<p><b>Título:</b><br>
			<input type=text name="nome" size="45"></p>
			<p><b>Autor:</b><br>
			<input type=text name="autor" size="45"></p>
			<p><b>Mensagem:</b><br>
			<textarea name="mensagem" rows="10" cols="60" wrap="virtual"></textarea></p><br>
			<p><input type="submit" class="btn btn-primary" value="Enviar Email" name="send"> <input type="reset" class="btn btn-secondary" value="Limpar Formulário"></p>
			</form>
		</div>
		
	</body>
</html>