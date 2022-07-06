<?php 
require 'conn.php';
require 'session.php';

$id_aluno_para = $_POST['postdata'];
$id_aluno_de = $row_verifica['id_aluno'];

/*
$new_amizade = $pdo->prepare("INSERT INTO amizade (id_aluno_de, id_aluno_para) VALUES (':id_aluno_de',':id_aluno_para')");
$new_amizade->execute(array(
	':id_aluno_de' => $id_aluno_de,
	':id_aluno_para' => $id_aluno_para
));
*/

$sql = "INSERT INTO amizade (id_aluno_de, id_aluno_para) VALUES (?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id_aluno_de, $id_aluno_para]);

?>