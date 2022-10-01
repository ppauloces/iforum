<?php 
require 'conn.php';
require 'session.php';

$amzd = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para = :id_aluno_para AND status_amizade = 0");
$amzd->bindParam(':id_aluno_para', $usuarioID);
$amzd->execute();
$res_amzd = $amzd->rowCount();
$row_amzd = $amzd->fetchAll( PDO::FETCH_ASSOC );

foreach ($row_amzd as $amzd) { 

    $buscaAluno = $pdo->prepare('SELECT * FROM alunos WHERE id_aluno = :id_aluno');
    $buscaAluno->bindParam(':id_aluno', $amzd['id_aluno_de']);
    $buscaAluno->execute();
    $resBuscaAlunoDe = $buscaAluno->fetch(PDO::FETCH_ASSOC);
    $rowBuscaAluno = $buscaAluno->rowCount();

    if($resBuscaAlunoDe['foto_perfil']==""){
      $foto = "padrao.png";
  }else{
      $foto = $resBuscaAlunoDe['foto_perfil'];
  }    

  echo '<div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
      <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="uploads/'.$foto.'" width="50" alt="" />
      </div>
      <div class="font-weight-bold mr-3">
          <div class="text-truncate">'.$resBuscaAlunoDe['nome_aluno'].'</div>
          <div class="small">Pediu para seguir você</div>
          <div class="mb-3 mt-1">
              <button type="button" class="btn btn-danger" id_de='.$amzd['id_aluno_de'].' id="excluir">
                  <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 19">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"></path>
                </svg>
            </button>
            <button type="button" class="btn btn-success" id_de='.$amzd['id_aluno_de'].' id="aceitar">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 19">
                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                </svg>
            </button>
        </div>
    </div>
    <span class="ml-auto mb-auto">
      <br />
      <div class="text-right text-muted pt-1">3d</div>
  </span>
</div>';

echo '<script>
   $("#excluir").on("click",function(){
      var ele = $("#excluir").attr("id_de");

      $.ajax({
         url: "functions/DeletarAmizade.php",
         type: "POST",
         data: {ele:ele},
         success: function(a){
            $("#excluir").html(a);
            
         }
      })
   });
</script>';
}

?>