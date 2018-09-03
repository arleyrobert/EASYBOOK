<?php 
include ("conexao/conexao.php");
include ("home_header.php");
?>
<html>
    <body>

        <?php
        
        //aqui inicia a listagem de livros
        session_start();
        include 'adm/pdf/config.inc.php';
        
        
        
      ?>
           
                
         


     
   

    <?php
 $db=new Conect_MySql();
       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
            $sql = "select * from pdf where id_pdf=".$_GET['id'];
            $query = $db->execute($sql);
            while($dados=$db->fetch_row($query)){?>
  <h3 class="text-center"><?php echo $dados['titulo']; ?></h5>
      <?php echo "<img class='rounded mx-auto d-block' src='adm/".$dados['foto']."' alt='Foto de exibição' width='200px' height='180px' />"; ?>
    <div class="card-body">
      
      <p class="text-center">Autor: <?php echo $dados['autor']; ?></p>
    </div>
    <div class="card-footer">
      <small class="text-center"><a href="adm/pdf/arquivo.php?id=<?php echo $dados['id_pdf']?>">Ler livro</a></small>
    </div>
  
  
  <?php  } ?>

 




    </body>
</html>