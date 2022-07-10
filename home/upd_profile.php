<?php 
require 'functions/conn.php';
require 'functions/session.php';

if(empty($_GET['idupd'])){
   header("Location: index.php");
}

$buscaAluno = $pdo->prepare('SELECT * FROM alunos WHERE id_aluno = :id_aluno');
$buscaAluno->bindParam(':id_aluno', $_GET['idupd'], PDO::PARAM_STR);
$buscaAluno->execute();
$resBuscaAluno = $buscaAluno->fetchAll(PDO::FETCH_ASSOC);
$rowBuscaAluno = $buscaAluno->rowCount();

if($_GET['idupd'] != $row_verifica['id_aluno']){
      session_destroy();
      header("Location: index.php");
}

$buscaPost = $pdo->prepare('SELECT * FROM post WHERE id_usuario = :id_aluno');
$buscaPost->bindParam(':id_aluno', $_GET['id']);
$buscaPost->execute();
$rowBuscaPost = $buscaPost->rowCount();
$rowPost = $buscaPost->fetch(PDO::FETCH_ASSOC);

$nPosts = "SELECT count(*) FROM post WHERE id_usuario = :id_aluno"; 
$result = $pdo->prepare($nPosts); 
$result->execute([':id_aluno' => $_GET['id']]); 
$number_of_rows = $result->fetchColumn();

foreach($resBuscaAluno as $alunoInfo){
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
      <title><?= $alunoInfo['nome_aluno']?> | Editar Perfil</title>
   </head>
   <body>

      <?php include 'includes/sidebar.php' ?>

      <div class="container">
         <div class="row flex-lg-nowrap">

          <div class="col">
             <div class="row">
               <div class="col mb-3">
                 <div class="card">
                   <div class="card-body">
                     <div class="e-profile">
                       <div class="row">
                         <div class="col-12 col-sm-auto mb-3">
                           <div class="mx-auto" style="width: 140px;">
                             <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                               <img class="img-thumbnail" width="145" src="<?=$alunoInfo['foto_perfil']?>" alt="">
                            </div>
                         </div>
                      </div>
                      <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                          <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?= $alunoInfo['nome_aluno'] ?></h4>
                          <p class="mb-0">@<?=$alunoInfo['name_user_aluno']?></p>
                          <div class="mt-2">
                            <button class="btn back-ifba" type="button">
                              <i class="fa fa-fw fa-camera text-white"></i>
                              <span class="text-white">Selecionar foto</span>
                           </button>
                        </div>
                     </div>
                     <div class="text-center text-sm-right">
                       <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                    </div>
                 </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="active nav-link">Conta</a></li>
             </ul>
             <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Seu nome</label>
                              <input class="form-control" type="text" name="name" value="<?=$alunoInfo['nome_aluno']?>">
                           </div>
                        </div>
                        <div class="col">
                         <div class="form-group">
                           <label>Username</label>
                           <input class="form-control" type="text" name="username" value="<?=$alunoInfo['name_user_aluno']?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" value="<?=$alunoInfo['email_aluno']?>">
                     </div>
                  </div>
               </div>
               <div class="row">
                 <div class="col mb-3">
                   <div class="form-floating">
                     <label>Bio</label>
                     <textarea class="form-control" rows="5" value="<?=$alunoInfo['bio_aluno']?>"></textarea>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
       <div class="col-12 col-sm-6 mb-3">
         <div class="mb-2"><b>Mudar senha</b></div>
         <div class="row">
           <div class="col">
             <div class="form-group">
               <label>Senha atual</label>
               <input class="form-control" type="password" placeholder="••••••" name="senhaAtual">
            </div>
         </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Nova senha</label>
            <input class="form-control" type="password" placeholder="••••••" name="novaSenha">
         </div>
      </div>
   </div>
   <div class="row">
     <div class="col">
       <div class="form-group">
         <label>Confirmar <span class="d-none d-xl-inline">nova senha</span></label>
         <input class="form-control" type="password" placeholder="••••••" name="novaSenha1"></div>
      </div>
   </div>
</div>
</div>
<div class="row">
 <div class="col d-flex justify-content-end">
   <button class="btn back-ifba text-white" type="submit">Salvar alterações</button>
</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
   $(document).on('click', '#seguir', function() {
      $("#status").html("mudando o nome do botão para botao2");
      $(this).attr("id","seguindo").html("Seguindo");
   }); 
   $(document).on('click', '#seguindo', function() {
      $("#status").html("retornando o nome do botão para botao1");
      $(this).attr("id","seguir").html("Seguir");
   });
</script>
</body>
</html>
<?php } ?>