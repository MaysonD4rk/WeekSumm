function like(id_pub, id_user){
				const xhr = new XMLHttpRequest();


			xhr.open("POST", "processa_like.php");
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			console.log(xhr);
			xhr.send("id_pub="+id_pub+"&id_user="+id_user);

			xhr.onload = function(){

				const likes = document.getElementById(id_pub);
				likes.innerHTML = xhr.responseText

			}
	}



function likeRefresh(){
	const xhr = new XMLHttpRequest();

	xhr.open("GET","refreshLikes.php");

	//xhr.onload = function(){

	//			const likes = document.getElementById(id_pub);
	//			likes.innerHTML = xhr.responseText

	//		}


	xhr.send();
	console.log(xhr);

}

likeRefresh();