<?php 
	include('../header.php');
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Layout Teste</title>
 	<style type='text/css'>
 		#conteudo_principal{
 			text-align: center;
 			padding: 100px;
 		}
 		#titulo{
 			font-size: 80px;
 		}
 		#subtitulo{
 			font-size: 40px;
 		}
 		#conteudo{
 			font-size: 30px;
 		}
 		#conteudoCap{
 			background: #D8D8D8;
 			padding: 0;
 		}
 	</style>
 </head>
 <body>

 	<div id='conteudo_principal'>
 		<div id='conteudoCap'>
		 			<h1 id='titulo'>ola mundo</h1>
		 		<div id='imagem'>
		 			<img src='fort.jfif' height='500px'>
		 			<br><br>
		 			<div>
		 				<h3 id='subtitulo'>subtitulo</h3>
		 			</div>
		 		</div><br><br><br>
		 		<div id='conteudo'>
		 			texto texto texto
		 		</div>
		 </div>

 	</div>
 
 </body>
 </html>