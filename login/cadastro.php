<!doctype html>
	<html lang="en">
	<head>
		<title>IForúm - Cadastro</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/meustyle.css">

	</head>
	<body>
		<section class="pad">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 col-lg-10">
						<div class="wrap d-md-flex">
							<div class="img" style="background-image: url(images/ifba.png);">
							</div>
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<h3 class="mb-4" style="font-weight: 600;">Cadastro</h3>
									</div>
									<div class="w-100">
										<img src="images/logo.png" class="ml-5" width="100px" height="40px">
									</p>
								</div>
							</div>
							<form method="POST" class="signin-form" id="cadastro">
								<div class="form-group mb-3">
									<label class="label" for="name">Nome</label>
									<input type="text" class="form-control" name="nome_aluno" placeholder="Seu nome" >
								</div>
								<div class="form-group mb-3">
									<label class="label" for="name">Email</label>
									<input type="text" class="form-control" name="email_aluno" placeholder="Ex: fulano@tal.com" >
								</div>
								<div class="form-group mb-3">
									<label class="label" for="name">N° de matrícula</label>
									<input type="text" class="form-control" name="num_mat_aluno" placeholder="Ex: 20XX136000XX" >
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Senha</label>
									<input type="password" class="form-control" name="senha_aluno" placeholder="Senha" >
								</div>
								<div class="form-group">
									<button type="submit" id="botao" name="cad_btn" class="form-control rounded submit px-3 btnifba">Cadastrar</button>
								</div>
								<div class="form-group d-md-flex">
										<!--<div class="w-50 text-left">
											<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
												<input type="checkbox" checked>
												<span class="checkmark"></span>
											</label>
										</div>-->
									</div>
								</form>
								<p class="text-center">Já tem uma conta? <a class="text-ifba" href="../index.php">Faça login!</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div id="linkResultado"></div> 
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

		<script>
			jQuery('#cadastro').submit(function () {
				event.preventDefault();
				var dados = jQuery(this).serialize();

				$("#botao").attr("disabled", true);
				$("#botao").css({'background':'grey'});
				$("#botao").text("AGUARDE..."); 

				jQuery.ajax({
					type: "POST",
					url: "../functions/valid_cad.php",
					data: dados,
					success: function (data)
					{
          //alert("TUDO CERTO");
          $("#linkResultado").html(data);
          $("#botao").attr("disabled", false);
          $("#botao").css({'background':'#2F9E41'});
          $("#botao").text("CADASTRAR");
      }
  });
				return false;
			});
		</script>

	</body>
	</html>

