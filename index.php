
<!DOCTYPE html>
<html>
	<body>
	
	<style>
  body {
	  
    background: #0e1013;
  }

  h2 {
   
    max-width: 600px;
    margin: 60px auto;
    font-family: 'Courier New', Courier, monospace;
    color: #fff;
  }

  h2::after {
    content: '|';
    opacity: 1;
    margin-left: 5px;
    display: inline-block;
    animation: blink .7s infinite;
  }

  @keyframes blink {
    0%, 100% {
      opacity: 1;
    }
    50% {
      opacity: 0;
    }
  }
</style>
		<!--TA PROCURANDO O QUE VACILÃO?-->

		<?php include('header.php'); ?>      
		<div class="hero-unit">

			<h1>EASY BOOK</h1>
			<h2>Uma maneira fácil e organizada para sua leitura.</h2>
			<a class="btn btn-large btn-primary" href="cadastro.php">LEIA UM MÊS GRÁTIS</a>
			
		
	
		</div>
		
		

		
		<?php include('menu.php'); ?>

		<!-- rodapé do site -->
		<?php include('footer.php'); ?>
		
		<script>
  function typeWriter(elemento) {
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i) => {
      setTimeout(() => elemento.innerHTML += letra, 75 * i);
    });
  }

  // Se estiver tendo problemas com performance, utilize o FOR loop como abaixo no local do forEach
  // function typeWriter(elemento) {
  //   const textoArray = elemento.innerHTML.split('');
  //   elemento.innerHTML = '';
  //   for(let i = 0; i < textoArray.length; i++) {
  //     setTimeout(() => elemento.innerHTML += textoArray[i], 75 * i);
  //   }
  // }

  const titulo = document.querySelector('h2');
  typeWriter(titulo);
</script>
	</body>
</html>
