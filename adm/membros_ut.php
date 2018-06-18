<?php
include('conexao.php');
include('seguranca.php');


// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['cadastrar'])) {
	
	// Recupera os dados dos campos
	$titulo = $_POST['titulo'];
	$paginas = $_POST['paginas'];
	$autor = $_POST['autor'];
	$descricao = $_POST['descricao'];
	$foto = $_FILES["foto"];
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura máxima em pixels
		$largura = 1250;
		// Altura máxima em pixels
		$altura = 1480;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 2000000;

		$error = array();

    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$sql=mysqli_query($conn,"
				INSERT INTO `livros`
				VALUES(NULL, 
					'{$nome_imagem}',
					'{$titulo}',
					'{$paginas}',
					'{$descricao}',
					'{$autor}'
					)
				");
		
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "dados cadastrados com sucesso.";
			}
		}
	
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro de membro</title>
</head>

<body>
<h1>Novo membro</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro" >
Título:<br />
<input type="text" name="titulo" /><br /><br />
Páginas:<br />
<input type="text" name="paginas" /><br /><br />
Autor:<br />
<input type="text" name="autor" /><br /><br />
Descrição:<br />
<input type="text" name="descricao" /><br /><br />
Foto de exibição:<br />
<input type="file" name="foto" /><br /><br />
<input type="submit" name="cadastrar" value="Cadastrar" />
</form>

<hr />

</body>
</html>