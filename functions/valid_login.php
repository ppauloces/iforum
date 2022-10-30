<?php 


require '../home/functions/conn.php';
require 'enviar_email.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if(!$pdo){
	echo "<script>setTimeout(function () { window.location.href = 'error-404/'; });</script>";
	die;
}

session_start();

extract($_POST);

//VERIFICA SE EXISTE TENTATIVA E TENTATIVA FOR IGUAL A 5
if(isset($_COOKIE["tentativa"]) && ($_COOKIE["tentativa"]>=5)) {

	echo "<script>

	Swal.fire({
		icon: 'error',
		title: 'Oops... Número de tentativas excedidas',
		text: 'tente novamente daqui 20 segundos',
		timer: 20000,
		timerProgressBar: true,
		})
		setTimeout(function () { window.location.reload() }, 20000);
		</script>";

	/*
	QUERY PARA FILTRAR O EMAIL PELO NUMERO DE MATRICULA, PARA ENVIAR
	O EMAIL ATRAVES DO NUMERO DE MATRICULA
	*/
	$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno");
	$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
	$verifica->execute();
	$res_verifica = $verifica->rowCount();
	$row_verifica = $verifica->fetch( PDO::FETCH_ASSOC );

	$email = $row_verifica['email_aluno'];
	$nome = $row_verifica['nome_aluno'];

	if(isset($email)){
		enviarEmail($email,$nome);
	}

	die;

}else if(isset($_COOKIE["tentativa"]) && ($_COOKIE["tentativa"]>5)){

	echo "<script>

	Swal.fire({
		icon: 'error',
		title: 'Oops... Número de tentativas excedidas',
		text: 'tente novamente daqui 20 segundos',
		timer: 20000,
		timerProgressBar: true,
		})
		setTimeout(function () { window.location.reload() }, 20000);
		</script>";

		die;
	}


	/*
	CONDIÇÃO PARA VERIFICAR SE OS CAMPOS DO FORMULARIO ESTÃO VAZIOS
	*/
	if (empty($num_mat_aluno) || empty($senha_aluno)) {


		echo "<script>  
		Swal.fire({
			icon: 'warning',
			title: 'Atenção',
			text: 'Você precisa preencher todos os campos!',
			});
			</script>";
			die;

		}else {

			//VERIFICA SE O USUARIO EXISTE PARA CRIAR O LOGIN E ACESSAR
			$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno OR name_user_aluno = :name_user_aluno");
			$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
			$verifica->bindParam(':name_user_aluno', $num_mat_aluno);
			$verifica->execute();
			$user = $verifica->fetch();

			if ($user && password_verify($_POST['senha_aluno'], $user['senha_aluno']))
			{
				

				if (!isset($_SESSION)) {
					session_start();
				}

				$_SESSION['login'] = $num_mat_aluno;

				//INSERE A DATA E HORA DE LOGIN
				$registro_login = $pdo->prepare("INSERT INTO registro_login (id_usuario_login,data_entrada) VALUES (:id_usuario_login,now())");
				$registro_login->execute(array(
					':id_usuario_login' => $user['id_aluno']
				));

				echo "<script>setTimeout(function () { window.location.href = 'home/'; }, 3000);</script>";
				echo "<script>

				Swal.fire({
					icon: 'success',	
					title: 'Logado com sucesso.',
					text: 'Redirecionando...',
					}).then((result) => {
						if (result.isConfirmed) {
							setTimeout(function () { window.location.href = 'home/index.php'; }, 500);
						} 
						})

						</script>";


					} else {
						$tentativa = $_COOKIE["tentativa"]+1;

						setcookie("tentativa", $tentativa, time()+20);

						echo "<script>

						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Dados não conferem ou usuário não cadastrado. Tente novamente!',
							footer: ''
							});
							</script>";
						}
						die();






						







	//echo "<div class=\"card-panel amber darken-2 center-align\">Usuário/senha não confere. Tente novamente.</div>";				
						
					}

					?>
