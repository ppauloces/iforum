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

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mystyle.css">
  </head>
  <body>

    <div class="wrapper d-flex align-items-stretch">
      <?php include 'includes/sidebar.php';?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <table class="table table-striped">
        <h4>Alunos Matriculados:</h4>
        <thead>
        <tr>
          <th>Nome</th>
          <th>Numero de matrícula</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $num = 1;
          foreach ($row_verifica as $linha) { 

            ?>
            <tr>
              <td><?= $linha['nome_aluno'] ?></td>
              <td><?= $linha['num_matricula_aluno'] ?></td>
              <td>Germany</td>

            </tr>
            <?php 
            $num++;
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="fixed-bottom">
      <a href="#" class="btn btn-primary btn-custom float-right" style="margin: 20px;">
        <span class="glyphicon glyphicon-ok img-circle text-primary btn-icon"></span>
        Acessar
      </a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-1.4.2.slim.min.js"integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
  <script src="assets/js/popper.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>