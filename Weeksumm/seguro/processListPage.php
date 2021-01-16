<?php

	$selectPubHome = mysqli_query($connect, "SELECT * FROM pubs_home INNER JOIN pub_create ON(`pubs_home`.id_pub = `pub_create`.id_pub) inner JOIN users ON(`pub_create`.id_user = `users`.id_user) WHERE home = 1");

	$weekpoints = mysqli_query($connect, "SELECT weekpoints FROM users WHERE id_user =".$_SESSION['id_user']);


	$bombando = mysqli_query($connect, "SELECT * FROM pubs_home INNER JOIN pub_create ON(`pubs_home`.id_pub = `pub_create`.id_pub) inner JOIN users ON(`pub_create`.id_user = `users`.id_user) order by pubs_home.`rate` DESC");


	$recentes = mysqli_query($connect, "SELECT * FROM pubs_home INNER JOIN pub_create ON(`pubs_home`.id_pub = `pub_create`.id_pub) inner JOIN users ON(`pub_create`.id_user = `users`.id_user) order by pub_create.`date` DESC");

 ?>