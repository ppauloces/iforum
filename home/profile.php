	<?php 
	require 'functions/conn.php';
	require 'functions/session.php';

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

			<!-- Bootstrap CSS -->

			<!-- Style Sidebar-->
			<link rel="stylesheet" href="assets/css/style.css">
			<link rel="stylesheet" href="assets/css/mystyle.css">

			<!--style index -->
			<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="assets/css/profile.css">

			<title>Sidebar #1</title>
		</head>
		<body>

			<?php include 'includes/sidebar.php' ?>

			<div class="container-fluid gedf-wrapper" style="margin-top:15px">
				<div class="row">
					<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
						<div class="row panel">
							<div class="col-md-4 bg_blur ">
								<a href="#" class="follow_btn hidden-xs">Follow</a>
							</div>
							<div class="col-md-8  col-xs-12">
								<img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail picture hidden-xs" />
								<img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail visible-xs picture_mob" />
								<div class="header">
									<h1>Lorem Ipsum</h1>
									<h4>Web Developer</h4>
									<span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
									"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</span>
								</div>
							</div>
						</div>   
						
						<div class="row nav">    
							<div class="col-md-4"></div>
							<div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
								<div class="col-md-4 col-xs-4 well"><i class="fa fa-weixin fa-lg"></i> 16</div>
								<div class="col-md-4 col-xs-4 well"><i class="fa fa-heart-o fa-lg"></i> 14</div>
								<div class="col-md-4 col-xs-4 well"><i class="fa fa-thumbs-o-up fa-lg"></i> 26</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
			crossorigin="anonymous"></script>
			<script src="assets/js/autocomplete.js"></script>
			<script src="assets/js/main.js"></script>
		</body>
		</html>