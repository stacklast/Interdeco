$(document).ready(function(){
	$('#busqueda').click(function() {
		var cliente = $('#buscarcliente').val();
		$.ajax({
				type: "POST",
				url: "/Github/Interdeco/Modelo/DAO/Cls.DAO.Combos.php",
				data: datos,
				success: function(response) {
						//alert(response);
						$('#ciudad').append(response);
				},
				error: function(response) {
				}
		});
		return false;
	});
});