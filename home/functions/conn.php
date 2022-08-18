<?php
date_default_timezone_set("America/Sao_Paulo");
try { 
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=iforum', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET CHARACTER SET utf8");
} catch(PDOException $e) { 
    echo 'Error: ' . $e->getMessage();
}

?>