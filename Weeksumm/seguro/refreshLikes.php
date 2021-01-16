<?php 

	include("db.php");

	$query = mysqli_query($connect, "SELECT * FROM `pubs_home`");

	while ($queryy=mysqli_fetch_assoc($query)) {
		$queryLikes = mysqli_query($connect, "SELECT * FROM `like_comments` WHERE `like` = true AND `id_pub` = ".$queryy['id_pub']);
		$likesRow = mysqli_num_rows($queryLikes);

		$rate = intval($likesRow/10);

		$likeUpdate = mysqli_query($connect, "UPDATE pubs_home SET `likes` = $likesRow where `id_pub` = ".$queryy['id_pub']);

		$rateUpdate = mysqli_query($connect, "UPDATE pubs_home SET `rate` = $rate where `id_pub` = ".$queryy['id_pub']);
	}
	
 ?>