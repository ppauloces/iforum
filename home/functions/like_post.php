<?php 
require 'conn.php';
require 'session.php';

extract($_POST);
if($id_post == ""){
    echo "
	<script>  
		Swal.fire({
		icon: 'warning',
		title: 'Erro',
		text: 'Ocorreu um erro inesperado',
		});
	</script>";
	die();
}

$verifica_query = "SELECT * FROM count_likes WHERE id_post=:id_post AND id_curtiu=:id_curtiu";
$verifica = $pdo->prepare($verifica_query);
	$verifica->execute([
		'id_post' => $id_post,
		'id_curtiu' => $usuarioID
	]); 
$res_verifica_like = $verifica->rowCount();

if($res_verifica_like == 1){

    $sql = "DELETE FROM count_likes WHERE id_post=:id_post AND id_curtiu=:id_curtiu";
		$stmt= $pdo->prepare($sql);
        $stmt->execute(array(
            ':id_post' => $id_post,
            ':id_curtiu' => $usuarioID
        )); 
    echo '<button class="card-link" id="like" id_post='. $id_post .' style="all: unset;cursor:pointer"><div id="exibe"><i class="icon-thumbs-o-up"></i> Concordo com você</div></button>';
    die();
}

if($res_verifica_like == 0){
    $sql = "INSERT INTO count_likes (id_curtiu, id_post, data_curtida) VALUES (:id_curtiu,:id_post,now())";
		$stmt= $pdo->prepare($sql);
        $stmt->execute(array(
            ':id_post' => $id_post,
            ':id_curtiu' => $usuarioID
        )); 
    
        $verifica_like = $pdo->prepare("SELECT COUNT(id_count) AS qnt_likes FROM count_likes WHERE id_post = :id_post");
        $verifica_like->execute(array(
            ':id_post'=>$id_post
        ));
        $qnt_likes = $verifica_like->fetch(PDO::FETCH_ASSOC);

        $countLike = $qnt_likes['qnt_likes'] -1;
        if($countLike == 0){
            echo '<button class="card-link" id="like" id_post='. $id_post .' style="all: unset;cursor:pointer"><div id="exibe"><i class="fa fa-thumbs-up"></i> Somente você concordou, por enquanto</div></button>';
            die();
        }elseif($countLike == 1){
            echo '<button class="card-link" id="like" id_post='. $id_post .' style="all: unset;cursor:pointer"><div id="exibe"><i class="fa fa-thumbs-up"></i> Você, e mais '.$countLike.' pessoa concordaram</div></button>';
            die();
        }elseif($countLike > 1){
            echo '<button class="card-link" id="like" id_post='. $id_post .' style="all: unset;cursor:pointer"><div id="exibe"><i class="fa fa-thumbs-up"></i> Você, e mais '.$countLike.' pessoas concordaram</div></button>';
            die();
        }
}


?>