<div class="container">
     
    <br/>
    <h3>Adicionados recentemente</h3>
    <br/>
   
<div class="card-deck">
    <?php
 $db=new Conect_MySql();
       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
            $sql = "select * from pdf order by id_pdf desc limit 4";
            $query = $db->execute($sql);
            while($dados=$db->fetch_row($query)){?>
  <div class="card">
      <?php echo "<img class='card-img-top' src='adm/".$dados['foto']."' alt='Foto de exibição' width='180px' height='230px' />"; ?>
    <div class="card-body">
      <h5 class="card-title"><?php echo $dados['titulo']; ?></h5>
      <p class="card-text">Autor: <?php echo $dados['autor']; ?></p>
    </div>
    <div class="card-footer">
        <!-- Botão do modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $dados['id_pdf']; ?>">
  Ver mais <i class="fas fa-caret-down"></i>
</button>
       <?php // <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><a //href="ver_livro.php?id=<?php echo $dados['id_pdf']">Ver mais</a></button>
       ?>
       
       <!-- Modal -->
<div class="modal fade" id="myModal<?php echo $dados['id_pdf']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel"><?php echo $dados['titulo']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <div class="p-3 mb-2 bg-light text-dark">
           <?php echo "<img class='rounded mx-auto d-block' src='adm/".$dados['foto']."' alt='Foto de exibição' width='100px' height='130px' />"; ?></div>
           <div class="p-3 mb-2 bg-dark text-white">
       <b>Autor:</b> <?php echo $dados['autor']; ?><br/>
       <b>Descrição:</b> <?php echo $dados['descricao']; ?>
       </div>
      </div>
      <div class="modal-footer">
        <a button type="button" class="btn btn-primary"  href="adm/pdf/pdfjs/web/viewer.html?file=<?php echo $dados['nome_arquivo'] ?>"><i class="fas fa-book-open"></i> Ler livro</a>
        
      <?php
       
            
            $db=new Conect_MySql();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $mysql = "select * from usuarios where id='$id'";
            $qr = $db->execute($mysql);
            while($rows=$db->fetch_row($qr)){
      ?>
      
      
      <form name="formulario" action="favoritos.php" method="post">
	
		
		
		
			
			<input type=hidden name="id_usuario" value="<?php echo $rows['id']; ?>"></p>
			<input type=hidden name="id_livro" value="<?php echo $dados['id_pdf']; ?>"></p>
			<p><button type="submit" class="btn btn-danger"  name="send"> <i class="fas fa-heart"></i></button>
			</form>
        
       
      
    </div>
  </div>
</div>
      
   </div>
   </div>
   </div>
  
  
  <?php  } }?>
</div>
 

</div>
