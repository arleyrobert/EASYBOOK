<html>
<body>
<!-- The grid: three columns -->
<div class="row">
  <div class="column" onclick="openTab('b1');" style="background:#1B264F;"><img src="icons/book.png" width='50px'> Leia quando quiser</div>
  <div class="column" onclick="openTab('b2');" style="background:#274690;"><img src="icons/card.png" width='50px'> Escolha seu plano</div>
  <div class="column" onclick="openTab('b3');" style="background:#576CA8;"><img src="icons/diversos.png" width='50px'> São diversos livros</div>
</div>

<!-- The expanding grid (hidden by default) -->
<div id="b1" class="containerTab" style="display:none;background:#1B264F">
  <!-- If you want the ability to close the container, add a close button -->
  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
  <h3>Leia a livros de forma fácil e organizada. Onde quiser, quando quiser.</h3>
  <div class="ctnFlex">
	<div class="op1">
		<img src="icons/cel.png" width='70px'><br/>Leia no seu celular
		<p> disponivel em smartphones e tablets </p>
	</div>
	<div class="op2">
	<img src="icons/computador.png" width='70px'><br/>Leia em qualquer computador<p>É só acessar a easybook.com</p>
	</div>
</div>
</div>

<div id="b2" class="containerTab" style="display:none;background:#274690">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
  <h3>Escolha seu plano e leia a tudo na Easy Book. </h3>
  <table class="table">
  <tr>
    <th>Duração</th>
    <th>Valor</th> 
    
  </tr>
  <tr>
    <td>1 mês</td>
    <td>R$ 7,90</td>
  </tr>
  <tr>
    <td>6 meses</td>
    <td>R$ 35,90</td>
    </tr>
  <tr>
    <td>12 meses</td>
    <td>R$ 61,90</td>
  </tr>
  
</table>
<hr>
<br>



</div>

<div id="b3" class="containerTab" style="display:none;background:#576CA8">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">x</span>
  <h3>Uma infinidade de livros espera por você</h3>
  
  <p><img src="icons/livroanimado.gif" width='90px'> Romance, terror, ficção e muito mais.</p>
</div>
<script>

// Hide all elements with class="containerTab", except for the one that matches the clickable grid column
function openTab(tabName) {
    var i, x;
    x = document.getElementsByClassName("containerTab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
	
}</script>


</body>
</html>

