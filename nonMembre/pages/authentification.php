<h2>Authentification</h2>
<div id="formulaire_nm">
    <section id="message"><?php if(isset($message)) print $message;?></section>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth">
        <table>
            <tr>
                <td>Adresse mail:</td>
                <td><input type="text" id="mail" name="mail" /></td>
            </tr>
            <tr>
                <td>Mot de passe:</td>
                <td><input type="password" id="password" name="password" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit_login" id="submit_login" value="Login" />
                    <input type="reset" id="annuler" value="Annuler" />
                </td>	
            </tr>
        </table>	
    </form>
</div>

