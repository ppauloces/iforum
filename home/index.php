<?php 
require 'functions/conn.php';
require 'functions/session.php';
require 'functions/class.upload.php';

/*
QUERY PARA VERIFICAÇÃO DE SEGURANÇA
VAI VERIFICAR SE EXISTE O PERFIL, SE O CARA TENTAR ACESSAR E NÃO EXISTIR, IRA DESTRUIR A SESSÃO 
AO ENTRAR NO LAÇO
*/

$buscaAluno = $pdo->prepare('SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno');
$buscaAluno->bindParam(':num_matricula_aluno', $colname_Usuario);
$buscaAluno->execute();
$resBuscaAluno = $buscaAluno->fetch(PDO::FETCH_ASSOC);
$rowBuscaAluno = $buscaAluno->rowCount();

if($rowBuscaAluno == 0){
    header('Location: ../index.php?erro');
}

//QUERY PARA FILTRAR OS POSTS EXISTENTES
$pubs = $pdo->prepare("SELECT * FROM post ORDER BY id_post DESC");
//$pubs->bindParam(':num_matricula_aluno', $colname_Usuario);
$pubs->execute();
$res_pubs = $pubs->rowCount();
$row_pubs = $pubs->fetch( PDO::FETCH_ASSOC );


?>


<!doctype html>
    <html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>


        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">

        <!-- Bootstrap CSS -->

        <!-- Style Sidebar-->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/mystyle.css">

        <!--style index -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <style>

        </style>

        <title>Ifórum | Home</title>
    </head>
    <body onload="javascript:carregaFeed()">

        <?php include 'includes/sidebar.php' ?>

        <nav class="navbar navbar-light bg-white">
            <a href="#" class="navbar-brand"></a>
            <!-- Default dropleft button -->
            
        <form class="form-inline" method="GET" id="buscar_aluno" action="users.php">
            <div class="input-group" style="margin-top:15px">
                <!--<input type="text" class="form-control" id="buscar_aluno_auto" name="buscar_aluno_auto">-->
                <input type="text" name="users" id="assunto" placeholder="Pesquisar usuários">
                <div class="input-group-append" >
                    <button class="btn back-ifba" type="submit" id="button-addon2">
                        <i class="fa fa-search text-white"></i>
                    </button>
                </div>
            </div>
            <div id="linkResultado"></div>
        </form>

    </nav>



    <div class="container-fluid gedf-wrapper" style="margin-top:15px">
        <div class="row">
            <div class="col-md-3 d-none d-md-block">
             <div class="card gedf-card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 gedf-main">

            <!--- \\\\\\\Post-->
            <div class="card gedf-card d-none d-md-block">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Feed</a>
                        </li>
                            <!--<li class="nav-item">
                                <a class="nav-link text-ifba" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                            </li>-->
                        </ul>
                    </div>
                    <form method="POST" class="" enctype="multipart/form-data" id="postagem" name="publi" action="#">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <div class="form-group">
                                        <label class="sr-only" for="message">post</label>
                                        <textarea name="post_text" class="form-control" style="resize: none;" id="message" rows="3" placeholder="Escreva algo legal!"></textarea>
                                        <div id="">
                                            <img id="preview" width="120" style="padding-top:10px">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
                                    <button type="submit" id="but_upload" disabled name="publicar" class="btn back-ifba text-white" style="margin: 5px;border-radius: 5px;">Compartilhar</button>
                                    <label for="file-input">
                                        <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 30px;margin: 5px;padding-top: 5px;cursor: pointer;"></i>    
                                    </label>
                                    <input type="file" id="file-input" name="file" style="display:none">
                                    <input type="hidden" name="MM_insert" id="inpuFile" value="publi">
                                </div>
                                <label for="btn-reset">
                                    <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 30px;margin: 5px;padding-top: 5px;cursor: pointer;"></i>
                                </label>
                                <input type="reset" id="btn-reset" style="display:none">
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <!-- POST -->
                <div id="feed"><center><img src="assets/svg/loading.svg" width="50"></center></div>
                
            </div>
            <div class="col-md-3 d-none d-md-block">
             <div class="card gedf-card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="linkResultado"></div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<script src="../login/js/popper.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../login/js/bootstrap.min.js"></script>
<script src="../login/js/main.js"></script>
<script src="assets/js/autocomplete.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>

</script>

</body>
</html>