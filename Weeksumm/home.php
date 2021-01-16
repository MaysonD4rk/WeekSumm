<?php include('header.php') ?>


<link rel="stylesheet" type="text/css" href="pub.css">
<script src="index.js"></script>

<div id="publicacoes">


<? while ($pub=mysqli_fetch_assoc($selectPubHome)) {

			 		$pub["date"];
			 		$data = str_replace('-','/',$pub["date"]);
			 		$dataa = explode(" ", $data);

 				?>

					<div class="pages" style="background: url(<? echo "upload/".$pub['images']; ?>); background-size: 200%;">
										<div class="title-subtitle">
											<i class="fas fa-flag report"></i>
											<div class="title"><? echo $pub['title']; ?></div>
											<div class="subtitle"><? echo $pub['subtitle']; ?></div>
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
															<a href="" class="user"><?echo $pub['username'];?></a>
															<button onclick="window.location.href = 'sites/<?echo $pub['url_pub'];?>'">LER</button>
															<i class="fas fa-fire">1</i>

														</div>


													</div>
														<!--like comment-->
													<div class="like-comment">
														<div class="like">
															<button onclick="like('<?echo $pub['id_pub']?>','<?echo $_SESSION['id_user'];?>' )"><i class="fas fa-arrow-up" class="likes" id="<? echo $pub['id_pub']; ?>"><? echo $pub['likes']; ?></i></button>
														</div>
														<div class="comment">
															<button><i class="fas fa-comment"><? echo $pub['comments']; ?></i></button>
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

