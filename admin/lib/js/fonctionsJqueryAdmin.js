$(document).ready(function () {

    $("#login_form").fadeIn(3000);
    $("#mail").focus();
    $("#annuler").click(function () {
        $("#login_form").fadeOut("2000");
        window.location.href = "../magasinComics/index.php";
    });

    $('input#submit_login').on('click', function (event) {
        login = $("#mail").val();
        password = $("#password").val();
        if ($.trim(mail) != '' && $.trim(password != '')) {

            var data_form = $('form#form_auth').serialize();
            $.ajax({
                type: 'POST',
                data: data_form, 
                url: './admin/lib/php/ajax/AjaxLogin.php',		
                success: function (data_du_php) {
                    if (data_du_php.retour == 2) {
                        $('#login_form').remove();
                        window.location.href = "./index.php";
                    }
                    else {
                        $('#message').html("Données incorrectes"+data_du_php.retour);
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
        else {
            $('#message').html("Remplissez les champs");
        }
        return false;
    });
});

