<?php 
require 'conn.php';

$assunto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT * FROM alunos WHERE nome_aluno LIKE '%".$assunto."%' OR name_user_aluno LIKE '%".$assunto."%' ORDER BY nome_aluno AND name_user_aluno ASC LIMIT 7";

//Seleciona os registros
$resultado_msg_cont = $pdo->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_msg_cont['nome_aluno'];
    $data[] = $row_msg_cont['name_user_aluno'];
}

echo json_encode($data);

/*
if(!isset($_GET['busca_aluno'])){
	//header("Location: ../index.php");
	//exit;
}else {

if($_GET['busca_aluno'] == ''){
	exit();
}else{
//$nomeAluno = "%".trim($_GET['busca_aluno'])."%";
$nomeAluno = filter_input(INPUT_GET, 'term',FILTER_SANITIZE_STRING);
/*$buscaAluno = $pdo->prepare('SELECT * FROM alunos WHERE nome_aluno LIKE :nome_aluno');
$buscaAluno->bindParam(':nome_aluno', $nomeAluno, PDO::PARAM_STR);
$buscaAluno->execute();
$resBuscaAluno = $buscaAluno->fetchAll(PDO::FETCH_ASSOC);

foreach($resBuscaAluno as $alunoLoop){
	echo $alunoLoop['nome_aluno'];
}
}


}

}
*/
?>
