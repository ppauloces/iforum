<?php 
require 'conn.php';
require 'session.php';

$id_aluno_para = $_POST['postdata'];
$id_aluno_de = $row_verifica['id_aluno'];


if($id_aluno_para == $id_aluno_de){
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
		'id_aluno_de' => $id_aluno_de,
		'id_aluno_para' => $id_aluno_para
	]); 
	$res_verifica_amzd = $amizade->rowCount();
	$row_verifica_amzd = $amizade->fetchAll(PDO::FETCH_ASSOC);

	if($res_verifica_amzd == 0){
		$sql = "INSERT INTO amizade (id_aluno_de, id_aluno_para) VALUES (?,?)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$id_aluno_de, $id_aluno_para]);
		
		$res_verifica_amzd == 1;
		echo $res_verifica_amzd;

	}else if($res_verifica_amzd > 0){
		$amizade = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para=:id_aluno_para AND id_aluno_de=:id_aluno_de");
		$amizade->execute([
			'id_aluno_de' => $id_aluno_de,
			'id_aluno_para' => $id_aluno_para
		]); 
		$res_verifica_amzd = $amizade->rowCount();
		$row_verifica_amzd = $amizade->fetch(PDO::FETCH_ASSOC);

		$id = $row_verifica_amzd['id_amzd'];

		$sql = "DELETE FROM amizade WHERE id_amzd=:id";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([
			'id' => $id
		]);
		$res_verifica_amzd == 0;
		echo $res_verifica_amzd;

		}



/*
$new_amizade = $pdo->prepare("INSERT INTO amizade (id_aluno_de, id_aluno_para) VALUES (':id_aluno_de',':id_aluno_para')");
$new_amizade->execute(array(
	':id_aluno_de' => $id_aluno_de,
	':id_aluno_para' => $id_aluno_para
));
*/




?>