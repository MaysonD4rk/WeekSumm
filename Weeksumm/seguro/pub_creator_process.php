<?php 
		
		include('db.php');


	session_start();

	echo 'ola mundo';

	$title = $_POST['title'];
	$subtitle = $_POST['subtitle'];
	$content = $_POST['content'];
	$theme = $_POST['theme'];
	$location = $_POST['location'];

	if ($_FILES["file"]["error"]>0) {
		 date_default_timezone_set('America/Sao_Paulo');
			$hoje = date("y-m-d H:i:s");
			$num = rand(0, 10000000);
			$url = $num."_".$num.".php";

			$verificaURL = mysqli_query($connect ,"SELECT * FROM `pub_create` WHERE `url_pub` = '$url'");

			while(mysqli_num_rows($verificaURL) >= 1) {
				$num2 = rand(0, 10000000);
				$url = $num2."_".$_SESSION['id_user']."_$title.php";
			}



			if (strlen($content)<300) {
				echo "escreva alguma coisa seu merda";
			}else{
				$query = "INSERT INTO pub_create(`id_user`, `url_pub`,`title`,`subtitle`,`pub_text`,`theme`,`date`,`location`)VALUES(".$_SESSION['id_user'].", '$url','$title', '$subtitle', '$content', $theme, '$hoje','$location' )";

				$queryHome = "INSERT INTO pubs_home(`id_user`,`url_pub`,`likes`,`rate`,`comments`)VALUES(".$_SESSION['id_user'].",'$url',0,0,0)";
				$data = mysqli_query($connect, $query)or die();
				$dataa = mysqli_query($connect, $queryHome)or die();

				if ($data) {
					
				$contentSite = "<?php 
						include('../header.php');
								?>
							 <!DOCTYPE html>
							 <html>
							 <head>
							 	<title>$title</title>
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
							 			word-wrap: break-word;
							 		}
							 		#conteudoCap{
							 			background: #E6E6E6;
							 			padding: 0;
							 		}
							 	</style>
							 </head>
							 <body>

							 	<div id='conteudo_principal'>
							 		<div id='conteudoCap'>
									 			<h1 id='titulo'>$title</h1>
									 		<div id='imagem'>
									 			<br><br>
									 			<div>
									 				<h3 id='subtitulo'>$subtitle</h3>
									 			</div>
									 		</div><br><br><br>
									 		<div id='conteudo'>
									 			$content
									 		</div>
									 </div>

							 	</div>
							 
							 	<script>
							 		document.getElementById('btnAdd').style.display='none';
							 	</script>

							 </body>
							 </html>";



					$site = fopen("sites/$url", "a");
						fwrite($site, $contentSite);
						header("location: sites/$url");


				 }else{
				 	echo 'deu erro.';
				 }
			}
		
		}else{
			$n = rand(0, 1000000);
			$img = $n.$_FILES["file"]["name"];
			 date_default_timezone_set('America/Sao_Paulo');
			$hoje = date("y-m-d H:i:s");
			$num = rand(0,10000000);

			$url = $num."_$title.php";

			$verificaURL = mysqli_query($connect ,"SELECT * FROM pub_create WHERE `url_pub` = '$url'");

			while(mysqli_num_rows($verificaURL) >= 1) {
				$url = $num."_".$_SESSION['id_user']."_$title.php";
			}

			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$img);

			if (strlen($content)<300) {
				echo 'é menor';
			}else {
				$queryPub = "INSERT INTO pub_create(`id_user`, `url_pub`,`title`, `subtitle`,`pub_text`,`images`,`theme`,`date`,`location`)VALUES(".$_SESSION['id_user'].", '$url','$title', '$subtitle', '$content', '$img', $theme, '$hoje', '$location' )";

				$queryHome = "INSERT INTO pubs_home(`id_user`,`url_pub`,`likes`,`rate`,`comments`)VALUES(".$_SESSION['id_user'].",'$url',0,0,0)";


				$data = mysqli_query($connect, $queryPub)or die();
				$dataa = mysqli_query($connect, $queryHome)or die();
				if ($data && $dataa){


				$contentSite = "<?php 
						include('../header.php');
								?>
							 <!DOCTYPE html>
							 <html>
							 <head>
							 	<title>$title</title>
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
							 			word-wrap: break-word;
							 		}
							 		#conteudoCap{
							 			background: #E6E6E6;
							 			padding: 0;
							 		}
							 	</style>
							 </head>
							 <body>

							 	<div id='conteudo_principal'>
							 		<div id='conteudoCap'>
									 			<h1 id='titulo'>$title</h1>
									 		<div id='imagem'>
									 			<img src='../upload/$img' height='500px'>
									 			<br><br>
									 			<div>
									 				<h3 id='subtitulo'>$subtitle</h3>
									 			</div>
									 		</div><br><br><br>
									 		<div id='conteudo'>
									 			$content
									 		</div>
									 </div>

							 	</div>
							 
							 	<script>
							 		document.getElementById('btnAdd').style.display='none';
							 	</script>

							 </body>
							 </html>";



					$site = fopen("sites/$url", "a");
						fwrite($site, $contentSite);
						header("location: sites/$url");
				}else{
					echo "deu erro";
				}
			}

			/*if (strlen($content)<300) {
				echo "<h3>Escreva alguma coisa seu bosta</h3>";
			}else{
				$queryY = "INSERT INTO pub_create(`id_user`,`title`, `subtitle`,`pub_text`,`images`,`theme`,`date`,`location`)VALUES(1, '$title', '$subtitle', '$content', `$img`, $theme, '$hoje', '$location' )";
				$data = mysqli_query($connect, $queryY)or die();
				if ($data) {
				 	header("location: index.php");
				 }else{
				 	echo 'deu erro.';
				 }
		}*/
	}

 ?>