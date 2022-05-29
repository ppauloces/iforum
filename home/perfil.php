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

    <link rel="stylesheet" href="sidebar/fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="home/css/style.css">

    <title>Sidebar #1</title>
  </head>
  <body>
  
    <?php include 'includes/sidebar.php' ?>
    <div class="wrapper d-flex align-items-stretch">
			<?php include 'includes/sidebar.php';?>

			<div class="container">
				<div class="main-body">

					<!-- Breadcrumb -->
					<div class="row gutters-sm">
						<div class="col-md-4 mb-3">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-column align-items-center text-center">
										<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
										<div class="mt-3">
											<h4><?= $row_verifica['nome_aluno'] ?></h4>
											<p class="text-secondary mb-1">@<?= $row_verifica['name_user_aluno'] ?></p>
											<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
											<button class="btn btn-primary">Seguir</button>
											<button class="btn btn-outline-primary">Mensagem</button>
										</div>
									</div>
								</div>
							</div>
							<div class="card mt-3">
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0"><?= website() ?>Website</h6>
										<a href="<?= $row_verifica['website'] ?>" target="__blank" class="" style='color:grey'>Meu site</a>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0"><?= github() ?>Github</h6>
										<a href="https://github.com/<?= $row_verifica['github'] ?>" target="__blank" class="" style='color:grey'><?= $row_verifica['github'] ?></a>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0"><?= twitter() ?>Twitter</h6>
										<a href="https://twitter.com/<?= $row_verifica['twitter'] ?>" class="" target="__blank"  style='color:grey'><?= $row_verifica['twitter'] ?></a>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0"><?= instagram() ?>Instagram</h6>
										<a href="https://www.instagram.com/<?= $row_verifica['instagram'] ?>/" target="__blank" class="" style='color:grey'><?= $row_verifica['instagram'] ?></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-8">
							<div class="card mb-3">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Full Name</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											Kenneth Valdez
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Email</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											fip@jukmuh.al
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Phone</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											(239) 816-9029
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Mobile</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											(320) 380-4539
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h6 class="mb-0">Address</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											Bay Area, San Francisco, CA
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-12">
											<a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
										</div>
									</div>
								</div>
							</div>

							<div class="row gutters-sm">
								<div class="col-sm-6 mb-3">
									<div class="card h-100">
										<div class="card-body">
											<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
											<small>Web Design</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>Website Markup</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>One Page</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>Mobile Template</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>Backend API</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 mb-3">
									<div class="card h-100">
										<div class="card-body">
											<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
											<small>Web Design</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>Website Markup</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>One Page</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>Mobile Template</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small>Backend API</small>
											<div class="progress mb-3" style="height: 5px">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
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
    
    

    <script src="home/js/jquery-3.3.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/main.js"></script>
  </body>
</html>