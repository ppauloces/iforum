<?php 
require '../home/functions/conn.php';
require 'bem_vindo.php';

extract($_POST);

//VERIFICA SE JÁ EXISTE UM USUÁRIO COM O MESMO NUMERO DE MATRICULA
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

//VERIFICA SE JÁ EXISTE O MESMO EMAIL
$verificaMail = $pdo->prepare("SELECT * FROM alunos WHERE email_aluno = :email_aluno");
$verificaMail->bindParam(':email_aluno', $email_aluno);
$verificaMail->execute();
$res_verificaMail = $verificaMail->rowCount();
$row_verificaMail = $verificaMail->fetchAll( PDO::FETCH_ASSOC );

if (empty($nome_aluno) || empty($email_aluno) || empty($num_mat_aluno) || empty($username) || empty($senha_aluno)) {


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

      }else if ($res_verificaUser > 0) {

      echo "<script>
      Swal.fire({
        icon: 'warning',
        title: 'Atenção',
        text: 'Esse nome de usuário já foi cadastrado',
        });
        </script>";
        die;

      }else{

        $senha_aluno = md5($_POST['senha_aluno']);

        //QUERY PARA A CRIAÇÃO DE NOVO USUARIO
        $cad_aluno = $pdo->prepare("INSERT INTO alunos (nome_aluno, email_aluno,name_user_aluno, num_matricula_aluno, senha_aluno,campus_aluno) VALUES (:nome_aluno, :email_aluno,:name_user_aluno, :num_matricula_aluno, :senha_aluno,:campus_aluno)");
        $cad_aluno->execute(array(
          ':nome_aluno' => $nome_aluno,
          ':email_aluno' => $email_aluno,
          ':name_user_aluno' => $username,
          ':num_matricula_aluno' => $num_mat_aluno,
          ':senha_aluno' => $senha_aluno,
          ':campus_aluno' => $nome_instituto
        ));

        if (!isset($_SESSION)) {
          session_start();
        }
        

        $loginUsername=$num_mat_aluno;
        //$password = md5($senha_aluno);
        $MM_fldUserAuthorization = "";
        $MM_redirectLoginSuccess = "home/";
        $MM_redirectLoginFailed = "index.php?err";
        $MM_redirecttoReferrer = false;

        $loginStrGroup = "";

        if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
        $_SESSION['MM_Username'] = $loginUsername;
        $_SESSION['MM_UserGroup'] = $loginStrGroup;       

        if (isset($_SESSION['PrevUrl']) && false) {
      //$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
          echo "<script>window.location.href = 'home/'</script>";
        }

        bemVindo($email_aluno,$nome_aluno);

        echo "<script>
        Swal.fire({
          icon: 'success',  
          title: 'Cadastro realizado com sucesso.',
          showDenyButton: false,
          showCancelButton: false,
          confirmButtonText: 'Fazer Login',
          confirmButtonColor: '#2F9E41',
          }).then((result) => {
            if (result.isConfirmed) {
              setTimeout(function () { window.location.href = 'index.php'; }, 1000);
            } 
            })
            </script>";

          }

?>