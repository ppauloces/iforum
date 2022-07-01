<?php
require 'conn.php';
require 'session.php';
require 'class.upload.php';

$pubs = $pdo->prepare("SELECT * FROM post ORDER BY id_post DESC");
//$pubs->bindParam(':num_matricula_aluno', $colname_Usuario);
$pubs->execute();
$res_pubs = $pubs->rowCount();



while($pub = $pubs->fetch( PDO::FETCH_ASSOC )){

	if($pub['texto_post'] == 'https:'.$pub['texto_post']){
		$pub['texto_post'] = '<a href='.$pub['texto_post'].'>'.$pub['texto_post'].'</a>';
	}
	echo '<br>';
	if($pub['media_post'] <> ""){
		echo '<div class="card gedf-card">
		<div class="card-header">
		<div class="d-flex justify-content-between align-items-center">
		<div class="d-flex justify-content-between align-items-center">
		<div class="mr-2">
		<img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
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
		<div class="d-flex justify-content-between align-items-center">
		<div class="d-flex justify-content-between align-items-center">
		<div class="mr-2">
		<img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
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