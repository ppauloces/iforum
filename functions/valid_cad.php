<?php 
require '../home/functions/conn.php';

extract($_POST);

//VERIFICA SE JÁ EXISTE UM USUÁRIO
$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno");
$verifica->bindParam(':num_matricula_aluno', $num_mat_aluno);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC );

if (empty($nome_aluno) || empty($email_aluno) || empty($num_mat_aluno) || empty($_POST['senha_aluno'])) {


  echo "<script>  
  Swal.fire({
    icon: 'warning',
    title: 'Atenção',
    text: 'Você precisa preencher todos os campos!',
    });
    </script>";
    die;

  } else if (filter_var($email_aluno, FILTER_VALIDATE_EMAIL) === FALSE) {

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

      }else{

        $senha_aluno = md5($_POST['senha_aluno']);

        $cad_empresa = $pdo->prepare("INSERT INTO alunos (nome_aluno, email_aluno, num_matricula_aluno, senha_aluno) VALUES (:nome_aluno, :email_aluno, :num_matricula_aluno, :senha_aluno)");
        $cad_empresa->execute(array(
          ':nome_aluno' => $nome_aluno,
          ':email_aluno' => $email_aluno,
          ':num_matricula_aluno' => $num_mat_aluno,
          ':senha_aluno' => $senha_aluno,
        ));

        echo "<script>
        Swal.fire({
          icon: 'success',  
          title: 'Cadastro realizado com sucesso.',
          showDenyButton: false,
          showCancelButton: false,
          confirmButtonText: 'Fazer Login',
          confirmButtonColor: '#3085d6',
          }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(function () { window.location.href = '../index.php'; }, 1000);
            } 
            })

            </script>";

          }

?>