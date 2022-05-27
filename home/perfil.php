<?php 
require 'functions/conn.php';

$verifica = $pdo->prepare("SELECT * FROM alunos ORDER BY nome_aluno ASC");
//$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC );


foreach ($row_verifica as $linha) {
?>


<!doctype html>
	<html lang="pt-br">
	<head>
		<title>Home / IForúm</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/mystyle.css">
	</head>
	<body>

		<div class="wrapper d-flex align-items-stretch">
			<?php include 'includes/sidebar.php';?>

			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5">

				<?php include 'includes/menu.php';?>
				<div class="position-relative">
					<img src="https://image.shutterstock.com/image-photo/woman-wear-headphones-look-pc-600w-1751405456.jpg" class="img-fluid">
					<img src="https://i.imgur.com/hczKIze.jpg" class="img-fluid position-absolute top-100 start-0 translate-middle img-thumbnail" style="border-radius: 60px;margin-left: 4rem;">

					<h4 class="text-center position-absolute top-100 start-0 translate-middle" style="margin-top:4.5rem;font-weight: bold;margin-left: 3.5rem;"><?= $linha['nome_aluno'] ?></h4>
					<p class="text-center position-absolute top-100 start-0 translate-middle" style="margin-top:6rem;margin-left: 3rem;">@<?= $linha['nome_aluno'] ?></p>
				</div>



			</div>
		</div>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
	</html>

<?php } ?>