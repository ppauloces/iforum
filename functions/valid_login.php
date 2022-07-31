<?php 
ini_set('display_errors', 0 );
error_reporting(0);

require '../home/functions/conn.php';
require 'enviar_email.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


session_start();

extract($_POST);

if(isset($_COOKIE["tentativa"]) && ($_COOKIE["tentativa"]==5)) {


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



	if (empty($num_mat_aluno) || empty($senha_aluno)) {


		echo "<script>  
		Swal.fire({
			icon: 'warning',
			title: 'Atenção',
			text: 'Você precisa preencher todos os campos!',
			});
			</script>";
			die;

		}else{

			$senha = md5($senha_aluno);

//VERIFICA SE JÁ EXISTE UM USUÁRIO
			$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno AND senha_aluno =:senha_aluno");
			$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
			$verifica->bindParam(':senha_aluno', $senha);
			$verifica->execute();
			$res_verifica = $verifica->rowCount();
			$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC );


			if($res_verifica > 0) {

				if (!isset($_SESSION)) {
					session_start();
				}

				$_SESSION['login'] = $num_mat_aluno;



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

					}else{




						$tentativa = $_COOKIE["tentativa"]+1;

						setcookie("tentativa", $tentativa, time()+10);



						if(isset($_COOKIE["tentativa"])) {

							//echo "Você errou '".$_COOKIE["tentativa"]."' vez.";

						} else {
							echo "";
						}










				//$tentativa = 1;


				//setcookie("tentativa", $tentativa, time()+300);


				//echo "<h2>" . $_COOKIE["tentativa"] + 1 ."</h2>";





				
				echo "<script>

				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Dados não conferem ou usuário não cadastrado. Tente novamente!',
					footer: ''
					});
					</script>";
					






	//echo "<div class=\"card-panel amber darken-2 center-align\">Usuário/senha não confere. Tente novamente.</div>";				
				}
			}

			?>
