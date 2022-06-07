<?php 
require("../../home/functions/conn.php");

$pegaInstitutos = $pdo->prepare("SELECT * FROM institutos WHERE id_estado='".$_POST['id']."'");
$pegaInstitutos->execute();
$fetchAll =$pegaInstitutos->fetchAll();

foreach ($fetchAll as $institutos) { 
	
	echo '<option>'.$institutos['nome_instituto'].'</option>';

} 

?>