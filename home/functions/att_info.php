<?php 
require 'conn.php';

extract($_POST);

$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno");
$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC );

//VERIFICA SE JÁ EXISTE O MESMO USERNAME
$verificaUser = $pdo->prepare("SELECT * FROM alunos WHERE name_user_aluno = :name_user_aluno");
$verificaUser->bindParam(':name_user_aluno', $username);
$verificaUser->execute();
$res_verificaUser = $verificaUser->rowCount();
$row_verificaUser = $verificaUser->fetchAll( PDO::FETCH_ASSOC );

if ($email_aluno != $email_antigo) {
//VERIFICA SE JÁ EXISTE O MESMO EMAIL
$verificaMail = $pdo->prepare("SELECT * FROM alunos WHERE email_aluno = :email_aluno");
$verificaMail->bindParam(':email_aluno', $email_aluno);
$verificaMail->execute();
$res_verificaMail = $verificaMail->rowCount();
$row_verificaMail = $verificaMail->fetchAll( PDO::FETCH_ASSOC );
}else{
	$res_verificaMail = 0;
}

if(empty($nome_aluno) || empty($email_aluno) || empty($name_user_aluno)){
	echo "<script>  
	Swal.fire({
		icon: 'warning',
		title: 'Atenção',
		text: 'Você precisa preencher todos os campos!',
		});
		</script>";
		die;
	}else if (filter_var($email_aluno, FILTER_VALIDATE_EMAIL) === FALSE) {

    echo "<script>

    Swal.fire({
      icon: 'warning',
      title: 'Atenção',
      text: 'Informe um endereço de e-mail válido!',
      });
      </script>";
      die;
    }else if ($res_verifica > 0) {

      echo "<script>
      Swal.fire({
        icon: 'warning',
        title: 'Atenção',
        text: 'Já existe um usuário com esse número de matrícula!',
        });
        </script>";
        die;

      }else if ($res_verificaMail > 0){
      	echo "<script>
      Swal.fire({
        icon: 'warning',
        title: 'Atenção',
        text: 'Esse email já foi cadastrado',
        });
        </script>";
        die;
      }else {

      	$upt_alunos = $pdo->prepare("
		UPDATE alunos SET 
		nome_aluno=:nome_aluno, 
		email_aluno=:email_aluno,  
		name_user_aluno=:name_user_aluno,
		website=:website,
		github=:github,
		twitter=:twitter,
		instagram=:instagram
		WHERE 
		id_aluno = :id_aluno 
		");
		$upt_alunos->execute(array(
			':nome_aluno' => $nome_aluno,
			':email_aluno' => $email_aluno,
			':name_user_aluno' => $name_user_aluno,
			'website'=>$website,
			'github'=>$github,
			'twitter'=>$twitter,
			'instagram'=>$instagram,
			':id_aluno' => $id_aluno
		));

		echo "<script>
	
	Swal.fire({
	  icon: 'success',	
	  title: 'Usuário atualizado.',
	  showDenyButton: false,
	  showCancelButton: false,
	  confirmButtonText: 'OK',
	  confirmButtonColor: '#3085d6',
	}).then((result) => {
	  if (result.isConfirmed) {
		setTimeout(function () { window.location.href = 'conta.php'; }, 1000);
	  } 
	})
	
	</script>";

      }
?>