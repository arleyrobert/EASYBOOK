<?php 
session_start();
include('home_header.php');
?>
<!DOCTYPE html>
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
                        </small> Lista de livros 
                </h1>
           
            <br>       
             <table class="table table-condensed table-stripped">
            <tr>
				<td>Foto</td>
                <td>Título</td>
                <td>Descrição</td>
				<td>Autor</td>
                <td>Visualização</td>
                <td></td>
            </tr>
            


        <?php
        session_start();
        
        include 'adm/pdf/config.inc.php';
        
   
        
            
            
            $sql = "SELECT * FROM pdf WHERE id_categoria=".$_GET['id'];
            $db=new Conect_MySql();
            $query = $db->execute($sql);
            while($dados=$db->fetch_row($query)) {   ?>
            <tr>
                
				<td><?php echo "<img src='adm/".$dados['foto']."' alt='Foto de exibição' width='90px' height='70px' />"; ?></td>
                
                <td><?php echo $dados['titulo']; ?></td>
                <td><?php echo $dados['descricao']; ?></td>
				<td><?php echo $dados['autor']; ?></td>
                <td><a button class="btn btn-warning" href="adm/pdf/pdfjs/web/viewer.html?file=<?php echo $dados['nome_arquivo'] ?>"><b>Ver</b></a></td>
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

