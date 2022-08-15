<?php 
require 'functions/conn.php';
require 'functions/session.php';

if(empty($_GET['id'])){
   header("Location: index.php");
}

/*
QUERY PARA VERIFICAÇÃO DE SEGURANÇA
VAI VERIFICAR SE EXISTE O PERFIL, SE O CARA TENTAR ACESSAR E NÃO EXISTIR, IRA DESTRUIR A SESSÃO 
AO ENTRAR NO LAÇO
*/

$buscaAluno = $pdo->prepare('SELECT * FROM alunos WHERE id_aluno = :id_aluno');
$buscaAluno->bindParam(':id_aluno', $_GET['id'], PDO::PARAM_STR);
$buscaAluno->execute();
$resBuscaAluno1 = $buscaAluno->fetchAll(PDO::FETCH_ASSOC);
$rowBuscaAluno = $buscaAluno->rowCount();

if($rowBuscaAluno === 0){
  header("Location: index.php"); 
}

/*
QUERY QUE IRÁ FILTRAR O POST APENAS DO ID DO PERFIL QUE ESTA SENDO ACESSADO
*/
$buscaPost = $pdo->prepare('SELECT * FROM post WHERE id_usuario = :id_aluno');
$buscaPost->bindParam(':id_aluno', $_GET['id']);
$buscaPost->execute();
$rowBuscaPost = $buscaPost->rowCount();
//$rowPost = $buscaPost->fetch(PDO::FETCH_ASSOC);

/*
QUERY QUE IRÁ VERIFICAR SE EXISTE POSTS, SE FOR MAIOR QUE 0 EXIBIRÁ OS POSTS
*/
$nPosts = "SELECT count(*) FROM post WHERE id_usuario = :id_aluno"; 
$result = $pdo->prepare($nPosts); 
$result->execute([':id_aluno' => $_GET['id']]); 
$number_of_rows = $result->fetchColumn();

/*
QUERY QUE IRÁ VERIFICAR SE EXISTE AMIZADE NA TABELA AMIZADE
*/
$amizade = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para=:id_aluno_para AND id_aluno_de=:id_aluno_de");
$amizade->execute([
   'id_aluno_de' => $row_verifica['id_aluno'],
   'id_aluno_para' => $_GET['id']
]); 
$res_verifica_amzd = $amizade->rowCount();
$row_verifica_amzd = $amizade->fetch(PDO::FETCH_ASSOC);

