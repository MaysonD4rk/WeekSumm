<?php 
	session_start();


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		*{
			margin: 0;
			padding: 0;
			border: none;
		}
		#loginForm{
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
				#loginForm{
				height: 640px;
			}
			input{
			width: 250px;
			}
		}
		@media screen(min-width: 411px), (min-height: 731px){
				#loginForm{
				height: 731px;
			}
			input{
			width: 300px;
			}
		}

		@media screen(min-width: 411px), (min-height: 823px){
				#loginForm{
				height: 823px;
			}

		}
		@media screen(min-width: 320px), (min-height: 568px){
				#loginForm{
				height: 568px;
			}
			input{
			width: 200px;
			}
		}

		.cadastre-se{
			color: blue;
		}
			



	</style>

	<link rel="stylesheet" type="text/css" href="fontFace.css">

</head>
<body>


		<div id="logo">
		</div>
	<div id="loginForm">
		<form action="processa_login.php" method="POST">
			<h1><span class="week">Week</span><span class="summ">Summ</span></h1>
			<input type="email" name="login" required placeholder="Email"><br>
			<input type="password" name="senha" placeholder="Senha"><br>
			<input type="submit"><br>
			<a href="cadastro.php" class="cadastre-se">cadastre-se</a>
		</form>
	</div>


</body>