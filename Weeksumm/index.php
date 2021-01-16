<?php 
	include('header.php');
	include('processListPage.php');


?>
<head>
	<link rel="stylesheet" type="text/css" href="pub.css">
	<script src="index.js"></script>
</head>
<body>
	<div id="publicacoes">

				<? while ($pubRecentes=mysqli_fetch_assoc($recentes)) {

			 		$pubRecentes["date"];
			 		$data = str_replace('-','/',$pubRecentes["date"]);
			 		$dataa = explode(" ", $data);

 				?>

					<div class="pages" style="background: url(<? echo "upload/".$pubRecentes['images']; ?>); background-size: 200%;">
										<div class="title-subtitle">
											<i class="fas fa-flag report"></i>
											<div class="title"><? echo $pubRecentes['title']; ?></div>
											<div class="subtitle"><? echo $pubRecentes['subtitle']; ?></div>
										</div>
										<!--bot pub-->
										<div class="bot-pub">

												<div class="content-bot">
													<div class="bottom">
														<div class="data">
															<? echo $dataa[0]; ?>
															<br>
														</div>

														<div class="user-btn-rate">
															<a href="" class="user"><?echo $pubRecentes['username'];?></a>
															<button onclick="window.location.href = 'sites/<?echo $pubRecentes['url_pub'];?>'">LER</button>
															<i class="fas fa-fire">1</i>

														</div>


													</div>
														<!--like comment-->
													<div class="like-comment">
														<div class="like">
															<button onclick="like('<?echo $pubRecentes['id_pub']?>','<?echo $_SESSION['id_user'];?>' )"><i class="fas fa-arrow-up" class="likes" id="<? echo $pubRecentes['id_pub']; ?>"><? echo $pubRecentes['likes']; ?></i></button>
														</div>
														<div class="comment">
															<button><i class="fas fa-comment"><? echo $pubRecentes['comments']; ?></i></button>
														</div>
													</div>
														<!--like comment-->
												</div>
										</div>
										<!--bot pub-->
							
							</div>

			<!--PAGES-->

			

			<?}?>
	</div>


	<div class="popup">
		
		<h1>DENUNCIAR</h1>

	</div>





	

</body>