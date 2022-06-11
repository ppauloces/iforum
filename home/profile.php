	<?php 
	require 'functions/conn.php';
	require 'functions/session.php';

	?>

	<!doctype html>
		<html lang="pt-br">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

			<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
			crossorigin="anonymous">

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
			crossorigin="anonymous"></script>


			<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

			<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

			<link rel="stylesheet" href="assets/fonts/icomoon/style.css">

			<link rel="stylesheet" href="assets/css/owl.carousel.min.css">

			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

			<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
			crossorigin="anonymous">

			<!-- Bootstrap CSS -->

			<!-- Style Sidebar-->
			<link rel="stylesheet" href="assets/css/style.css">
			<link rel="stylesheet" href="assets/css/mystyle.css">

			<!--style index -->
			<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="assets/css/profile.css">

			<title>Sidebar #1</title>
		</head>
		<body>

			<?php include 'includes/sidebar.php' ?>

			<div class="container">
				<div class="profile-page tx-13">
					<div class="row">
						<div class="col-12 grid-margin">
							<div class="profile-header">
								<div class="cover">
									<div class="gray-shade"></div>
									<figure>
										<img src="https://bootdey.com/img/Content/bg1.jpg" class="img-fluid" alt="profile cover">
									</figure>
									<div class="cover-body d-flex justify-content-between align-items-center">
										<div>
											<img class="profile-pic" src="<?= $row_verifica['foto_perfil'] ?>" alt="profile">
											<span class="profile-name"><?= $row_verifica['nome_aluno'] ?></span>
										</div>
										<div class="d-none d-md-block">
											
										</div>
									</div>
								</div>
								<br>
								<div class="header-links">
									<ul class="links d-flex align-items-center mt-3 mt-md-0">
										<li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
											<a class="pt-1px  d-md-block" href="#">Seguindo <span class="text-muted tx-12">356</span></a>
										</li>
										<li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
											<a class="pt-1px d-md-block" href="#">Seguidores <span class="text-muted tx-12">3,765</span></a>
										</li>
										<li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
											<a class="pt-1px d-md-block" href="#">Editar Perfil</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row profile-body">
						<!-- left wrapper start -->
						<div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
							<div class="card rounded">
								<div class="card-body">
									<div class="d-flex align-items-center justify-content-between mb-2">
										<h6 class="card-title mb-0">About</h6>
										<div class="dropdown">
											<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px">
													<circle cx="12" cy="12" r="1"></circle>
													<circle cx="19" cy="12" r="1"></circle>
													<circle cx="5" cy="12" r="1"></circle>
												</svg>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item d-flex align-items-center" href="#">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm mr-2">
														<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
													</svg> <span class="">Edit</span></a>
													<a class="dropdown-item d-flex align-items-center" href="#">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-branch icon-sm mr-2">
															<line x1="6" y1="3" x2="6" y2="15"></line>
															<circle cx="18" cy="6" r="3"></circle>
															<circle cx="6" cy="18" r="3"></circle>
															<path d="M18 9a9 9 0 0 1-9 9"></path>
														</svg> <span class="">Update</span></a>
														<a class="dropdown-item d-flex align-items-center" href="#">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm mr-2">
																<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
																<circle cx="12" cy="12" r="3"></circle>
															</svg> <span class="">View all</span></a>
														</div>
													</div>
												</div>
												<p>Hi! I'm Amiah the Senior UI Designer at Vibrant. We hope you enjoy the design and quality of Social.</p>
												<div class="mt-3">
													<label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
													<p class="text-muted">November 15, 2015</p>
												</div>
												<div class="mt-3">
													<label class="tx-11 font-weight-bold mb-0 text-uppercase">Lives:</label>
													<p class="text-muted">New York, USA</p>
												</div>
												<div class="mt-3">
													<label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
													<p class="text-muted">me@nobleui.com</p>
												</div>
												<div class="mt-3">
													<label class="tx-11 font-weight-bold mb-0 text-uppercase">Website:</label>
													<p class="text-muted">www.nobleui.com</p>
												</div>
												<div class="mt-3 d-flex social-links">
													<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github" data-toggle="tooltip" title="" data-original-title="github.com/nobleui">
															<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
														</svg>
													</a>
													<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter" data-toggle="tooltip" title="" data-original-title="twitter.com/nobleui">
															<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
														</svg>
													</a>
													<a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram" data-toggle="tooltip" title="" data-original-title="instagram.com/nobleui">
															<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
															<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
															<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
									<!-- left wrapper end -->
									<!-- middle wrapper start -->
									<div class="col-md-8 col-xl-6 middle-wrapper">
										<div class="row">
											<div class="col-md-12 grid-margin">
												<div class="card gedf-card">
													<div class="card-header">
														<div class="d-flex justify-content-between align-items-center">
															<div class="d-flex justify-content-between align-items-center">
																<div class="mr-2">
																	<img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
																</div>
																<div class="ml-2">
																	<div class="h5 m-0">@<?= $row_verifica['name_user_aluno'] ?></div>
																	<div class="h7 text-muted"><?= $row_verifica['nome_aluno'] ?></div>
																</div>
															</div>
														</div>

													</div>
													<div class="card-body">
														<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> Hace 40 min</div>
														<a class="card-link" href="#">
															<h5 class="card-title">Totam non adipisci hic! Possimus ducimus amet, dolores illo ipsum quos
															cum.</h5>
														</a>

														<p class="card-text">
															Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sunt fugit reprehenderit consectetur exercitationem odio,
															quam nobis? Officiis, similique, harum voluptate, facilis voluptas pariatur dolorum tempora sapiente
															eius maxime quaerat.
															<a href="https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU" target="_blank">https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU</a>
														</p>
													</div>
													<div class="card-footer">
														<a href="#" class="card-link"><i class="icon-thumbs-o-up"></i> Like</a>
														<a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
														<a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
													</div>
												</div>
											</div>
											<div class="col-md-12">

											</div>
										</div>
									</div>
									<!-- middle wrapper end -->
									<!-- right wrapper start -->
									<div class="d-none d-xl-block col-xl-3 right-wrapper">
										<div class="row">
											<div class="col-md-12 grid-margin">
												<div class="card rounded">
													<div class="card-body">
														<h6 class="card-title">latest photos</h6>
														<div class="latest-photos">
															<div class="row">
																<div class="col-md-4">
																	<figure>
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure>
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure>
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure>
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure>
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure>
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure class="mb-0">
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure class="mb-0">
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="">
																	</figure>
																</div>
																<div class="col-md-4">
																	<figure class="mb-0">
																		<img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar9.png" alt="">
																	</figure>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 grid-margin">
												<div class="card rounded">
													<div class="card-body">
														<h6 class="card-title">suggestions for you</h6>
														<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
															<div class="d-flex align-items-center hover-pointer">
																<img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
																<div class="ml-2">
																	<p>Mike Popescu</p>
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
														<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
															<div class="d-flex align-items-center hover-pointer">
																<img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
																<div class="ml-2">
																	<p>Mike Popescu</p>
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
														<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
															<div class="d-flex align-items-center hover-pointer">
																<img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
																<div class="ml-2">
																	<p>Mike Popescu</p>
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
														<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
															<div class="d-flex align-items-center hover-pointer">
																<img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
																<div class="ml-2">
																	<p>Mike Popescu</p>
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
														<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
															<div class="d-flex align-items-center hover-pointer">
																<img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
																<div class="ml-2">
																	<p>Mike Popescu</p>
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
														<div class="d-flex justify-content-between">
															<div class="d-flex align-items-center hover-pointer">
																<img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
																<div class="ml-2">
																	<p>Mike Popescu</p>
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

													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- right wrapper end -->
								</div>
							</div>
						</div>

						<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
						crossorigin="anonymous"></script>
						<script src="assets/js/autocomplete.js"></script>
						<script src="assets/js/main.js"></script>
					</body>
					</html>