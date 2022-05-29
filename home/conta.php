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

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="home/fonts/icomoon/style.css">

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
          <br>
          <div class="fs-2 fw-semibold">
            Conexões
          </div>
          <br>
          <div class="form-group">
            <label for="exampleInputEmail1">Website</label>
            <input type="text" class="form-control" name="website" value="<?= $row_verifica['website'] ?>">
            <small id="emailHelp" class="form-text text-muted">Você tem um site/portifólio? Adicione o link aqui.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Github</label>
            <input type="text" class="form-control" name="github" value="<?= $row_verifica['github'] ?>">
            <small id="emailHelp" class="form-text text-muted">Seu usuário do Github.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Twitter</label>
            <input type="text" class="form-control" name="twitter" value="<?= $row_verifica['twitter'] ?>">
            <small id="emailHelp" class="form-text text-muted">Seu usuário do Twitter.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Instagram</label>
            <input type="text" class="form-control" name="instagram" value="<?= $row_verifica['instagram'] ?>">
            <small id="emailHelp" class="form-text text-muted">Seu usuário do Instagram.</small>
          </div>
          <button type="submit" id="botao" class="btn ifcolor">Atualizar Informações</button>
          <input type="hidden" name="email_antigo" value="<?php echo $row_verifica['email_aluno']; ?>">
          <input type="hidden" name="id_aluno" value="<?= $row_verifica['id_aluno'] ?>">
        </form>
        <div id="linkResultado"></div>
      </div>
    </div>

    <script src="home/js/jquery-3.3.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/main.js"></script>

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