<?php
require 'conn.php';
require 'session.php';
require 'class.upload.php';

$pubs = $pdo->prepare("SELECT *,id_aluno FROM post,alunos WHERE id_aluno = id_usuario ORDER BY id_post DESC");
//$pubs->bindParam(':num_matricula_aluno', $colname_Usuario);
$pubs->execute();
$res_pubs = $pubs->rowCount();
$row_pubs1 = $pubs->fetch(PDO::FETCH_ASSOC);

$buscaAluno = $pdo->prepare('SELECT * FROM alunos');
//$buscaAluno->bindParam(':num_matricula_aluno', $colname_Usuario, PDO::PARAM_STR);
$buscaAluno->execute();
$resBuscaAluno = $buscaAluno->fetch(PDO::FETCH_ASSOC);
$rowBuscaAluno = $buscaAluno->rowCount();

if($row_pubs1['foto_perfil'] == ""){
	$foto = "padrao.png";
}else{
	$foto = $row_pubs1['foto_perfil'];
}

while($pub = $pubs->fetch( PDO::FETCH_ASSOC )){

	if($resBuscaAluno['num_matricula_aluno'] != $colname_Usuario){
		$dropPost = '
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item d-flex align-items-center" href="#">
		<i class="fa fa-share-alt" aria-hidden="true"></i>
		<span class="">&nbspCompartilhar</span>
		</a>
		</div>';
	}else{
		$dropPost = '
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item d-flex align-items-center" href="#">
		<i class="fa fa-trash" style="font-size:20px"></i>
		<span class="">&nbspDeletar</span>
		</a>
		<a class="dropdown-item d-flex align-items-center" href="#">
		<i class="fa fa-share-alt" aria-hidden="true"></i>
		<span class="">&nbspCompartilhar</span>
		</a>
		</div>
		';
	}
	echo '<br>';
	if($pub['media_post'] <> ""){
		echo '
		<div class="card gedf-card">
		<div class="card-header">
		<div class="float-right">
		<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
		<circle cx="12" cy="12" r="1"></circle>
		<circle cx="19" cy="12" r="1"></circle>
		<circle cx="5" cy="12" r="1"></circle>
		</svg>
		</button>
		'.$dropPost.'
		</div>
		<div class="d-flex justify-content-between align-items-center">
		<div class="d-flex justify-content-between align-items-center">
		<div class="mr-2">
		<img class="rounded-circle" width="45" src="uploads/'.$foto.'" alt="">
		</div>
		<div class="ml-2">
		<div class="h5 m-0">@'.$row_verifica['name_user_aluno'].'</div>
		<div class="h7 text-muted">'.$row_verifica['nome_aluno'].'</div>
		</div>
		</div>
		</div>
		</div>
		<div class="card-body">
		<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o">&nbsp</i>'.$pub['data'].'</div>
		<p class="card-text">            
		'.$pub['texto_post'].'
		</p>
		<img src="uploads/posts/'.$pub['media_post'].'" width="160" height="120"> 
		</div>
		<div class="card-footer">
		<a href="#" class="card-link"><i class="icon-thumbs-o-up"></i> Like</a>
		<a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
		<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
		<div class="dropdown">
		<i class="fa fa-ellipsis-v" aria-hidden="true" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
		
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="#">Action</a>
		<a class="dropdown-item" href="#">Another action</a>
		<a class="dropdown-item" href="#">Something else here</a>
		</div>
		</div>
		</div>
		</div>';	
	}else{
		echo '<div class="card gedf-card">
		<div class="card-header">
		<div class="float-right">
		<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
		<circle cx="12" cy="12" r="1"></circle>
		<circle cx="19" cy="12" r="1"></circle>
		<circle cx="5" cy="12" r="1"></circle>
		</svg>
		</button>
		'.$dropPost.'
		</div>
		<div class="d-flex justify-content-between align-items-center">
		<div class="d-flex justify-content-between align-items-center">
		<div class="mr-2">
		<img class="rounded-circle" width="55" src="uploads/'.$foto.'" alt="">
		</div>
		<div class="ml-2">
		<div class="h5 m-0">@'.$row_verifica['name_user_aluno'].'</div>
		<div class="h7 text-muted">'.$row_verifica['nome_aluno'].'</div>
		</div>
		</div>
		</div>
		</div>
		<div class="card-body">
		<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o">&nbsp</i>'.$pub['data'].'</div>
		<p class="card-text">            
		'.$pub['texto_post'].'
		</p>
		</div>
		<div class="card-footer">
		<a href="#" class="card-link"><i class="icon-thumbs-o-up"></i> Like</a>
		<a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
		<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
		</div>
		</div>';
	}
}