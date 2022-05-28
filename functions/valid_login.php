<?php 

require '../home/functions/conn.php';

extract($_POST);

$senha = md5($senha_aluno);

//VERIFICA SE JÁ EXISTE UM USUÁRIO
$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno AND senha_aluno =:senha_aluno");
$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->bindParam(':senha_aluno', $senha);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC );



if (empty($num_mat_aluno) || empty($senha_aluno)) {


	echo "<script>  
	Swal.fire({
		icon: 'warning',
		title: 'Atenção',
		text: 'Você precisa preencher todos os campos!',
		});
		</script>";
		die;

	} else if ($res_verifica > 0) {
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
				echo "<script>

				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Dados não conferem ou usuário não cadastrado. Tente novamente!',
					footer: ''
					});
					</script>";


	//echo "<div class=\"card-panel amber darken-2 center-align\">Usuário/senha não confere. Tente novamente.</div>";
					die;
				}
			?>