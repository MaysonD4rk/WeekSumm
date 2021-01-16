<?php 
		
	
	define("host", 'localhost');
	define('user', 'root');
	define('pass', '');
	define('database', 'weeksumm');


	$connect = mysqli_connect(host, user, pass, database) or die("Não foi possível se conectar ao banco de dados");


 ?>