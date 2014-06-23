
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

<?php   session_start() ?>
<header>
	<nav>
    	<table  border="0" align="center" cellpadding="0" cellspacing="10">
 <tr>
    <td class="nav_b"><a href="../index.php">Acceuil</a></td>
    <td class="nav_b"><a href="../index.php#equipe">Equipe</a></td>
    <td class="nav_b"><a href="../index.php#contact">Contact</a></td>
  
    <td class="nav_b"><a href="<?php 
                                    if(isset($_SESSION['l'])) { echo "../php/logout.php" ;}
                                    else { echo "login.php" ;} ?>">
                            
                                    <?php  if(isset($_SESSION['l'])) { echo "Deconnexion" ;}
                                               else { echo "Connexion" ;} ?>
  </a></td>

    
  </tr>
</table>


  </nav>

</header>

	
<div id="form_content">
	<div id="inscription_form">
    <a id="titre">Inscription Médecin</a><br/><br/>
	 <form action="" method="post" >
     

     <input name="nom" type="text" id="nom" size="50" placeholder=" Nom "><br/><br/>
     <input name="prenom" type="text" id="nom" size="50" placeholder=" Prénom "><br/><br/>
     <input name="identifiant" type="text" id="identifiant" size="50" placeholder="Votre Identifiant"><br/><br/>
     <input name="motdepasse" type="password" id="motdepassel" size="50" placeholder="Votre Mot de passe"><br/><br/>
     <input name="email" type="email" id="email" size="50" placeholder="Votre E-Mail"><br/><br/>
     <input name="datedenaissance" type="date" id="date" size="50" placeholder="Votre Date de naissance"><br/><br/>
     <label><input name="sexe" type="radio" value="Femme">Femme</label>
     <label><input name="sexe" type="radio" value="Homme">Homme</label><br/><br/>
     <input class="bouton" name="inscription" type="submit" value="Inscription">
     
 

<?php	

include '../php/authRegister.php';
register('Medecin') ;

	
?>   
     </form>  
	</div>
</div>


<footer>
<div id="foot">Tous les droits sont réservés.</div>
</footer><!--end of footer-->
</body>
</html>