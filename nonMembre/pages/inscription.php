<h2>Inscription </h2>

<div id="inscription_nm">
    <section id="message"><?php if(isset($message)) print $message;?></section>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_inscription">
        <table>
            <tr>
                <td>Nom: </td>
                <td><input type="text" id="nom" name="nom"/></td>
            </tr>
            <tr>
                <td>Prénom: </td>
                <td><input type="text" id="prenom" name="prenom"/></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" id="mail" name="mail"/></td>
            </tr>
            <tr>
                <td>Rue: </td>
                <td><input type="text" id="rue" name="rue"/></td>
            </tr>
            <tr>
                <td>Numéro de rue: </td>
                <td><input type="text" id="num_rue" name="num_rue"/></td>
            </tr>
            <tr>
                <td>Ville: </td>
                <td><input type="text" id="ville" name="ville"/></td>
            </tr>
            <tr>
                <td>Code postal: </td>
                <td><input type="text" id="cp" name="cp"/></td>
            </tr>
            <tr>
                <td>Pays: </td>
                <td><input type="text" id="pays" name="pays"/></td>
            </tr>
            <tr>
                <td>Mot de passe: </td>
                <td><input type="password" id="password" name="password"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit_inscription" id="submit_inscription" value="S'inscrire"/>
                </td>
            </tr>
        </table>
    </form>
</div>
