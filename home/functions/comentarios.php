<?php
require 'conn.php';
require 'session.php';

extract($_POST);

if($id_post == "" AND $reply == ""){
    echo "
	<script>  
		Swal.fire({
		icon: 'warning',
		title: 'Atenção',
		text: 'Algo está errado',
		});
	</script>
	";
	die(); 
}

$query = "INSERT INTO comentarios (id_post_resposta, id_aluno_resposta, resposta, data_resposta) VALUES (:id_post,:id_aluno,:resposta,now())";
$res = $pdo->prepare($query);
$res->execute(array(
    ':id_post'=>$id_post,
    ':id_aluno'=>$usuarioID,
    ':resposta'=>$reply
));

?>