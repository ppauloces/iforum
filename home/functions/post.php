<?php
require 'conn.php';
require 'session.php';
require 'class.upload.php';

extract($_POST);


$pubs = $pdo->prepare("SELECT * FROM post ");
//$pubs->bindParam(':num_matricula_aluno', $colname_Usuario);
$pubs->execute();
$res_pubs = $pubs->rowCount();
$row_pubs = $pubs->fetch( PDO::FETCH_ASSOC );

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "publi") || (isset($_POST["MM_insertMobile"])) && ($_POST["MM_insertMobile"] == "publiMobile")) {

    if(empty($_POST) && empty($_FILES)){

        echo "<script>  
        Swal.fire({
            icon: 'warning',
            title: 'Atenção',
            text: 'Você precisa preencher todos os campos!',
            });
            </script>";
            die;
            
        }

        if($_FILES['file']['error'] > 0){
            $texto = $_POST['post_text'];
            $hoje = date('Y-m-d');
            $post = $pdo->prepare("INSERT INTO post (id_usuario, texto_post,data) VALUES (:id_usuario,:texto_post,:data)");
            $post->execute(array(
                ':id_usuario' => $row_verifica['id_aluno'],
                ':texto_post' => $texto,
                ':data' => $hoje
            ));
        }

        $handle = new Upload($_FILES['file']);
        $novo_nome = md5(uniqid()); 

        if (empty($handle)) {
         echo "<script>  
         Swal.fire({
            icon: 'warning',
            title: 'Atenção',
            text: 'Você precisa preencher todos os campos!',
            });
            </script>";
        } else {

            if ($handle->uploaded) 
            { 
                $handle->image_resize = true;
                $handle->image_ratio_y = true;
                $handle->image_ratio_fill = false;
//$handle->image_ratio_crop = 'T';
                $handle->image_x = 300;
//$handle->image_y = 300;
                $handle->jpeg_quality = 100;
                $handle->file_new_name_body = $novo_nome;
                $handle->mime_check = true;
                $handle->allowed = array('image/*');
$handle->file_max_size = '20242880'; // 1KB
$handle->Process('../uploads/posts/');

if ($handle->processed) 
{

    $nome_do_arquivo = $handle->file_dst_name;  

    $texto = $_POST['post_text'];
    $hoje = date("Y-m-d");

    $post = $pdo->prepare("INSERT INTO post (id_usuario, texto_post, media_post,data) VALUES (:id_usuario,:texto_post, :media_post,:data)");
    $post->execute(array(
        ':id_usuario' => $row_verifica['id_aluno'],
        ':texto_post' => $texto,
        ':media_post' => $nome_do_arquivo,
        ':data' => $hoje
    ));


    
    
    //echo "<div class=\"card-panel indigo lighten-4 center-align\">CADASTRO REALIZADO</div>";  
    //echo "<script>M.toast({html: 'CADASTRO REALIZADO!'})</script>";   
    $updateGoTo = "../index.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $updateGoTo));
} else {
 echo 'error : ' . $handle->error;
}
} 

}   
}
