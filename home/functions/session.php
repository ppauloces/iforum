<?php
//initialize the session
session_start();
header('Cache-Control: no-cache, must-revalidate, max-age=0');

if (isset($_SESSION['login'])) {
  $colname_Usuario = $_SESSION['login'] ; 
}else{
  header('Location: ../index.php?erro');  
}


$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno");
$verifica->bindParam(':num_matricula_aluno', $colname_Usuario);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetch( PDO::FETCH_ASSOC );

$usuarioID = $row_verifica['id_aluno'];

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){

  //AO ENCERRAR A SESSAO, IRA CADASTRAR A DATA E HORA QUE SAIU
  $logout = $pdo->prepare("UPDATE registro_login SET data_saida = now() WHERE id_usuario_login = :id_aluno and data_saida is NULL");
  $logout->bindParam(':id_aluno', $usuarioID);
      $logout->execute();

  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  $_SESSION['login'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  unset($_SESSION['login']);
    
  $logoutGoTo = "../?saiu";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

?>