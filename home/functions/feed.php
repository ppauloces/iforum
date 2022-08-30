<?php
require 'conn.php';
require 'session.php';
require 'class.upload.php';

$pubs = $pdo->prepare("SELECT *,id_aluno FROM post,alunos WHERE id_aluno = id_usuario ORDER BY id_post DESC");
//$pubs->bindParam(':num_matricula_aluno', $colname_Usuario);
$pubs->execute();
$res_pubs = $pubs->rowCount();
$row_pubs1 = $pubs->fetchAll(PDO::FETCH_ASSOC);

$buscaAluno = $pdo->prepare('SELECT * FROM alunos');
//$buscaAluno->bindParam(':num_matricula_aluno', $colname_Usuario, PDO::PARAM_STR);
$buscaAluno->execute();
$resBuscaAluno = $buscaAluno->fetch(PDO::FETCH_ASSOC);
$rowBuscaAluno = $buscaAluno->rowCount();

/*
echo '
<style>

</style>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey">
    <div class="col-sm-12">
        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                    <img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#"><b>Ryan Haywood</b></a>
                        made a post.
                    </div>
                    <h6 class="text-muted time">1 minute ago</h6>
                </div>
            </div> 
            <div class="post-description"> 
                <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                <div class="stats">
                    <a href="#" class="btn btn-default stat-item">
                        <i class="fa fa-thumbs-up icon"></i>2
                    </a>
                    <a href="#" class="btn btn-default stat-item">
                        <i class="fa fa-share icon"></i>12
                    </a>
                </div>
            </div>
            <div class="post-footer">
                <div class="input-group"> 
                    <input class="form-control" placeholder="Add a comment" type="text">
                    <span class="input-group-addon">
                        <a href="#"><i class="fa fa-edit"></i></a>  
                    </span>
                </div>
                <ul class="comments-list">
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="https://bootdey.com/img/Content/user_1.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user">Gavino Free</h4>
                                <h5 class="time">5 minutes ago</h5>
                            </div>
                            <p>Sure, oooooooooooooooohhhhhhhhhhhhhhhh</p>
                        </div>
                        <ul class="comments-list">
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="https://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user">Ryan Haywood</h4>
                                        <h5 class="time">3 minutes ago</h5>
                                    </div>
                                    <p>Relax my friend</p>
                                </div>
                            </li> 
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="https://bootdey.com/img/Content/user_2.jpg" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user">Gavino Free</h4>
                                        <h5 class="time">3 minutes ago</h5>
                                    </div>
                                    <p>Ok, cool.</p>
                                </div>
                            </li> 
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
';
die();
*/

foreach($row_pubs1 as $pub){

	if($pub['foto_perfil'] == ""){
		$foto = "padrao.png";
	}else{
		$foto = $pub['foto_perfil'];
	}


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
		<a href="#" class="card-link"><i class="icon-thumbs-o-up"></i> Concordo com você</a>
		<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Up</a>
		<div class="input-group" style="padding-top:8px"> 
		<input class="form-control" placeholder="Add a comment" type="text">
		<span class="input-group-addon">
		<a href="#"><i class="fa fa-edit"></i></a>  
		</span>
		</div>
		</div>
		</div>';	
	}else{
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
		<a href="#" class="card-link"><i class="icon-thumbs-o-up"></i> Concordo com você</a>
		<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Up</a>
		<div class="input-group" style="padding-top:8px"> 
		<input class="form-control" placeholder="Adicionar um comentário" type="text">
		<span class="input-group-addon">
		<a href="#"><i class="fa fa-edit"></i></a>  
		</span>
		</div>
		</div>
		</div>';
	}
}