<?php
    if ($_GET['inscription']){
        include 'src/account.php';
        //sécuriser les entrées
        $username = 'Luc';
        $email = 'a@b.cd';
        $password = '1234';
        //inscription effective
        //$auth = new Account(new mockDBConnector);
        //$auth->create($email, $username, $password);

    }

include 'partials/head.php';
include 'partials/header.php';
?>

<form action="?inscription=1" method="post">
            <table>
            <tr><td><label for="login"><strong>Identifiant :</strong></label></td>
            <td><input type="text" name="login" id="login"/></td></tr>

            <tr><td><label for="login"><strong>Adresse mail :</strong></label></td>
            <td><input type="mail" name="mail" id="mail"/></td></tr>
            
            <tr><td><label for="pass"><strong>Mot de passe :</strong></label></td>
            <td><input type="password" name="pass" id="pass"/></td></tr>
            
            <tr><td><label for="pass2"><strong>Confirmez le mot de passe :</strong></label></td>
            <td><input type="password" name="pass2" id="pass2"/></td>
            </table>
        <br/>

        <b><input type="submit" name="register" value="S'inscrire"/></b>
        
</form>

<?php

include 'partials/footer.php';

?>
