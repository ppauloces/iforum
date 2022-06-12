<?php
require 'conn.php';

extract($_POST);

	if($_FILES['file'] > 0){
		$texto = $_POST['post_text'];
		$hoje = date("Y-m-d");
		echo $post_text;
		die();
		if($texto == ""){
			echo "<script>  
			Swal.fire({
				icon: 'warning',
				title: 'Atenção',
				text: 'Você precisa preencher todos os campos!',
				});
				</script>";

			}else{
				$post = $pdo->prepare("INSERT INTO post (id_usuario, texto_post,data) VALUES (:id_usuario,:texto_post,:data)");
				$post->execute(array(
					':id_usuario' => $row_verifica['id_aluno'],
					':texto_post' => $texto,
					':data' => $hoje
				));
			}
		}else if($_FILES['file']['error'] == 0){
			$ext = rand(0,1000000);
			$img = $ext.$_FILES['file']['name'];

			move_uploaded_file($_FILES['file']['tmp_name'], "uploads/posts/".$img);

			$texto = $_POST['post_text'];
			$hoje = date("Y-m-d");

			$post = $pdo->prepare("INSERT INTO post (id_usuario, texto_post, media_post,data) VALUES (:id_usuario,:texto_post, :media_post,:data)");
			$post->execute(array(
				':id_usuario' => $row_verifica['id_aluno'],
				':texto_post' => $texto,
				':media_post' => $img,
				':data' => $hoje
			));
		}


?>