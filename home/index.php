<?php 
require 'functions/conn.php';
require 'functions/session.php';
require 'functions/class.upload.php';


$pubs = $pdo->prepare("SELECT * FROM post ORDER BY id_post DESC");
//$pubs->bindParam(':num_matricula_aluno', $colname_Usuario);
$pubs->execute();
$res_pubs = $pubs->rowCount();
$row_pubs = $pubs->fetch( PDO::FETCH_ASSOC );


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
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>


        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">

        <!-- Bootstrap CSS -->

        <!-- Style Sidebar-->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/mystyle.css">

        <!--style index -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <style type="text/css">
            @media screen and (max-width: 576px) {
             .hidden-xs{
              display:none;
          }

          .visible-xs {
              display:block;
          }
      }
  </style>

  <title>Ifórum | Home</title>
</head>
<body onload="javascript:carregaFeed()">

    <?php include 'includes/sidebar.php' ?>

    <nav class="navbar navbar-light bg-white">
        <a href="#" class="navbar-brand"></a>

        <form class="form-inline" method="GET" id="buscar_aluno" action="users.php">
            <div class="input-group" style="margin-top:15px">
                <!--<input type="text" class="form-control" id="buscar_aluno_auto" name="buscar_aluno_auto">-->
                <input type="text" name="users" id="assunto" placeholder="Pesquisar usuários">
                <div class="input-group-append" >
                    <button class="btn back-ifba" type="submit" id="button-addon2">
                        <i class="fa fa-search text-white"></i>
                    </button>
                </div>
            </div>
            <div id="linkResultado"></div>
        </form>

    </nav>



    <div class="container-fluid gedf-wrapper" style="margin-top:15px">
        <div class="row">
            <div class="col-md-3 d-none d-md-block">
             <div class="card gedf-card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 gedf-main">

            <!--- \\\\\\\Post-->
            <div class="card gedf-card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Feed</a>
                        </li>
                            <!--<li class="nav-item">
                                <a class="nav-link text-ifba" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                            </li>-->
                        </ul>
                    </div>
                    <form method="POST" enctype="multipart/form-data" id="postagem" name="publi" action="#">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <div class="form-group">
                                        <label class="sr-only" for="message">post</label>
                                        <textarea name="post_text" class="form-control" style="resize: none;" id="message" rows="3" placeholder="Escreva algo legal!"></textarea>
                                        <div id="">
                                            <img id="preview" src="" width="120" style="padding-top:10px">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
                                    <button type="submit" id="but_upload" disabled name="publicar" class="btn back-ifba text-white">Compartilhar</button>
                                    <label for="file-input">
                                        <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 30px;margin: 5px;padding-top: 5px;cursor: pointer;"></i>    
                                    </label>
                                    <input type="file" id="file-input" name="file" style="display:none">
                                    <input type="hidden" name="MM_insert" id="inpuFile" value="publi">
                                </div>
                                <label for="btn-reset">
                                    <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 30px;margin: 5px;padding-top: 5px;cursor: pointer;"></i>
                                </label>
                                <input type="reset" id="btn-reset" onclick="javascript:limpar()" style="display:none">
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <!-- POST -->
                <div id="feed"><center><img src="assets/svg/loading.svg" width="50"></center></div>
            </div>
            <div class="col-md-3 d-none d-md-block">
             <div class="card gedf-card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="linkResultado"></div>
<span id="msg" style="color:red"></span><br/>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<script src="../login/js/popper.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../login/js/bootstrap.min.js"></script>
<script src="../login/js/main.js"></script>
<script src="assets/js/autocomplete.js"></script>
<script src="assets/js/main.js"></script>

<script type="text/javascript">



    function carregaFeed() {

        jQuery.ajax({
            type: "POST",
            url: "functions/feed.php",
            success: function (data)
            {
              $("#feed").html(data);
          }
      });


    }

    function limpar(){
        $(document).ready(function(){

            $('#file-input').val("");

     });
    }

    $(document).ready(function(){

        function readImage() {
            if (this.files && this.files[0]) {
                var file = new FileReader();
                file.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                };       
                file.readAsDataURL(this.files[0]);
            }
        }
        document.getElementById("file-input").addEventListener("change", readImage, false);


        $('#message').on('input', function(){
            $('#but_upload').prop('disabled', $(this).val().length < 1);
        });

        $('#file-input').on('input', function(){
            $('#but_upload').prop('disabled', $(this).val().length < 1);
        });

        $("#but_upload").click(function(){

          var form=$("#postagem");
          var data=new FormData($("#postagem")[0]);

          $.ajax({
            url:'functions/post.php',
            type:"POST",
            data:data,
            processData: false,
            contentType: false,
            success:function(data){

            }

        });

      });

        $("#postagem").submit(function(){ return false;});

        var btn = document.querySelector("#but_upload");
        btn.addEventListener("click", function() {

            location.reload();

        });

    });
</script>


</script>
</body>
</html>