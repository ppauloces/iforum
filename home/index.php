<?php 
require 'functions/conn.php';
require 'functions/session.php';
require 'assets/icons/icons.php';
$verifica = $pdo->prepare("SELECT * FROM alunos ORDER BY nome_aluno ASC");
//$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetch( PDO::FETCH_ASSOC );
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
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

    <title>Sidebar #1</title>
  </head>
  <body>
  
    <?php include 'includes/sidebar.php' ?>
    <main>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">





            <div class="col-md-9">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail">
                      <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>  
    </main>
    
    

    <script src="home/js/jquery-3.3.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/main.js"></script>
  </body>
</html>