foreach($resBuscaAluno1 as $alunoInfo){

   if($alunoInfo['foto_perfil']==""){
      $foto = "padrao.png";
   }else{
      $foto = $alunoInfo['foto_perfil'];
   }
echo $_GET['id'];
echo $alunoInfo['foto_perfil'];
   if($alunoInfo['num_matricula_aluno'] === $colname_Usuario){
      $btnStatus = '<a class="pt-1px d-md-block" href="upd_profile.php?idupd='.$alunoInfo['id_aluno'].'">Editar Perfil</a>';
   }else{
      if($res_verifica_amzd > 0){
         $btnStatus = '
         <div id="divamz">
         <form method="POST" id="amizade">
         <input type="hidden" name="ele" value="'.$_GET['id'].'">
         <input type="hidden" name="eu" value="'.$row_verifica['id_aluno'].'">
         <button type="button"class="form-control rounded submit px-3 btnifba" id="seguir"><span><span>Comprar</span></span></button>
         </form>
         </div>';
      }else{
         $btnStatus = '
         <div id="divamz">
         <form method="POST" id="amizade">
         <input type="hidden" name="ele" value="'.$_GET['id'].'">
         <input type="hidden" name="eu" value="'.$row_verifica['id_aluno'].'">
         <button type="button"class="form-control onclick="seguir('.$_GET['id'].')" rounded submit px-3 btnifba" id="seguir"><span><span>Comprar</span></span></button>
         </form>
         </div>';
      }
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
         <!-- Bootstrap CSS -->
         <!-- Style Sidebar-->
         <link rel="stylesheet" href="assets/css/style.css">
         <link rel="stylesheet" href="assets/css/mystyle.css">
         <!--style index -->
         <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="assets/css/profile.css">
         <title><?= $alunoInfo['nome_aluno']?> (@<?= $alunoInfo['name_user_aluno']?>)</title>
      </head>
      <body>

         <?php include 'includes/sidebar.php' ?>
<?php //echo $foto ?>
         <div class="container">
            <div class="profile-page tx-13">
               <div class="row">
                  <div class="col-12 grid-margin">
                     <div class="profile-header">
                        <div class="cover">
                           <div class="gray-shade"></div>
                           <figure>
                              <img src="https://bootdey.com/img/Content/bg1.jpg" class="img-fluid" alt="profile cover">
                           </figure>
                           <div class="cover-body d-flex justify-content-between align-items-center">
                              <div>
                                 <img class="img-thumbnail profile-pic" src="uploads/<?= $foto ?>" alt="profile">
                                 <span class="profile-name"><?= $alunoInfo['nome_aluno'] ?></span>
                              </div>
                              <div class="d-none d-md-block">
                              </div>
                           </div>
                        </div>
                        <br>
                        <div class="header-links" id="div">
                           <ul class="links d-flex align-items-center mt-3 mt-md-0">
                             <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                <a class="pt-1px  d-md-block" href="#">Seguindo <span class="text-muted tx-12">356</span></a>
                             </li>
                             <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                <a class="pt-1px d-md-block" href="#">Seguidores <span class="text-muted tx-12">3,765</span></a>
                             </li>
                             <div id="btnF">
                               <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                 <?= $btnStatus ?>
                              </li>
                           </div>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row profile-body">
               <!-- left wrapper start -->
               <?php include 'includes/profile/about.php' ?>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
               <div class="row">
                  <div class="col-md-12 grid-margin">


                     <?php 

                     if($number_of_rows == 0){

                        echo '<div class="card">
                        <div class="card-body text-center">
                        '.$alunoInfo['nome_aluno'].' ainda não postou nada...
                        </div>
                        </div>';
                     }

                     while($rowPost = $buscaPost->fetch(PDO::FETCH_ASSOC)){

                        if($alunoInfo['num_matricula_aluno'] != $colname_Usuario){

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

                        if($rowPost['media_post'] == ""){
                           echo '
                           <br>
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
                           <div class="h5 m-0">@'.$alunoInfo['name_user_aluno'].'</div>
                           <div class="h7 text-muted">'.$alunoInfo['nome_aluno'].'</div>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="card-body">
                           <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> '.$rowPost['data'].'</div>
                           <p class="card-text">
                           '.$rowPost['texto_post'].'
                           </p>
                           </div>
                           <div class="card-footer">
                           <a href="#" class="card-link"><i class="icon-thumbs-o-up"></i> Like</a>
                           <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                           <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                           </div>
                           </div>';
                        }else{
                           echo '
                           <br>
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
                           <div class="h5 m-0">@'.$alunoInfo['name_user_aluno'].'</div>
                           <div class="h7 text-muted">'.$alunoInfo['nome_aluno'].'</div>
                           </div>
                           </div>
                           </div>
                           </div>
                           <div class="card-body">
                           <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> '.$rowPost['data'].'</div>
                           <p class="card-text">
                           '.$rowPost['texto_post'].'
                           </p>
                           <img src="uploads/posts/'.$rowPost['media_post'].'" width="160" height="120"> 
                           </div>
                           <div class="card-footer">
                           <a href="#" class="card-link"><i class="icon-thumbs-o-up"></i> Like</a>
                           <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                           <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                           </div>
                           </div>';

                        }
                     }

                     ?>
                  </div>
                  <div class="col-md-12">
                  </div>
               </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3 right-wrapper">
               <div class="row">
                  <?php include 'includes/profile/suggestions.php' ?>
               </div>
            </div>
            <!-- right wrapper end -->
         </div>
      </div>
   </div>

   <div id="linkResultado"></div>

   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
   crossorigin="anonymous"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/main.js"></script>
   <script>

      function seguir(<?php $_GET['id'] ?>
){
         eu = <?php $row_verifica['id_aluno'] ?>
         ele = <?php $_GET['id'] ?>
         $j.ajax({
            type: "POST",
            url: "functions/newAmizade.php",
            data: {eu, ele},
            success: function (data)
            {
               i = $j("#seguir");
               if(php == 0){
                  alert(eu+ele);
                  i.html(i.html().replace("Comprar","Remover"))
               }else if(php == 1){
                                    alert(eu+ele);
                  i.html(i.html().replace("Comprar","Remover"))
               }
               $("#seguir").html(data);
            }
         });
         return false;
      }
      jQuery('#amizade').submit(function () {
         event.preventDefault();
         var dados = jQuery(this).serialize();
         var php = "<?= $res_verifica_amzd ?>";
         $( "#div" ).click(function() {
            $("*").each(function () { 
               if (this.php > 0){ 
                $(this).html($(this).html().replace(/Seguindo/g, "Seguir"));
             }});

         });
         jQuery.ajax({
            type: "POST",
            url: "functions/newAmizade.php",
            data: dados,
            success: function (data)
            {
               $("#seguir").html(data);
            }
         });
         return false;
      });

   </script>
</body>
</html>
<?php } ?>