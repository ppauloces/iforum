<?php 
require 'conn.php';
require 'session.php';
require 'class.upload.php';


extract($_POST);

$senhaAtualHash = md5($senhaAtual);

if(empty($senhaAtualHash) || empty($novaSenha) || empty($novaSenha)){

	if ($email_aluno != $email_antigo) {

	//VERIFICA SE JÁ EXISTE UM USUÁRIO
		$verifica = $pdo->prepare("SELECT * FROM alunos WHERE email_aluno = :email");
		$verifica->bindParam(':email', $email_aluno);
		$verifica->execute();
		$res_verifica = $verifica->rowCount();
		$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC ); 

	} else {
		$res_verifica = 0;	
	}

	if($res_verifica > 0){
		echo "
		<script>  
		Swal.fire({
			icon: 'warning',
			title: 'Atenção',
			text: 'Esse email já foi obtido!',
			});
			</script>
			";
			die();

		}else{

		/*
		*Author: Paulo Amaral
		*Data: 11/07/2022
		*Função: Query que fará update sem a mudança da senha.
		*/
		if($_FILES['foto_perfil']['error'] > 0){
			$updDadosAluno = $pdo->prepare("UPDATE alunos SET nome_aluno = :nome, name_user_aluno = :user, email_aluno = :email, bio_aluno = :bio_aluno WHERE id_aluno = :id_aluno");
			$updDadosAluno->execute(array(
				':nome' => $name,
				':user' => $username,
				':email' => $email_aluno,
				':bio_aluno' => $bio_aluno,
				':id_aluno' => $id_aluno
			));

			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Informações atualizadas com sucesso!',
				showConfirmButton: false,
				timer: 1300
				})
				setTimeout(function () { window.location.reload() }, 1500);
				</script>";
				die();
			}

			$handle = new Upload($_FILES['foto_perfil']);
			$novo_nome = md5(uniqid()); 

			if ($handle->uploaded) 
			{ 
				
				$handle->image_resize          = true;
				$handle->image_ratio_pixels    = 10000;
				$handle->jpeg_quality = 300;
				$handle->file_new_name_body = $novo_nome;
				$handle->mime_check = true;
				$handle->allowed = array('image/*');
				$handle->file_max_size = '20242880'; // 1KB
				$handle->Process('../uploads/');

				if ($handle->processed) 
				{

					$nome_do_arquivo = $handle->file_dst_name;  

					$updDadosAluno = $pdo->prepare("UPDATE alunos SET nome_aluno = :nome, name_user_aluno = :user, foto_perfil = :foto, email_aluno = :email, bio_aluno = :bio_aluno WHERE id_aluno = :id_aluno");
					$updDadosAluno->execute(array(
						':nome' => $name,
						':user' => $username,
						':foto' => $nome_do_arquivo,
						':email' => $email_aluno,
						':bio_aluno' => $bio_aluno,
						':id_aluno' => $id_aluno
					));


					echo "<script>
					Swal.fire({
						icon: 'success',
						title: 'Informações atualizadas com sucesso!',
						showConfirmButton: false,
						timer: 1300
						})
						setTimeout(function () { window.location.reload() }, 1500);
						</script>";
						die();


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

		}else{



	/*
	*Author: Paulo Amaral
	*Data: 11/07/2022
	*Função: Verifica se a senha digitada no input da senha atual, está correta, se não cairá no else.
	*/
	if($senhaAtualHash === $row_verifica['senha_aluno']){

		/*
		*Author: Paulo Amaral
		*Data: 11/07/2022
		*Função: Verifica se as senhas digitadas nos inputs são iguais, se não forem, cairá no else.
		*/
		if($novaSenha === $novaSenha1){

			/*
			*Author: Paulo Amaral
			*Data: 11/07/2022
			*Função: Verifica se o email cadastrado são diferentes entre si, se não forem, ele verifica se o email já existe.
			*se existir, o $row_verifica será maior que 0 indicando que já existe um mesmo email nesse banco de dados.
			*/
			if ($email_aluno != $email_antigo) {

				$verifica = $pdo->prepare("SELECT * FROM alunos WHERE email_aluno = :email");
				$verifica->bindParam(':email', $email_aluno);
				$verifica->execute();
				$res_verifica = $verifica->rowCount();
				$row_verifica = $verifica->fetchAll( PDO::FETCH_ASSOC ); 

			} else {
				$res_verifica = 0;	
			}

			if($res_verifica > 0){
				echo "
				<script>  
				Swal.fire({
					icon: 'warning',
					title: 'Atenção',
					text: 'Esse email já foi obtido!',
					});
					</script>
					";
					die();
				}else{
					$novaSenhaMD5 = md5($novaSenha1);

					if($_FILES['foto_perfil']['error'] > 0){
						$updDadosAluno = $pdo->prepare("UPDATE alunos SET nome_aluno = :nome, name_user_aluno = :user, email_aluno = :email, bio_aluno = :bio_aluno, senha_aluno = :senha WHERE id_aluno = :id_aluno");
						$updDadosAluno->execute(array(
							':nome' => $name,
							':user' => $username,
							':email' => $email_aluno,
							':senha' => $novaSenhaMD5,
							':bio_aluno' => $bio_aluno,
							':id_aluno' => $id_aluno
						));

						echo "<script>
						Swal.fire({
							icon: 'success',
							title: 'Informações atualizadas com sucesso!',
							showConfirmButton: false,
							timer: 1300
							})
							setTimeout(function () { window.location.reload() }, 1500);
							</script>";
							die();
						}

						$handle = new Upload($_FILES['foto_perfil']);
						$novo_nome = md5(uniqid()); 

						if ($handle->uploaded) 
						{ 
							$handle->image_crop = '5 20%';
							$handle->file_new_name_body = $novo_nome;
							$handle->mime_check = true;
							$handle->allowed = array('image/*');
							$handle->file_max_size = '20242880'; // 1KB
							$handle->Process('../uploads/');

							if ($handle->processed) 
							{

								$nome_do_arquivo = $handle->file_dst_name;  

								$updDadosAluno = $pdo->prepare("UPDATE alunos SET nome_aluno = :nome, name_user_aluno = :user, foto_perfil = :foto, email_aluno = :email, bio_aluno = :bio_aluno WHERE id_aluno = :id_aluno");
								$updDadosAluno->execute(array(
									':nome' => $name,
									':user' => $username,
									':foto' => $nome_do_arquivo,
									':email' => $email_aluno,
									':bio_aluno' => $bio_aluno,
									':id_aluno' => $id_aluno
								));


								echo "<script>
								Swal.fire({
									icon: 'success',
									title: 'Informações atualizadas com sucesso!',
									showConfirmButton: false,
									timer: 1300
									})
									setTimeout(function () { window.location.reload() }, 1500);
									</script>";
									die();


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

							echo "<script>
							Swal.fire({
								icon: 'success',
								title: 'Informações atualizadas com sucesso!',
								showConfirmButton: false,
								timer: 1300
								})
								setTimeout(function () { window.location.reload() }, 1500);
								</script>";
								die();

							}	

						}else{
							echo "
							<script>  
							Swal.fire({
								icon: 'warning',
								title: 'Atenção',
								text: 'As senhas não coincidem',
								});
								</script>
								";
								die();
							}
						}else{


							echo "
							<script>  
							Swal.fire({
								icon: 'warning',
								title: 'Atenção',
								text: 'Senha de usuário incorreta ou o campo está vazio!',
								});
								</script>
								";
								die();
							}





						}






					?>