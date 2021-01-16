<?php 
	include('db.php');
	include("login_class.php");

	$email = $_POST["email"];
	$name = $_POST["name"];
	$age = $_POST["age"];
	$username =$_POST["username"];
	$senha = $_POST["senha"];

	$cadastrar = new Formulario("users", $connect);
	$cadastrar->cadastro($email,$name, $age, $username, $senha);


 ?>