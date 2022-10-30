<?php
date_default_timezone_set("America/Sao_Paulo");

$dir = getcwd();
$dir = explode("\\",$dir);

try { 
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=iforum', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET CHARACTER SET utf8");
} catch(PDOException $e) {
    if($dir[3] == 'iforum' AND $dir[4]== "" AND empty($pdo)){
        header("Location: error-404/");
        die;
    }else if($dir[4] == 'home'){
        header("Location: ../error-404/");
        die;
    }
}

?>