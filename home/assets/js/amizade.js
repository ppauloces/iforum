$(document).ready(function(){
	$("#seguir").on("click",function(){
		var eu = $("#seguir").attr("eu")
		alert(eu)
		$.ajax({
			url: 'functions/newAmizade.php',
			type:'POST',
			data:{}
		})
	})
})