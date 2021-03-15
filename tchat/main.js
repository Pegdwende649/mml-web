// JavaScript Document
function charger(){

    setTimeout( function(){
						 
	var premierID = $('#messages p:first').attr('id'); // on r�cup�re l'id le plus r�cent
						 
        // on lance une requ�te AJAX
        $.ajax({
            url : "tchat/charger.php",
            type : GET,
            success : function(html){
                $('#messages').prepend(html); // on veut ajouter les nouveaux messages au d�but du bloc #messages
            }
        });

        charger(); // on relance la fonction

    }, 5000); // on ex�cute le chargement toutes les 5 secondes

}

charger();