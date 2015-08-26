$(document).ready(function() {
    
    $('input#submit_produit').on('click', function (event) {
        id_utilisateur = $("#id_utilisateur").val();
        prix = $("#prix").val();
        quantite = $("#quantite").val();
        id_prod = $("#id_prod").val();
        if(quantite !=0){
            
            $.ajax({
                type: 'POST',
                data: "id_utilisateur="+id_utilisateur+"&prix="+prix+"&id_prod="+id_prod+"&quantite="+quantite,
                url: './admin/lib/php/ajax/AjaxProduit.php',
                success: function(data_du_php) {
                    if(data_du_php.retour==1){
                       
                        window.location.href="./index.php";
                        
                    }
                    else {
                        alert("Erreur");
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
                alert(msg+ jqXHR.responseText);
            }, 
            });
        }
        return false;
    });
});

