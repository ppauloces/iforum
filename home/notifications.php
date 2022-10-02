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
    <link rel="icon" type="imagem/png" href="../login/images/ifsvg.png">

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
<body onload="javascript:carregaSolicitacoes()">
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
                        <div id="notificacoes"><center><img src="assets/svg/loading.svg" width="50"></center></div>
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


    <script>
        function carregaSolicitacoes() {
            jQuery.ajax({
                type: "POST",
                url: "functions/solicitacoes.php",
                success: function (data)
                {
                    $("#notificacoes").html(data);
                    

                }
            });
        }
    </script>

    


</body>
</html>