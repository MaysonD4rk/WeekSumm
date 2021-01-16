<?php 

	session_start();
	$_SESSION['id_user'] = 1;
	
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Criador De Noticia</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		*{
			margin: 0;
			padding: 0;
			border: none;
		}
		#pubCreator{
			display: flex;
			align-items: center;
			justify-content: center;
			height: 789px;
		}
		input{
			margin: 5px;
			border-radius: 3px;
			height: 35px;
			width: 200px;
			background: #F2F2F2;
		}

		input[type="file"]{
			display: block;
		}
		input[name="subtitle"]{
			margin-bottom: 0;
		}

		label{
			padding-right: 15px;
			margin-left: 10px;
			display: block;
		}

		label div{
		}

		select[name="theme"]{
			margin: 0 0 10px 5px;
		}

		textarea{
			border: 1px solid black;
		}

		@media (min-width: 360px), (min-height: 640px){
				#pubCreator{
				height: 640px;
			}
			input{
			width: 250px;
			}
			textarea[name="content"]{
				width: 100px;
				height: 250px;
				resize: none;

			}

		}
		@media (min-width: 411px), (min-height: 731px){
				#pubCreator{
				height: 731px;
			}
			input{
			width: 300px;
			}

			textarea[name="content"]{
				width: 300px;
				height: 250px;
				resize: none;

			}
		}

		@media (min-width: 411px), (min-height: 823px){
				#pubCreator{
				height: 823px;
			}

			textarea[name="content"]{
				width: 300px;
				height: 250px;

				position: relative;
				resize: none;
				overflow: auto;

			}

		}
		@media (min-width: 320px), (max-height: 568px){
				#pubCreator{
				height: 568px;
			}
			input{
			width: 200px;
			}

			textarea[name="content"]{
				width: 300px;
				position: relative;
				right: 0;
				resize: none;
				height: 250px;
			}
		}
		@media (min-width: 800px){
		
			textarea[name="content"]{
				width: 500px;
				position: relative;
				right: 0;
				resize: none;
				height: 400px;
			}
		}

		.cadastre-se{
			color: blue;
		}
		textarea[name="content"]{
				outline: none;
			}
		


	</style>
		

</head>
<body>

	<div id="pubCreator">
		<form method="POST" action="pub_creator_process.php" enctype="multipart/form-data">
	 			
	 			<input type="file" id="file-input" name="file">
	 			<div style="margin-top: 400px;"></div>
	 			<label for='file-input'><div><img src="noimage.png" height="200px"></div></label><br><br>	

				<input type="text" name="title" placeholder="titulo"><br><br>
				<input type="text" name="subtitle" placeholder="subtitulo"><br><br>
				<select name="theme">
					<option value="0">White</option>
					<option value="1">Dark</option>
				</select><br>
				<input type="text" name="location" placeholder="location"><br><br>

				<textarea name="content" placeholder="Conteúdo"></textarea>
				<br><br>
	 			<input type="submit" value="Criar Noticia">

	 	</form>
	 </div>

</body>
</html>