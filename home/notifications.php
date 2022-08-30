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
$amzd = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para = :id_aluno_para AND status = 0");
$amzd->bindParam(':id_aluno_para', $resBuscaAluno['id_aluno']);
$amzd->execute();
$res_amzd = $amzd->rowCount();
$row_amzd = $amzd->fetchAll( PDO::FETCH_ASSOC );

?>

<!DOCTYPE html>
<html>
<head>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
</head>
<body>
    <?php include 'includes/sidebar.php' ?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 right">
                <div class="box shadow-sm rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Notificações</h6>
                    </div>
                    <div class="box-body p-0">
                        <?php foreach ($row_amzd as $amzd) { 

                          $buscaAluno = $pdo->prepare('SELECT * FROM alunos WHERE id_aluno = :id_aluno');
                          $buscaAluno->bindParam(':id_aluno', $amzd['id_aluno_de']);
                          $buscaAluno->execute();
                          $resBuscaAlunoDe = $buscaAluno->fetch(PDO::FETCH_ASSOC);
                          $rowBuscaAluno = $buscaAluno->rowCount();

                          if($resBuscaAlunoDe['foto_perfil']==""){
                            $foto = "padrao.png";
                        }else{
                            $foto = $resBuscaAlunoDe['foto_perfil'];
                        }    

                        ?>
                        <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="uploads/<?= $foto ?>" width="50" alt="" />
                            </div>
                            <div class="font-weight-bold mr-3">
                                <div class="text-truncate"><?= $resBuscaAlunoDe['nome_aluno'] ?></div>
                                <div class="small">Pediu para seguir você</div>
                                <div class="mb-3 mt-1">
                                    <button type="button" class="btn btn-danger" id="excluir">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 19">
                                          <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"></path>
                                      </svg>
                                  </button>
                                  <button type="button" class="btn btn-success" id="aceitar">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 19">
                                          <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                                          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                      </svg>
                                  </button>
                              </div>
                          </div>
                          <span class="ml-auto mb-auto">
                            <br />
                            <div class="text-right text-muted pt-1">3d</div>
                        </span>
                    </div>
                <?php } ?>
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