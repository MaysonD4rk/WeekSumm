<?php 
	include("db.php");

	$pub = $_POST['id_pub'];
	$user = $_POST['id_user'];

	$query = mysqli_query($connect, "SELECT * FROM like_comments where `id_user` = $user AND `id_pub` = $pub");

	if (mysqli_num_rows($query)>=1) {
		while($queryy=mysqli_fetch_assoc($query)) {
			if ($queryy['like']==true && $queryy['comment']=='') {
				mysqli_query($connect, "DELETE FROM like_comments WHERE `like` = 1 AND `id_user` = $user AND `id_pub` = $pub");
			}elseif ($queryy['like']==false && $queryy['comment']=='') {
				mysqli_query($connect, "UPDATE like_comments SET `like` = 1 WHERE `id_user` = $user AND `id_pub` = $pub");
			}elseif ($queryy['like']==true && !$queryy['comment']=='') {
				mysqli_query($connect, "UPDATE like_comments SET `like` = 0  WHERE `id_user` = $user AND `id_pub` = $pub");
			}elseif ($queryy['like']==false && !$queryy['comment']=='') {
				mysqli_query($connect, "UPDATE like_comments SET `like` = 1 WHERE `id_user` = $user AND `id_pub` = $pub");
				}
	}}else{
		mysqli_query($connect, "INSERT INTO like_comments(id_user, id_pub,`like`)VALUES($user, $pub, TRUE)");
	}


	$qtdLikes = mysqli_query($connect, "SELECT * FROM like_comments WHERE `id_pub` = $pub AND `like` = TRUE");

	$likesRow = mysqli_num_rows($qtdLikes);

	$queryUpdate = mysqli_query($connect ,"UPDATE pubs_home SET `likes` = $likesRow  where `id_pub` = $pub");


	//likes atualizados
	$atzLikes =  mysqli_query($connect ,"SELECT `likes` from pubs_home where `id_pub` = $pub");

	while ($atzL=mysqli_fetch_assoc($atzLikes)) {
		echo $atzL['likes'];
	}


 ?>