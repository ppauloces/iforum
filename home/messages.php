<?php 
require 'functions/conn.php';
require 'functions/session.php';
require 'functions/functions.php';


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
         <!-- Bootstrap CSS -->
         <!-- Style Sidebar-->
         <link rel="stylesheet" href="assets/css/style.css">
         <link rel="stylesheet" href="assets/css/mystyle.css">
         <!--style index -->
         <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="assets/css/profile.css">
         <title><?= $alunoInfo['nome_aluno']?> (@<?= $alunoInfo['name_user_aluno']?>)</title>
      </head>
      <body>

         <?php include 'includes/sidebar.php' ?>
         <main class="content">
    <div class="container p-0">

      <h1 class="h3 mb-3">Mensagens</h1>

      <div class="card">
         <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-3 border-right">

               <div class="px-4 d-none d-md-block">
                  <div class="d-flex align-items-center">
                     <div class="flex-grow-1">
                        <input type="text" class="form-control my-3" placeholder="Buscar...">
                     </div>
                  </div>
               </div>

               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="badge bg-success float-right">5</div>
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        Vanessa Tucker
                        <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                     </div>
                  </div>
               </a>
               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="badge bg-success float-right">2</div>
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="William Harris" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        William Harris
                        <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                     </div>
                  </div>
               </a>
               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        Sharon Lessman
                        <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                     </div>
                  </div>
               </a>
               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle mr-1" alt="Christina Mason" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        Christina Mason
                        <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                     </div>
                  </div>
               </a>
               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Fiona Green" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        Fiona Green
                        <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                     </div>
                  </div>
               </a>
               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="Doris Wilder" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        Doris Wilder
                        <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                     </div>
                  </div>
               </a>
               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle mr-1" alt="Haley Kennedy" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        Haley Kennedy
                        <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                     </div>
                  </div>
               </a>
               <a href="#" class="list-group-item list-group-item-action border-0">
                  <div class="d-flex align-items-start">
                     <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Jennifer Chang" width="40" height="40">
                     <div class="flex-grow-1 ml-3">
                        Jennifer Chang
                        <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                     </div>
                  </div>
               </a>

               <hr class="d-block d-lg-none mt-1 mb-0">
            </div>
            <div class="col-12 col-lg-7 col-xl-9">
               <div class="py-2 px-4 border-bottom d-none d-lg-block">
                  <div class="d-flex align-items-center py-1">
                     <div class="position-relative">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                     </div>
                     <div class="flex-grow-1 pl-3">
                        <strong>Sharon Lessman</strong>
                        <div class="text-muted small"><em>Typing...</em></div>
                     </div>
                     <div>
                        <button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
                     </div>
                  </div>
               </div>

               <div class="position-relative">
                  <div class="chat-messages p-4">

                     <div class="chat-message-right pb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                           <div class="font-weight-bold mb-1">You</div>
                           Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                        </div>
                     </div>

                     <div class="chat-message-left pb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                           <div class="font-weight-bold mb-1">Sharon Lessman</div>
                           Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                        </div>
                     </div>

                     <div class="chat-message-right mb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:35 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                           <div class="font-weight-bold mb-1">You</div>
                           Cum ea graeci tractatos.
                        </div>
                     </div>

                     <div class="chat-message-left pb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:36 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                           <div class="font-weight-bold mb-1">Sharon Lessman</div>
                           Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                           Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                        </div>
                     </div>

                     <div class="chat-message-left pb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:37 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                           <div class="font-weight-bold mb-1">Sharon Lessman</div>
                           Cras pulvinar, sapien id vehicula aliquet, diam velit elementum orci.
                        </div>
                     </div>

                     <div class="chat-message-right mb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:38 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                           <div class="font-weight-bold mb-1">You</div>
                           Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                        </div>
                     </div>

                     <div class="chat-message-left pb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:39 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                           <div class="font-weight-bold mb-1">Sharon Lessman</div>
                           Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                        </div>
                     </div>

                     <div class="chat-message-right mb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:40 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                           <div class="font-weight-bold mb-1">You</div>
                           Cum ea graeci tractatos.
                        </div>
                     </div>

                     <div class="chat-message-right mb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:41 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                           <div class="font-weight-bold mb-1">You</div>
                           Morbi finibus, lorem id placerat ullamcorper, nunc enim ultrices massa, id dignissim metus urna eget purus.
                        </div>
                     </div>

                     <div class="chat-message-left pb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:42 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                           <div class="font-weight-bold mb-1">Sharon Lessman</div>
                           Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                           Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                        </div>
                     </div>

                     <div class="chat-message-right mb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:43 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                           <div class="font-weight-bold mb-1">You</div>
                           Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                        </div>
                     </div>

                     <div class="chat-message-left pb-4">
                        <div>
                           <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                           <div class="text-muted small text-nowrap mt-2">2:44 am</div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                           <div class="font-weight-bold mb-1">Sharon Lessman</div>
                           Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                        </div>
                     </div>

                  </div>
               </div>

               <div class="flex-grow-0 py-3 px-4 border-top">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Type your message">
                     <button class="btn btn-primary">Send</button>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</main>
<script src="assets/js/jqueryoff.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquerypopper.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>-->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<!--<script src="assets/js/jqueryoff.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquerypopper.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>-->

<script>
   $("#seguir").on("click",function(){
      var eu = $("#seguir").attr("eu");
      var ele = $("#seguir").attr("ele");

      $.ajax({
         url: 'functions/newAmizade.php',
         type: 'POST',
         data: {eu:eu,ele:ele},
         success: function(a){
            $("#seguir").html(a);
         }
      })
   });
</script>
</body>
</html>
