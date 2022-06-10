    
<aside class="sidebar">
  <div class="toggle">
    <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
      <span></span>
    </a>
  </div>
  <div class="side-inner">

    <div class="profile">
      <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Image" class="img-fluid">
      <h3 class="name"><?= $row_verifica['nome_aluno'] ?></h3>
      <span class="country"><?= $row_verifica['campus_aluno']  ?></span>
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
          <li><a href="#"><span class="icon-person mr-3"></span>Perfil</a></li>
          <li><a href="#"><span class="icon-notifications mr-3"></span>Notificações</a></li>
          <li><a href="#"><span class="icon-location-arrow mr-3"></span>Direct</a></li>
          <li><a href="definicoes.php"><span class="icon-gear mr-3"></span>Configurações</a></li>
          <li><a href="<?php echo $logoutAction ?>"><span class="icon-sign-out mr-3"></span>Sair</a></li>
        </ul>
      </div>
    </div>
    
  </aside>