<html>

    <head>
    
        <title>Page d'inscription</title>
        <link rel="stylesheet" href="../static/stylesheet.css"/>
    
    </head>
    
    <body>
    
        <form action="index.php" method="post">
        
            <table>
            
            <tr>
            
            <td><label for="login"><strong>Identifiant :</strong></label></td>
            <td><input type="text" name="login" id="login"/></td>
            
            </tr>

            <tr>
            
            <td><label for="login"><strong>Adresse mail :</strong></label></td>
            <td><input type="mail" name="mail" id="mail"/></td>
            
            </tr>
            
            <tr>
            
            <td><label for="pass"><strong>Mot de passe :</strong></label></td>
            <td><input type="password" name="pass" id="pass"/></td>
            
            </tr>
            
            <tr>
            
            <td><label for="pass2"><strong>Confirmez le mot de passe :</strong></label></td>
            <td><input type="password" name="pass2" id="pass2"/></td>
            
            </table>
        
        <br/>

        <b><input type="submit" name="register" value="S'inscrire"/></b>
        
        </form>
    
    </body>

</html>

