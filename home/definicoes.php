<?php 
require 'functions/conn.php';

$verifica = $pdo->prepare("SELECT * FROM alunos ORDER BY nome_aluno ASC");
//$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC );

?>


<!doctype html>
  <html lang="en">
  <head>
    <title>Home / IForúm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="home/sidebar/fonts/icomoon/style.css">

    <link rel="stylesheet" href="home/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="home/css/style.css">
  </head>
  <body>

    <div class="wrapper d-flex align-items-stretch">
      <?php include 'includes/sidebar.php';?>

      <!-- Page Content  -->
      <div id="content" class="container">

        <div class="fs-2 fw-semibold">
          Definições da conta
        </div>
        <br>
        <div class="b-example-divider b-example-vr"></div>
        <div class="card">
          <div class="card-body">
            <a href="conta.php" class="list-unstyled fs-6">Informações da conta</a>
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-body">
            <a href="" class="list-unstyled fs-6 text-danger">Desativar conta</a>
          </div>
        </div>




      </div>
    </div>

    <script src="home/js/jquery-3.3.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/main.js"></script>
  </body>
  </html>