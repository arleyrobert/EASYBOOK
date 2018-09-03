<?php 
include('home_header.php');
include('conexao/conexao.php');
include('adm/pdf/config.inc.php');
?>

<html>
<head>

</head>
<body>
      
        <div id="page-wrapper">
          <div class="container-fluid">
             <br>
            <div class="row">
              <div class="col-lg-12">
               <br>                
              </div>
              </div>
               <h1 class="page-header2">
                        </small> Lista de favoritos
                </h1>
           	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}?>
            <br>       
             <table class="table table-condensed table-stripped">
            <tr>
				<td>Foto</td>
                <td>Título</td>
                <td>Descrição</td>
				<td>Autor</td>
                <td>Ações</td>
                <td></td>
            </tr>
            

       <?php
       $id_user = $_SESSION['usuarioId'];
 $db=new Conect_MySql();
       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
            $sql = "select distinct * from favoritos inner join pdf on favoritos.id_livro = pdf.id_pdf
            inner join usuarios on favoritos.id_usuario=usuarios.id where id_usuario=$id_user";
            $query = $db->execute($sql);
            while($dados=$db->fetch_row($query)){
            
            ?>
        
   
        
            
            
            <tr>
                
				<td><?php echo "<img src='adm/".$dados['foto']."' alt='Foto de exibição' width='90px' height='70px' />"; ?></td>
                
                <td><?php echo $dados['titulo']; ?></td>
                <td><?php echo $dados['descricao']; ?></td>
				<td><?php echo $dados['autor']; ?></td>
                <td><a button class="btn btn-warning" href="adm/pdf/pdfjs/web/viewer.html?file=<?php echo $dados['nome_arquivo'] ?>"><b>Ver</b></a></td>
                <td></a> <a button type="button" class="btn btn-xs btn-danger" href="apagar_favorito.php?id=<?php echo $dados['id_fav']?>">Remover</a>
                </td>
                <td></td>
            </tr>
                
          <?php  } ?>
            
        </table>
   
                            
                       
                <br>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
