
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="fontFace.css">

	<style>
		*{
			margin: 0;
			padding: 0;
			border: none;
		}
		#cadForm{
			display: flex;
			align-items: center;
			justify-content: center;
			height: 789px;
		}
		input{
			margin: 5px;
			border-radius: 3px;
			height: 35px;
			width: 400px;
			background: #F2F2F2;
		}

		@media screen(min-width: 360px), (min-height: 640px){
				#cadForm{
				height: 640px;
			}
			input{
			width: 250px;
			}
		}
		@media screen(min-width: 411px), (min-height: 731px){
				#cadForm{
				height: 731px;
			}
			input{
			width: 300px;
			}
		}

		@media screen(min-width: 411px), (min-height: 823px){
				#cadForm{
				height: 823px;
			}

		}
		@media screen(min-width: 320px), (min-height: 568px){
				#cadForm{
				height: 568px;
			}
			input{
			width: 200px;
			}
		}

		.login{
			color: blue;
		}
			



	</style>
		
</head>
<body>
	<div id="cadForm">
		<form action="processa_cadastro.php" method="POST">

			<h1><span class="week">Week</span><span class="summ">Summ</span></h1>

			<input type="email" name="email" required placeholder="Email"><br>
			<input type="text" name="name" required placeholder="Nome"><br>
			<input type="text" name="username" required placeholder="username"><br>
			<input type="password" name="senha" placeholder="Senha"><br>
			<p><b>Idade</b></p><select name="age">
				<?php for ($i=0; $i <= 80 ; $i++) { 
					echo "
						<option> $i </option>
					"; }?> 
			</select><br>
			<input type="submit" name=""><br>
			<a href="login.php" class="login">Login</a>
		</form>
	</div>
</body>