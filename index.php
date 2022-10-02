<?php setcookie("tentativa", 1, time()+20); ?>

<!doctype html>
	<html lang="pt-br">
	<head>
		<title>IForúm - TESTE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="login/css/style.css">
		<link rel="stylesheet" href="login/css/meustyle.css">
		<link rel="icon" type="imagem/png" href="login/images/ifsvg.png">

	</head>
	<body>
		<section class="pad">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 col-lg-10">
						<div class="wrap d-md-flex">
							<div class="img" style="background-image: url(login/images/ifba.png);">
							</div>
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<h3 class="mb-4" style="font-weight: 600;">Login</h3>

									</div>
									<div class="w-100">
										<img src="login/images/logo.png" class="ml-5" width="100px" height="40px">
									</p>
								</div>
							</div>
							<form method="POST" class="signin-form" id="login">
								<div class="form-group mb-3">
									<label class="label" for="name">N° de matrícula</label>
									<input type="text" class="form-control" name="num_mat_aluno" placeholder="N° de matrícula">
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Senha</label>
									<input type="password" class="form-control" name="senha_aluno" placeholder="Senha">
								</div>
								<div class="form-group">
									<button type="submit" id="botao" class="form-control rounded submit px-3 btnifba">ENTRAR</button>
								</div>
								<div class="form-group d-md-flex">
										<!--<div class="w-50 text-left">
											<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
												<input type="checkbox" checked>
												<span class="checkmark"></span>
											</label>
										</div>-->
										<div class="w-50 text-left">
											<a href="#">Esqueci minha senha</a>
										</div>
									</div>
								</form>
								<p class="text-center">Não é um membro? <a class="text-ifba" href="cadastro.php">Cadastre-se!</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div id="linkResultado"></div> 
		
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script src="login/js/popper.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="login/js/bootstrap.min.js"></script>
		<script src="login/js/main.js"></script>

		<script>
			jQuery('#login').submit(function () {
				event.preventDefault();
				var dados = jQuery(this).serialize();

				$("#botao").attr("disabled", true);
				$("#botao").css({'background':'grey'});
				$("#botao").text("AGUARDE..."); 

				jQuery.ajax({
					type: "POST",
					url: "functions/valid_login.php",
					data: dados,
					success: function (data)
					{
          //alert(dados);
          $("#linkResultado").html(data);
          $("#botao").attr("disabled", false);
          $("#botao").css({'background':'#2F9E41'});
          $("#botao").text("Logando...");
      }
  });
				return false;
			});
		</script>
	</body>
	</html>

