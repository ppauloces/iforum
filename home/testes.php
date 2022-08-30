<?php

$amizade = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para=:id_aluno_para AND id_aluno_de=:id_aluno_de");
$amizade->execute([
	'id_aluno_de' => $row_verifica['id_aluno'],
	'id_aluno_para' => $_GET['id']
]); 
$res_verifica_amzd = $amizade->rowCount();
$row_verifica_amzd = $amizade->fetchAll(PDO::FETCH_ASSOC);
foreach($row_verifica_amzd as $amz){

		if($amz['status'] == 0 OR $res_verifica_amzd == 0){
			$btnStatus = '<a id="seguir" eu="'.$row_verifica['id_aluno'].'" ele="'.$_GET['id'].'">Seguir</a>';
		}else{
			$btnStatus = '<a>Seguindo</a>';
		}

		echo $btnStatus;
	}



?>