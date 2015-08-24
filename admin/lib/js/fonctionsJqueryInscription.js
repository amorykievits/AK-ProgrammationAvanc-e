$(document).ready(function(){
   $("#inscription_form").fadeIn(5000);
   $("#inscription").focus();
   //alert("bonjour");
   $('input#submit_inscription').on('click',function (event){
       nom = $("#nom").val();
       prenom = $("#prenom").val();
       mail = $("#mail").val();
       rue = $("#rue").val();
       num_rue = $("#num_rue").val();
       ville = $("#ville").val();
       cp = $("#cp").val();
       pays = $("#pays").val();
       password = $("#password").val();
       //alert(nom_user);
       if(($.trim(nom)!= '') && $.trim(prenom != '')){
           var data_form = $('form#form_inscription').serialize();
           //alert(data_form);
           $.ajax({
               type: 'POST',
               data: data_form,
               //dataType: "json",
               url: './admin/lib/php/ajax/AjaxInscription.php',
               success: function (data_du_php) {
                   if(data_du_php.retour == 1) {
                       $('#inscription_form').remove();
                       //alert(data_du_php.retour);
                       window.location.href = "./index.php?page=accueil_nm";
                       
                   }
                   else {
                       $('#inscription_form').remove();
                       window.location.href = "./index.php?page=accueil_nm";
                       alert('Inscription Réussie');
                   }
               },
               error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            },
           });
       }
       else {
           $('#message').html("Il reste des champs vides");
       }
       return false;
   });
});
