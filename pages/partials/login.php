<style type="text/css">
  ul ul {display: none; position: absolute; margin:0px; padding: 0px; border: 1px solid #B0B0B0;}
  li {list-style-type: none; position: relative; width: 140px; background-color: #DDDDDD; padding: 2px; margin: 0px}
  li:hover {background-color: #DDDDDD;}
  li:hover ul.niveau2, li li:hover ul.niveau3 {display: block}
  li {float:right;}
</style>

<ul class="niveau1">
  <li>
    <b>Connexion</b>
    <ul class="niveau2">
    	<form name="login">
		Nom d'utilisateur ou adresse mail: <input type="text" name="userid"/> <br/>
		Mot de passe: <input type="password" name="pswrd"/> <br/><br/>
		<input type="button" onclick="check(this.form)" value="Connexion"/>
 		</form>
 		<script language="javascript">
		function check(form){
			if(form.userid.value == "myuserid" && form.pswrd.value == "mypswrd")
				window.open('target.html')
			else
				alert("Identifiants erronés. Veuillez réessayer.")
		}
 		</script> 
    </ul>
  </li>
</ul>

<ul>
	<li>
		<a href="register"><b>Inscription</b></a>
	</li>
</ul>
