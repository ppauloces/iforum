<?php 
require 'functions/conn.php';
require 'functions/session.php';

$verifica = $pdo->prepare("SELECT * FROM alunos ORDER BY nome_aluno ASC");
//$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetch( PDO::FETCH_ASSOC );

if(empty($_GET['users'])){
    header("Location: index.php");
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
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>


        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

        <!-- Bootstrap CSS -->
        
        <!-- Style Sidebar-->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/mystyle.css">

        <!--style index -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <title>Ifórum | Home</title>
    </head>
    <body>

        <?php include 'includes/sidebar.php' ?>

        <nav class="navbar navbar-light bg-white">
            <a href="#" class="navbar-brand"></a>

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

        <div class="container-fluid gedf-wrapper" style="margin-top:15px;padding-left: 4rem;">
            <h2>Usuários encontrados</h2>

            <?php

            $nomeAluno = "%".trim($_GET['users'])."%";

            $min_lenght = 3;

            if(strlen($nomeAluno) >= $min_lenght){
                $nomeAluno = htmlspecialchars($nomeAluno);

                $buscaAluno = $pdo->prepare('SELECT * FROM alunos WHERE nome_aluno LIKE :nome_aluno');
                $buscaAluno->bindParam(':nome_aluno', $nomeAluno, PDO::PARAM_STR);
                $buscaAluno->execute();
                $resBuscaAluno = $buscaAluno->fetchAll(PDO::FETCH_ASSOC);

                    foreach($resBuscaAluno as $resultsAluno){
                if($resBuscaAluno > 0){
                    echo "<br>";
                    
            //echo '<a href="profile.php?id='.$resultsAluno["id_aluno"].'"name="p"<br><p name="p"><h3>'.$resultsAluno['nome_aluno']''.$resultsAluno['name_user_aluno'].'</h3></p></a><br>"';

                        echo '<div class="">
                        <div class="card mb-3" style="max-width: 540px; margin:10px">
                        <div class="row g-0">
                        <div class="col-md-4">
                        <a href=""profile.php?id='.$resultsAluno["id_aluno"].'"><img src="'.$resultsAluno["foto_perfil"].'" alt="..." style="margin:20px" width="170"></a>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title"><a href=""profile.php?id='.$resultsAluno["id_aluno"].'">'.$resultsAluno["nome_aluno"].'</a></h5>
                        <p class="card-text">'.$resultsAluno["bio_aluno"].'</p>
                        <p class="card-text">Estuda no '.$resultsAluno["campus_aluno"].'.</p>
                        <a href="#" class="btn back-ifba text-white">Seguir</a
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>';
                    }else{
                    echo "teste";
                }
                }

            } 

            ?>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
        <script src="assets/js/autocomplete.js"></script>
        <script src="assets/js/main.js"></script>

        <script>
            $(function(){
                $("#assunto").autocomplete({
                    source: 'functions/busca_aluno.php'
                });
            });
        </script>

        <script>
        
        jQuery('#buscar_aluno').submit(function () {
            event.preventDefault();
            var dados = jQuery(this).serialize();
            jQuery.ajax({
                type: "GET",
                url: "functions/busca_aluno.php",
                data: dados,
                alert(dados)
                success: function (data)
                {
                  //$("#linkResultado").html(data);
              }
          });
            return false;
        });
        
    </script>
</body>
</html>