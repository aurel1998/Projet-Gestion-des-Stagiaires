$(document).ready(function () {

	$('#search').keyup(function() {
		var search=$(this).val();

		search=$.trim(search);
		//$('#resultat').text(search); //Normalement je suis sensé avoir le texte que je saisi s'afficher dans le div avec l'id #resultat ce qui marche pas


		if(search!=="")
		{
			$.post('traiRecherche_accueil.php',{search:search}, function(data) {
				$('#resultat').html(data);
			});
		}
	});

});
