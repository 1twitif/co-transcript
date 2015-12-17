<?php
    if (isset($_GET['inscription']) && $_POST['login']){
        include 'src/account.php';
        include 'src/dbConnector.php';
        //sécuriser les entrées
        $username = substr(preg_replace("/[^A-Z a-z0-9._-]/", "", $_POST["login"]), 0, 30);
        $emailPattern = '/^.+@.+\.[a-z]{2,}$/';
        $email = substr(preg_replace("/[^A-Z a-z0-9._-]/", "", $_POST['mail']), 0, 255);
        if (!preg_match($emailPattern, $email))
            throw new Exception ("Wrong email: $email", 400);
        $password = $_POST['pass'];
        if ($_POST['pass'] != $_POST['pass2'])
            throw new Exception "Passwords doesn't match", 400);
        //inscription effective
        $auth = new Account(new DbConnector);
        $auth->create($email, $username, $password);

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
