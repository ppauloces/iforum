<?php 
$verifica = $pdo->prepare("SELECT * FROM alunos WHERE num_matricula_aluno = :num_matricula_aluno OR name_user_aluno = :name_user_aluno");
$verifica->bindParam(':num_matricula_aluno', $colname_Usuario);
$verifica->bindParam(':name_user_aluno', $colname_Usuario);
$verifica->execute();
$res_verifica = $verifica->rowCount();
$row_verifica = $verifica->fetch( PDO::FETCH_ASSOC );

?>
<div class="col-md-12 grid-margin">
	<div class="card rounded">
		<?php 
		$buscaAluno = $pdo->prepare("SELECT * FROM alunos A, institutos I, estado E WHERE I.id_estado = :estado_id AND I.id_estado = E.id AND A.campus_aluno = I.nome_instituto");
		$buscaAluno->bindParam(':estado_id', $row_verifica['estado_aluno']);
		$buscaAluno->execute();
		$resBuscaAluno = $buscaAluno->fetchAll(PDO::FETCH_ASSOC);

		?>
		<div class="card-body">
			<h6 class="card-title">Próximos a você</h6>
			<?php 
			foreach($resBuscaAluno as $sugestoes){
				if($sugestoes['num_matricula_aluno'] != $colname_Usuario){
					
				if($sugestoes['foto_perfil']==""){
					$foto = "padrao.png";
				}else{
					$foto = $sugestoes['foto_perfil'];
				}

				?>
				<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
					<div class="d-flex align-items-center hover-pointer">
						<img class="img-xs rounded-circle" src="uploads/<?= $foto ?>" alt="">
						<div class="ml-2">
							<p><?= $sugestoes['nome_aluno'] ?></p>
							<p class="tx-11 text-muted">12 Mutual Friends</p>
						</div>
					</div>
					<button class="btn btn-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus" data-toggle="tooltip" title="" data-original-title="Connect">
							<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
							<circle cx="8.5" cy="7" r="4"></circle>
							<line x1="20" y1="8" x2="20" y2="14"></line>
							<line x1="23" y1="11" x2="17" y2="11"></line>
						</svg>
					</button>
				</div>
		<?php }} ?>
		</div>
	</div>
</div>