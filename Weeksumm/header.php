
<?php 
	include('db.php');
	session_start();

	if (!isset($_SESSION['login'])) {
		header("location: login.php");
	}


	//verifica adm;
	$VADM = mysqli_query($connect, "SELECT * FROM users WHERE ADM = 1");


	$emailSession = $_SESSION['login'];

	//verificar user id;
	$VUI = "SELECT * FROM users WHERE `email` = '$emailSession'";
	$query = mysqli_query($connect, $VUI);

	while ($queryy=mysqli_fetch_assoc($query)) {
		$_SESSION['id_user'] = $queryy["id_user"];
	}

	include('processListPage.php');
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--FONT AWESOME-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
	<!---//FONT AWESOME-->

		<style>
			*{
				margin: 0;padding: 0;
			}

			ul{ list-style: none; }
			li{float: left;}

			.inputSearch{
				display: flex;
				justify-content: flex-end;
				margin-right: 20px;
			}
			.inputSearchMobile{
				display: flex;
				justify-content: center;
			}
			#headerPrincipal{
				display: flex;
				background: #D8D8D8;
			}
			.metade{
				flex-grow: 4.5;
			}
			nav{
				display: flex;
				justify-content: flex-end;
				font-size: 23px;
			}
			.navMobile{
				display: flex;
				justify-content: center;
				font-size: 15px;
			}
			nav ul li{
				margin: 20px 10px 10px 10px;
				color: black;
			}

			.searchInput{
				flex-grow: 0.1;
				outline: none;
				font-size: 20px;
				border-radius: 5px;
				border: 0;
				box-shadow: 2px 2px 5px #848484;
				height: 30px;
				margin-top: 10px;
			}
			.searchButton{
				background: #00FFFF;
				padding: 10px;
				margin-left: 10px;
				border: none;
				border-radius: 2px;
				box-shadow: 2px 2px 5px #848484;
				height: 30px;
				margin-top: 10px;
			}

			li a:hover{
				border-bottom: 3px solid blue;
			}
			.active{
				border-bottom: 3px solid red;
			}

			.btnAdicionais{
				float: right;
				height: 50px;
				position: fixed;
				margin: 30px 0 0 30px;
			}

			.btnAdicionais button{
				margin: 0 10px 0 0;
				border-radius: 30px;
				height: 40px;
				width: 40px;
				outline: none;
				border: 0;
				box-shadow: 3px 3px 10px #848484;
				transition: 0.3s;
				background: rgba(255,255,255,0.4);
			}

			.btnAdicionais button:hover{
				transform: translateY(-10px);
				box-shadow: 3px 17px 10px #A4A4A4;
			}
			a{
				text-decoration: none;
				color: black;
			}
			nav ul li a{
				padding: 10px;
			}
			button:focus{
				outline: none;
			}


			/* MENU CONFIGS */
			.menuConfig{
				display: flex;
				flex-grow: 1;
				justify-content: flex-end;
			}
			.menuConfig a:hover{
				background: #E6E6E6;
			}
			.menuConfig a{
				padding: 10px;
			}
			
			.itens-menuConfig{
				display: flex;
				margin: 10px;
			}
			.itens-menuConfig a{
				margin: 10px;
				font-size: 20px;
				color: black;
				text-decoration: none;
			}


			.menuConfigHamburguer{
				background: #424242;
				position: absolute;
				height: 200px;
				width: 200px;
				right: 10px;
				top: 60px;
				font-size: 25px;
				padding: 15px;
				overflow: auto;
			}
			.menuConfigHamburguer a{
				display: block;
				margin-bottom: 10px;
				color: white;
			}

			#carteira{
				margin-top: 10px;
				background: #A4A4A4;
				padding: 10px;
			}
			


			/* ----//MENU CONFIGS */
		</style>
</head>
<body onresize="reajusteMobile();">

	<header>
		<div id="headerPrincipal">
			<div class="metade">
				<div id="inputSearch" class="inputSearch">
					<input class="searchInput" type="text" name="search" disabled="" placeholder="não funciona por enquanto">
					<button class="searchButton"><i class="fas fa-search"></i> </button>
					<button class="searchButton" onclick="Hamburguer()" id="btnHamburguer"><i class="fas fa-bars"></i></button>
				</div>


				<nav id="navPrincipal">
					<ul>
						
						<li><a href="home.php?home" <?if(isset($_GET['home'])){echo "class='active' ";}?>>home</a></li>
						<li><a href="index.php?recentes" <?if(isset($_GET['recentes'])){echo "class='active' ";}?>>Recentes</a></li>
						<li><a href="bombando.php?bombando" <?if(isset($_GET['bombando'])){echo "class='active' ";}?>>Bombando</a></li>
						<li><a href="" id="perfil">perfil</a></li>
					</ul>
				</nav>


			</div>
			<div class="menuConfig" id="menuConfig" style="display: none;">
				<div class="itens-menuConfig" id="item-config">
					<a href="#">Ajuda</a>
					<a href="#">Feedback</a>
					<a href="#">Configurações</a>
					<a href="#" id="perfilMC">perfil</a>
					<a href="#" id="carteira">Carteira: <?while($weekP=mysqli_fetch_assoc($weekpoints)){echo "<span style='color: blue;'>".$weekP['weekpoints']."</span>";}?> W$</a>
					<a href="logout.php" id="loginBTN">Login/Logout</a>

				</div>
			</div>


		</div>


		<div id="btnAdd"class="btnAdicionais">
				<button onclick="window.location.href='pub_creator.php'"><i class="fas fa-pen" style="font-size: 20px;"></i></button>

			</div>


	</header>
		<div style="height: 100px;"></div>

		<script>

			function reajusteMobile(){
				let height = window.innerHeight;
				let width = window.innerWidth;
				let menuConfig = document.getElementById('menuConfig');
				let inputSeach = document.getElementById('inputSearch');
				let itenConfig = document.getElementById('item-config');
				let navPrincipal = document.getElementById('navPrincipal');
				if (width <= 799) {
					itenConfig.classList.remove('itens-menuConfig');
					menuConfig.classList.remove('menuConfig');
					menuConfig.classList.add('menuConfigHamburguer');
					inputSearch.classList.remove('inputSearch');
					inputSearch.classList.add('inputSearchMobile');
					document.getElementById('perfilMC').style.display = 'inline';
					document.getElementById('perfil').style.display = 'none';
					document.getElementById('btnHamburguer').style.display = 'inline';
					navPrincipal.classList.add('navMobile');


				}else if (width>=800) {
					itenConfig.classList.add('itens-menuConfig');
					menuConfig.classList.add('menuConfig');
					menuConfig.classList.remove('menuConfigHamburguer');
					inputSearch.classList.add('inputSearch');
					inputSearch.classList.remove('inputSearchMobile');
					document.getElementById('perfilMC').style.display = 'none';
					document.getElementById('perfil').style.display = 'inline';
					document.getElementById('btnHamburguer').style.display = 'none';
					menuConfig.style.display = 'block';
					navPrincipal.classList.remove('navMobile');


				}
			}
			reajusteMobile();


				function Hamburguer(){
					let hamburguer = document.getElementById('menuConfig');
				if (hamburguer.style.display == 'block'){
					hamburguer.style.display = 'none';
				}else{
					hamburguer.style.display = 'block';
					}
				}
			

		</script>

</body>
</html>
