<?php 

	session_start();
	include("login_class.php");
	include("db.php");

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$ValidaLogin = new Formulario("users", $connect);
	$ValidaLogin->Logar($login, $senha, "email","password", "index.php", "login.php?login=erro");


?>