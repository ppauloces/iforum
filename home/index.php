<?php 
require 'functions/conn.php';
require 'functions/session.php';

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
    <link rel="stylesheet" href="assets/css/timeline.css">
  </head>
  <body>

    <div class="wrapper d-flex align-items-stretch">
      <?php include 'includes/sidebar.php';?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="">
<div class="profile-wrapper">
    <!-- /.profile-section-user -->
    <div class="profile-section-main">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active ifcolor" data-toggle="tab" href="#profile-overview" role="tab">Timeline</a></li>
            <li class="nav-item"><a class="nav-link active ifcolor" data-toggle="tab" href="#profile-overview" role="tab">Moments</a></li>
        </ul>
        <!-- /.nav-tabs -->
        <!-- Tab panes -->
        <div class="tab-content profile-tabs-content">
            <div class="tab-pane active" id="profile-overview" role="tabpanel">
                <div class="post-editor">
                    <textarea name="post-field" id="post-field" class="post-field" placeholder="Digite algo legal!"></textarea>
                    <div class="d-flex">
                        <button class="btn btn-success px-4 py-1">Postar</button>
                        <a href=""><i class="fa fa-picture-o icon" aria-hidden="true" style="font-size: 35px; padding-left: 10px;margin-top: 5px;color: #2f9e41;"></i></a>
                    </div>
                </div>
                <!-- /.post-editor -->
                <div class="stream-posts">
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">John Doe</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 1h ago</div>
                            <p class="sp-paragraph mb-0">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Palmira Guthridge</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 1h ago</div>
                            <p class="sp-paragraph mb-0">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Meghann Fraser</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 2h ago</div>
                            <p class="sp-paragraph mb-0">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Kent Lemaitre</a></h6></div>
                     <div class="sp-content">
                            <div class="sp-info">posted 1h ago</div>
                            <p class="sp-paragraph mb-0">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                    <div class="stream-post mb-0">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Loria Lambing</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 2 days ago</div>
                            <p class="sp-paragraph">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous</p>
                            <p class="sp-paragraph">autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                </div>
                <!-- /.stream-posts -->
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.profile-section-main -->
</div>
</div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-1.4.2.slim.min.js"integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
  <script src="assets/js/popper.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>