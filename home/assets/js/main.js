$(function() {

  'use strict';

  $('.js-menu-toggle').click(function(e) {

    var $this = $(this);

    if ( $('body').hasClass('show-sidebar') ) {
      $('body').removeClass('show-sidebar');
      $this.removeClass('active');
    } else {
      $('body').addClass('show-sidebar'); 
      $this.addClass('active');
    }

    e.preventDefault();

  });

  // click outisde offcanvas
  $(document).mouseup(function(e) {
    var container = $(".sidebar");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('body').hasClass('show-sidebar') ) {
        $('body').removeClass('show-sidebar');
        $('body').find('.js-menu-toggle').removeClass('active');
      }
    }
  }); 



});

//função para carregar o Feed

function carregaFeed() {

  jQuery.ajax({
    type: "POST",
    url: "functions/feed.php",
    success: function (data)
    {
      $("#feed").html(data);
      load("#feed");
    }
  });


}




//limpar campo file
$("#btn-reset").on('click', function(){
  $('#file-input').val('');
  document.getElementById("preview").src = '';
  document.getElementById("previewMobile").src = '';
  $(this).hide();
});

//função que dá o preview da imagem antes de enviar
$(document).ready(function(){

  function readImage() {
    if (this.files && this.files[0]) {
      var file = new FileReader();
      file.onload = function(e) {
        document.getElementById("preview").src = e.target.result;
        document.getElementById("previewMobile").src = e.target.result;
      };       
      file.readAsDataURL(this.files[0]);
    }
  }



  // script para desabilitar o botao enquanto estiver sem nenhum dado nos campos
  document.getElementById("file-input").addEventListener("change", readImage, false);

  $('#message').on('input', function(){
    $('#but_upload').prop('disabled', $(this).val().length < 1);
  });

  $('#file-input').on('input', function(){
    $('#but_upload').prop('disabled', $(this).val().length < 1);
  });

  $('#messageMobile').on('input', function(){
    $('#but_uploadMobile').prop('disabled', $(this).val().length < 1);
  });

  $('#file-inputMobile').on('input', function(){
    $('#but_uploadMobile').prop('disabled', $(this).val().length < 1);
  });
  // fim do script



//funcao para enviar imagem via jquery
$("#but_uploadMobile").click(function(){

  var form=$("#postagemMobile");
  var data=new FormData($("#postagemMobile")[0]);

  $.ajax({
    url:'functions/post.php',
    type:"POST",
    data:data,
    processData: false,
    contentType: false,
    success:function(data){
      carregaFeed();
      location.reload();
    }

  });

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
      carregaFeed(console.log('teste'));
      location.reload();
    }

  });

});

$("#postagem").submit(function(){ return false;});
$("#postagemMobile").submit(function(){ return false;});

//recarregar pagina apos postagem
var btn = document.querySelector("#but_upload");
btn.addEventListener("click", function() {

    //location.reload();

  });

});