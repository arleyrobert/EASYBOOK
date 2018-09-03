<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from pdf where id_pdf=".$_GET['id'];
            $query = $db->execute($sql);
            if($dados=$db->fetch_row($query)){
                if($dados['nome_arquivo']==""){?>
        <p>Não há arquivos</p>
                <?php }else{ ?>
                <div align="center">
        <iframe src="pdfjs/web/viewer.html?file=arquivos<?php echo $dados['id_pdf']; ?>" width="100%" height="650"></iframe>
        
                </div>
                <?php } } ?>

    </body>

</html>
