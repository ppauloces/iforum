<?php 

session_start();

if((!isset ($_SESSION['num_mat_aluno']) == true) and (!isset ($_SESSION['senha_aluno']) == true))
{
  header('location:../index.php');
  }




?>