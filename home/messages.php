<?php 
require 'functions/conn.php';
require 'functions/session.php';
require 'functions/class.upload.php';

/*
QUERY PARA VERIFICAÇÃO DE SEGURANÇA
VAI VERIFICAR SE EXISTE O PERFIL, SE O CARA TENTAR ACESSAR E NÃO EXISTIR, IRA DESTRUIR A SESSÃO 
AO ENTRAR NO LAÇO
*/

$buscaAluno = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno OR name_user_aluno = :name_user_aluno");
$buscaAluno->bindParam(':num_matricula_aluno', $colname_Usuario);
$buscaAluno->bindParam(':name_user_aluno', $colname_Usuario);
$buscaAluno->execute();
$resBuscaAluno = $buscaAluno->fetch(PDO::FETCH_ASSOC);
$rowBuscaAluno = $buscaAluno->rowCount();

if($rowBuscaAluno == 0){
 header('Location: ../index.php?erro');
}


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

        <link rel="icon" type="imagem/png" href="../login/images/ifsvg.png">

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
        <link rel="stylesheet" href="assets/css/message.css">

        <!--style index -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <style>

        </style>

        <title>Ifórum | Home</title>
    </head>
   
   <body>
    <?php include 'includes/sidebar.php' ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                        <div class="about">
                            <div class="name">Vincent Porter</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                        </div>
                    </li>
                    <li class="clearfix active">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                        <div class="about">
                            <div class="name">Aiden Chavez</div>
                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                        <div class="about">
                            <div class="name">Mike Thomas</div>
                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                        </div>
                    </li>                                    
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                        <div class="about">
                            <div class="name">Christian Kelly</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 10 hours ago </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                        <div class="about">
                            <div class="name">Monica Ward</div>
                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                        <div class="about">
                            <div class="name">Dean Henry</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> offline since Oct 28 </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">Aiden Chavez</h6>
                                <small>Last seen: 2 hours ago</small>
                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>
                <div class="chat-history">
                    <ul class="m-b-0">
                        <li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time">10:10 AM, Today</span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                            </div>
                            <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                        </li>
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">10:12 AM, Today</span>
                            </div>
                            <div class="message my-message">Are we meeting today?</div>                                    
                        </li>                               
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">10:15 AM, Today</span>
                            </div>
                            <div class="message my-message">Project has been already finished and I have results to show you.</div>
                        </li>
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-send"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter text here...">                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

         <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
         <script src="../login/js/popper.js"></script>
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script src="../login/js/bootstrap.min.js"></script>
         <script src="../login/js/main.js"></script>
         <script src="assets/js/autocomplete.js"></script>
         <script src="assets/js/main.js"></script>
         <script src="assets/js/bootstrap.min.js"></script>
      </body>
      </html>