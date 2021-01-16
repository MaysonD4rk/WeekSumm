<?php include("header.php"); 

?>

<link rel="stylesheet" type="text/css" href="pub.css">
<script src="index.js"></script>

<div id="publicacoes">


<? while ($bomb=mysqli_fetch_assoc($bombando)) {

			 		$bomb["date"];
			 		$data = str_replace('-','/',$bomb["date"]);
			 		$dataa = explode(" ", $data);

 				?>

					<div class="pages" style="background: url(<? echo "upload/".$bomb['images']; ?>); background-size: 200%;">
										<div class="title-subtitle">
											<i class="fas fa-flag report"></i>
											<div class="title"><? echo $bomb['title']; ?></div>
											<div class="subtitle"><? echo $bomb['subtitle']; ?></div>
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
															<a href="" class="user"><?echo $bomb['username'];?></a>
															<button onclick="window.location.href = 'sites/<?echo $bomb['url_pub'];?>'">LER</button>
															<i class="fas fa-fire">1</i>

														</div>


													</div>
														<!--like comment-->
													<div class="like-comment">
														<div class="like">
															<button onclick="like('<?echo $bomb['id_pub']?>','<?echo $_SESSION['id_user'];?>' )"><i class="fas fa-arrow-up" class="likes" id="<? echo $bomb['id_pub']; ?>"><? echo $bomb['likes']; ?></i></button>
														</div>
														<div class="comment">
															<button><i class="fas fa-comment"><? echo $bomb['comments']; ?></i></button>
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

