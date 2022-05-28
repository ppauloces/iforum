<?php 
require 'functions/conn.php';

$verifica = $pdo->prepare("SELECT * FROM alunos ORDER BY nome_aluno ASC");
//$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetch( PDO::FETCH_ASSOC );

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

        <div class="fs-2 fw-semibold">
          Informações da conta
        </div>
        <br>
        <form method="POST" action="" id="attPerfil">
          <div class="form-group">
            <label for="exampleInputEmail1">Seu nome</label>
            <input type="text" class="form-control" name="nome_aluno" value="<?= $row_verifica['nome_aluno'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email</label>
            <input type="email" class="form-control" name="email_aluno" value="<?= $row_verifica['email_aluno'] ?>">
            <small id="emailHelp" class="form-text text-muted">Não compartilhe seu email com ninguém.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nome de usuário</label>
            <input type="text" class="form-control" name="name_user_aluno" value="<?= $row_verifica['name_user_aluno'] ?>">            
          </div>
          <button type="submit" id="botao" class="btn ifcolor">Atualizar Informações</button>
          <input type="hidden" name="email_antigo" value="<?php echo $row_verifica['email_aluno']; ?>">
          <input type="hidden" name="id_aluno" value="<?= $row_verifica['id_aluno'] ?>">
        </form>
        <div id="linkResultado"></div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
      jQuery('#attPerfil').submit(function () {
        event.preventDefault();
        var dados = jQuery(this).serialize();

        $("#botao").attr("disabled", true);
        $("#botao").css({'background':'grey'});
        $("#botao").text("AGUARDE..."); 

        jQuery.ajax({
          type: "POST",
          url: "functions/att_info.php",
          data: dados,
          success: function (data)
          {
            //alert("TUDO CERTO");
            $("#linkResultado").html(data);
            $("#botao").attr("disabled", false);
            $("#botao").css({'background':'#2f9e41'});
            $("#botao").text("Atualizar Informações");
          }
        });
        return false;
      });
    </script>
  </body>
  </html>