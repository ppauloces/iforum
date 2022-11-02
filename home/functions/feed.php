<?php
require 'conn.php';
require 'session.php';
require 'class.upload.php';
require 'functions.php';

/* QUERY PARA FILTRAR POSTS REFENTES AOS ALUNOS */
$pubs = $pdo->prepare("SELECT *,id_aluno FROM post,alunos WHERE id_aluno = id_usuario ORDER BY id_post DESC");
//$pubs->bindParam(':id_usuario', $usuarioID);
$pubs->execute();
$res_pubs = $pubs->rowCount();
$row_pubs1 = $pubs->fetchAll(PDO::FETCH_ASSOC);


foreach ($row_pubs1 as $pub) {
	/* VERIFICAR SE EXISTE RELAÇAO DE AMIZADE COM USUARIO QUE FEZ A POSTAGEM */
	$amizade = $pdo->prepare("SELECT * FROM amizade WHERE id_aluno_para=:id_aluno_para AND id_aluno_de=:id_aluno_de AND situacao = 1");
	$amizade->execute([
		'id_aluno_de' => $pub['id_aluno'],
		'id_aluno_para' => $usuarioID
	]); 
	$res_verifica_amzd = $amizade->rowCount();
	$row_verifica_amzd = $amizade->fetch(PDO::FETCH_ASSOC);
	
	/* VERIFICAÇÃO PARA QUE SE O USUARIO NAO TIVER FOTO, ELE ADICIONAR UMA PADRAO */
	if ($pub['foto_perfil'] == "") {
		$foto = "padrao.png";
	} else {
		$foto = $pub['foto_perfil'];
	}

	/* QUERY PARA VERIFICAR SE O POST JA FOI CURTIDO PELO USUARIO LOGADO */
	$verifica_query = "SELECT * FROM count_likes WHERE id_post=:id_post AND id_curtiu=:id_curtiu";
	$verifica = $pdo->prepare($verifica_query);
	$verifica->execute([
		'id_post' => $pub['id_post'],
		'id_curtiu' => $usuarioID
	]);
	$res_verifica_like = $verifica->rowCount();
	/* NAO EXISTE RELAÇAO DE CURTIDA */
	if ($res_verifica_like == 0) {
		$buttonLike = '<button class="card-link" id="like" id_post=' . $pub['id_post'] . ' style="all: unset;cursor:pointer"><div id="exibe"><i class="icon-thumbs-o-up"></i> Concordo com você</div></button>';
	}
	if ($res_verifica_like > 0) {

		/* CONTAR QUANTOS LIKES O POST POSSUI */
		$verifica_like = $pdo->prepare("SELECT COUNT(id_count) AS qnt_likes FROM count_likes");
		$verifica_like->execute();
		$qnt_likes = $verifica_like->fetch(PDO::FETCH_ASSOC);


		$countLike = $qnt_likes['qnt_likes'] - 1;
		if ($countLike == 0) {
			$buttonLike = '<button class="card-link" id="like" id_post=' . $pub['id_post'] . ' style="all: unset;cursor:pointer"><div id="exibe"><i class="fa fa-thumbs-up"></i> Somente você concordou, por enquanto</div></button>';
		} elseif ($countLike == 1) {
			$buttonLike = '<button class="card-link" id="like" id_post=' . $pub['id_post'] . ' style="all: unset;cursor:pointer"><div id="exibe"><i class="fa fa-thumbs-up"></i> Você, e mais ' . $countLike . ' pessoa concordaram</div></button>';
		} elseif ($countLike > 1) {
			$buttonLike = '<button class="card-link" id="like" id_post=' . $pub['id_post'] . ' style="all: unset;cursor:pointer"><div id="exibe"><i class="fa fa-thumbs-up"></i> Você, e mais ' . $countLike . ' pessoas concordaram</div></button>';
		}
	}
	if ($pub['id_aluno'] != $usuarioID) {
		$dropPost = '
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item d-flex align-items-center" href="#">
		<i class="fa fa-share-alt" aria-hidden="true"></i>
		<span class="">&nbspCompartilhar</span>
		</a>
		</div>';
	} else {
		$dropPost = '
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item d-flex align-items-center" href="#">
		<i class="fa fa-trash" style="font-size:20px"></i>
		<span class="">&nbspDeletar</span>
		</a>
		<a class="dropdown-item d-flex align-items-center" href="#">
		<i class="fa fa-share-alt" aria-hidden="true"></i>
		<span class="">&nbspCompartilhar</span>
		</a>
		</div>
		';
	}
	echo '<br>';
	if ($pub['media_post'] <> "") {
?>
		<div class="card gedf-card">
			<div class="card-header">
				<div class="float-right">
					<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
							<circle cx="12" cy="12" r="1"></circle>
							<circle cx="19" cy="12" r="1"></circle>
							<circle cx="5" cy="12" r="1"></circle>
						</svg>
					</button>
					<?= $dropPost ?>
				</div>
				<div class="d-flex justify-content-between align-items-center">
					<div class="d-flex justify-content-between align-items-center">
						<div class="mr-2">
							<img class="rounded-circle" width="45" src="uploads/' <?= $foto ?> " alt="">
						</div>
						<div class="ml-2">
							<div class="h5 m-0">@<?= $pub['name_user_aluno'] ?></div>
							<div class="h7 text-muted"><?= $pub['nome_aluno'] ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o">&nbsp</i><?= $pub['data'] ?></div>
				<p class="card-text">
					<?= $pub['texto_post'] ?>
				</p>
				<img src="uploads/posts/<?= $pub['media_post'] ?>" width="160" height="120">
			</div>
			<div class="card-footer">
				<?= $buttonLike ?>
				<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Up</a>
				<form method="POST" id="comment">
					<div class="input-group mb-3 pt-2">
						<input name="reply" id="resposta" type="text" class="form-control" placeholder="Adicionar comentário" aria-label="Adicionar comentário" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<label for="reply" class="">
								<input type="hidden" name="post_id" value="<?= $pub['id_post'] ?>">
								<a class="input-group-text"><button type="submit" id="comentario" style="all:unset"><i class="fa fa-mail-forward"></i></button></a>
							</label>
						</div>
					</div>
				</form>
				<hr>
				<div class="media-block pad-all">
					<a class="media-left" href="#"><img class="rounded-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar2.png"></a>
					<div class="media-body">
						<div class="mar-btm">
							<a href="#" class="btn-link text-semibold media-heading box-inline text-sm">Maria Leanz</a>
							<p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> - From Web - 2 min ago</p>
						</div>
						<p class="card-text">
							Resposta!
						</p>
						<div>
							<hr>
							<div class="btn-group">
								<h5><a href="#" class="card-link"><i class="icon-thumbs-o-up"></i></a></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	} else {
		?>
			<div class="card gedf-card">
				<div class="card-header">
					<div class="float-right">
						<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
								<circle cx="12" cy="12" r="1"></circle>
								<circle cx="19" cy="12" r="1"></circle>
								<circle cx="5" cy="12" r="1"></circle>
							</svg>
						</button>
						<?= $dropPost ?>
					</div>
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex justify-content-between align-items-center">
							<div class="mr-2">
								<img class="rounded-circle" width="55" src="uploads/<?= $foto ?>" alt="">
							</div>
							<div class="ml-2">
								<div class="h5 m-0">@<?= $pub['name_user_aluno'] ?></div>
								<div class="h7 text-muted"><?= $pub['nome_aluno'] ?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o">&nbsp</i><?= $pub['data'] ?></div>
					<p class="card-text">
						<?= $pub['texto_post'] ?>
					</p>
				</div>
				<div class="card-footer">
					<?= $buttonLike ?>
					<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Up</a>
					<div class="input-group mb-3 pt-2">
						<?php 
						if($res_verifica_amzd == 1){
						?>
						<input name="reply" id="comentario" type="text" class="form-control" placeholder="Adicionar comentário" aria-label="Adicionar comentário" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<label for="reply" class="">
								<input type="hidden" id="post_id" value=" <?= $pub['id_post'] ?> ">
								<a class="input-group-text"><button type="submit" id="getComentario" style="all:unset"><i class="fa fa-mail-forward"></i></button></a>
							</label>
						</div>
					<?php 
					}else{
						?>
						<hr>
						<center><p>Crie uma relação de amizade com <?= $pub['nome_aluno'] ?> para poder comentar</p></center>
						<hr>
						<?php 
					}
					?>
					</div>
					<hr>
					<?php

					$comentario_query = "SELECT * FROM comentarios,post,alunos WHERE id_post_resposta = id_post AND id_aluno_resposta = id_aluno";
					$comen = $pdo->prepare($comentario_query);
					$comen->execute();
					$comentario = $comen->fetch(PDO::FETCH_ASSOC);
					$count_com = $comen->rowCount();
					
					if ($count_com == 0) {
					?>

						<div class="media-block pad-all">
							<div class="media-body">
								<p class="card-text" id="reply">
								<center><p>Sem comentarios...</p></center>
								</p>
							</div>
							<div id="replys"></div>
						</div>

					<?php

					} else {
						
					$horario = $comentario['data_resposta'];
					$partes = explode(' ', $horario);
					$horas = explode(':',$partes[1]);
					$segundos = $horas[0] * 3600 + $horas[1] * 60 + $horas[2];
					?>

						<div class="media-block pad-all">
							<a class="media-left" href="#"><img class="rounded-circle img-sm" alt="Profile Picture" src="uploads/<?= $foto ?>"></a>
							<div class="media-body">
								<div class="mar-btm">
									<a href="#" class="btn-link text-semibold media-heading box-inline text-sm"><?= $comentario['nome_aluno']  ?></a>
									<p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> <?= timing($segundos) ?></p>
								</div>
								<p class="card-text" id="reply">
									<?= $comentario['resposta']  ?>
								</p>
								<div>
									<hr>
									<div class="btn-group">
										<h5><a href="#" class="card-link"><i class="icon-thumbs-o-up"></i></a></h5>
									</div>
								</div>
							</div>
							<div id="replys"></div>
						</div>

					<?php
					}

					?>
				</div>
		<?php

	}
}
		?>
		<script>
			$("#getComentario").on("click", function() {
				var reply = $("#comentario").val();
				var id_post = $("#post_id").val();
				$.ajax({
					url: "functions/comentarios.php",
					type: "POST",
					data: {
						reply: reply,
						id_post: id_post
					},
					success: function(a) {
						$("#reply").html(a);

					}
				})
			});
		</script>


		<script>
			$("#like").on("click", function() {
				var id_post = $("#like").attr("id_post");

				$.ajax({
					url: "functions/like_post.php",
					type: "POST",
					data: {
						id_post: id_post
					},
					success: function(a) {
						$("#like").html(a);

					}
				})
			});
		</script>