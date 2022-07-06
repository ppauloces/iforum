<?php
require 'conn.php';
require 'session.php';

$amzd = $_GET['postdata'];

echo $amzd;
exit();
$id_aluno_para = $_POST['postdata'];

$id_aluno_de = $row_verifica['id_aluno'];


?>