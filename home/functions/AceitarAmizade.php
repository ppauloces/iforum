<?php 
require 'conn.php';
require 'session.php';

extract($_POST);

$amizade = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para=:id_aluno_para AND id_aluno_de=:id_aluno_de");
		$amizade->execute([
			'id_aluno_de' => $ele,
			'id_aluno_para' => $usuarioID
		]); 
		$res_verifica_amzd = $amizade->rowCount();
		$row_verifica_amzd = $amizade->fetch(PDO::FETCH_ASSOC);

		$id = $row_verifica_amzd['id_amzd'];
		
		$stmt = $pdo->prepare("UPDATE amizade SET id_amzd = :id_amzd, data_confirmacao = now(), situacao = 1");
		$stmt->execute([
			':id_amzd' => $id
		]);
		
        echo '
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 19">
          <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"></path>
      </svg>';
		echo "<script>window.location.reload();</script>";


?>