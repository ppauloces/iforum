<?php 

$buscaAluno = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno OR name_user_aluno = :name_user_aluno");
$buscaAluno->bindParam(':num_matricula_aluno', $colname_Usuario);
$buscaAluno->bindParam(':name_user_aluno', $colname_Usuario);
$buscaAluno->execute();
$resBuscaAluno = $buscaAluno->fetchAll(PDO::FETCH_ASSOC);


foreach($resBuscaAluno as $sidebar){
     if($sidebar['foto_perfil']==""){
      $foto1 = "padrao.png";
   }else{
      
      $foto1 = $sidebar['foto_perfil'];
   }
?>
<aside class="sidebar">
  <div class="toggle">
    <a href="#"  style="font-size:30px;padding-left:10px;" class="js-menu-toggle" id="" data-toggle="collapse" data-target="#main-navbar">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
      <span></span>
    </a>
  </div>
  <div class="side-inner">

    <div class="profile">
      <img src="uploads/<?= $foto1 ?>" class="img-thumbnail img-fluid">
      <h3 class="name"><?= $sidebar['nome_aluno'] ?></h3>
      <span class="country"><?= $sidebar['campus_aluno']  ?></span>
    </div>

    <div class="counter d-flex justify-content-center">
      <!-- <div class="row justify-content-center"> -->
        <div class="col">
          <strong class="number">892</strong>
          <span class="number-label">Posts</span>
        </div>
        <div class="col">
          <strong class="number">22.5k</strong>
          <span class="number-label">Seguidores</span>
        </div>
        <div class="col">
          <strong class="number">150</strong>
          <span class="number-label">Seguindo</span>
        </div>
        <!-- </div> -->
      </div>
      
      <div class="nav-menu">
        <ul>
          <li><a href="index.php"><span class="icon-home mr-3"></span>Feed</a></li>
          <li><a href="profile.php?id=<?= $sidebar['id_aluno'] ?>"><span class="icon-person mr-3"></span>Perfil</a></li>
          <li><a href="notifications.php"><span class="icon-notifications mr-3"></span>Notificações</a></li>
          <li><a href="messages.php"><span class="icon-location-arrow mr-3"></span>Direct</a></li>
          <li><a href="definicoes.php"><span class="icon-gear mr-3"></span>Configurações</a></li>
          <li><a href="<?php echo $logoutAction ?>"><span class="icon-sign-out mr-3"></span>Sair</a></li>
        </ul>
      </div>
    </div>
    
  </aside>
  <?php } ?>