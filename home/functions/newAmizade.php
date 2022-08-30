<?php 
require 'conn.php';
require 'session.php';

extract($_POST);

if($eu == $ele){
	echo "<script>  
	Swal.fire({
		icon: 'warning',
		title: 'Atenção',
		text: 'Você não pode seguir você mesmo!',
		});
		</script>";
		die();
	}


	$amizade = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para=:id_aluno_para AND id_aluno_de=:id_aluno_de");
	$amizade->execute([
		'id_aluno_de' => $eu,
		'id_aluno_para' => $ele
	]); 
	$res_verifica_amzd = $amizade->rowCount();
	$row_verifica_amzd = $amizade->fetch(PDO::FETCH_ASSOC);
	
	foreach($row_verifica_amzd as $amzd){
		echo $amzd['status'];
		die();
	if($res_verifica_amzd == 0){
		$sql = "INSERT INTO amizade (id_aluno_de, id_aluno_para,status) VALUES (?,?,?)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$eu, $ele,0]);
		
		$res_verifica_amzd == 1;
		echo "Pendente";
	}

	if($res_verifica_amzd == 1){
		$amizade = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para=:id_aluno_para AND id_aluno_de=:id_aluno_de");
		$amizade->execute([
			'id_aluno_de' => $eu,
			'id_aluno_para' => $ele
		]); 
		$res_verifica_amzd = $amizade->rowCount();
		$row_verifica_amzd = $amizade->fetch(PDO::FETCH_ASSOC);

		$id = $row_verifica_amzd['id_amzd'];
		
		$sql = "DELETE FROM amizade WHERE id_amzd=:id";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([
			'id' => $id
		]);
		
		echo "Seguir";


		}

}
	die;

/*
$new_amizade = $pdo->prepare("INSERT INTO amizade (id_aluno_de, id_aluno_para) VALUES (':id_aluno_de',':id_aluno_para')");
$new_amizade->execute(array(
	':id_aluno_de' => $id_aluno_de,
	':id_aluno_para' => $id_aluno_para
));
*/




?>