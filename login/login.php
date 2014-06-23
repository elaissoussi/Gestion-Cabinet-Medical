
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Les Docteurs</title>
<link href="../boilerplate.css" rel="stylesheet" type="text/css">
<link href="../gird_style/gird_16.css" rel="stylesheet" type="text/css">
<link href="../style/head_style.css" rel="stylesheet" type="text/css">
<link href="../style/content_css.css" rel="stylesheet" type="text/css">
<link href="login_css/login_form_css.css" rel="stylesheet" type="text/css" />
</head>

<body>

<header>
	<nav>
    	<table  border="0" align="center" cellpadding="0" cellspacing="10">
  <tr>
    <td class="nav_b"><a href="../index.php">Acceuil</a></td>
    <td class="nav_b"><a href="../index.php#equipe">Equipe</a></td>
    <td class="nav_b"><a href="../index.php#contact">Contact</a></td>
    <td class="nav_b"><a href="login.php">Connexion</a></td>
  </tr>
</table>


  </nav>

</header>

	
<div id="form_content">
	<div id="login_form">
    <a id="titre">Identifiez-vous</a><br/><br/>
	<form action="" method="POST" name="login_form">
        <input name="identifiant" type="text" id="identifiant" size="50" placeholder="Votre Identifiant"><br/>
        
        <br/>
        <input name="motdepasse" type="password" id="motdepasse" size="50" placeholder="Votre mot de passe"><br/><br/>
        <label><input name="sesouvenir" type="checkbox" value="sesouvenir" />Se souvenir de moi lors de la prochaine connexion</label><br/><br/>
         <input class="bouton" name="login" type="submit" value="Log in" > </br></br>
         <a class="bouton" href="../index.php" > Créer un compte </a>

	<?php
// authentification 

 include '../php/authRegister.php';
 authen() ;

	?>

    </form>    
	</div>
</div>


<footer>
<div id="foot">Tous les droits sont réservés.</div>
</footer><!--end of footer-->
</body>
</html>