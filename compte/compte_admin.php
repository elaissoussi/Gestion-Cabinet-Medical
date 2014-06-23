


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Les Docteurs </title>
<link href="../boilerplate.css" rel="stylesheet" type="text/css">
<link href="../gird_style/gird_16.css" rel="stylesheet" type="text/css">
<link href="../style/head_style.css" rel="stylesheet" type="text/css">
<link href="../style/content_css.css" rel="stylesheet" type="text/css">
<link href="compte_css/style_compte.css" rel="stylesheet" type="text/css" />
<link href="compte_css/content_gauche.css" rel="stylesheet" type="text/css" />
</head>

<body>

<header>
<?php  session_start ();?>

<nav>
    	<table  border="0" align="center" cellpadding="0" cellspacing="10">
<tr>
    <td class="nav_b"><a href="../index.php">Acceuil</a></td>
    <td class="nav_b"><a href="../index.php#equipe">Equipe</a></td>
    <td class="nav_b"><a href="../index.php#contact">Contact</a></td>
  
    <td class="nav_b"><a href="<?php 
                                    if(isset($_SESSION['l'])) { echo "../php/logout.php" ;}
                                    else { echo "login/login.php" ;} ?>">
                            
                                    <?php  if(isset($_SESSION['l'])) { echo "Deconnexion" ;}
                                               else { echo "Connexion" ;} ?>
  </a></td>

    
  </tr>
</table>
</nav>
</header>


<div id="content_compte">
	<div id="content_compte_gauche">
   	  <div id="profil">
       

        <?php	
	  
        include '../php/user.php';
        $resultat = getUser();

        if(isset($_POST['deconnexion'])){
    
        header('Location: ../php/logout.php');
        
        }  
          ?>


      	<div id="titre_div">
        Profil :
        </div><!--fin de titre div -->
 <div id="donnees">

        <a>Nom :</a><br/><?php echo $resultat['nom'];?><br/><br/>
        <a>Identifiant:</a><br/><?php echo $resultat['identifiant'];?><br/><br/>
        <a>date de naissance:</a><br/><?php echo $resultat['datedenaissance'];?><br/><br/>
        <a>E-Mail :</a><br/><?php echo $resultat['email'];?><br/><br/>
        <a>Sexe :</a><br/><?php echo $resultat['sexe'];?><br/><br/>
        <a>Type de Compte :</a><br/><?php echo $resultat['profile'];?><br/><br/>

    <form action="" method="post" name="deconnexion">

         <input class="bouton" name="modification" type="submit" value="Modifier compte"></br>
         <input class="bouton" name="deconnexion" type="submit" value="Déconnexion">
        
   </form>
        </div><!--fin div données -->

      </div><!--fin profil -->
     

  </div><!--fin content_compte_gauche -->
    <div id="content_compte_droit">
    	<div id="titre_div">
        Médecin <a href="../login/inscription_medecin.php">Clickez ici pour crée un compte Médecin</a>
        </div><!--fin de titre div -->
        <div id="donnees">
          <br/>

  <div id="don_adlin">
  <table width="100%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <th>Nom</th>
    <th>Identifiant</th> 
    <th>Option</th>
  </tr>


 <?php
  
 $medecins = getMedecin();
 while( $resultat_2 = mysql_fetch_array($medecins))
	{ echo '<tr>';
	
	echo '<td>'.$resultat_2['nom'].'</td>';
	echo '<td>'.$resultat_2['identifiant'].'</td>';
	
	echo '<td>'.'<img id="ico_mem" src="../images/icon/1369531944_user_profile.png" alt="profile" />'.'<img  id="ico_mem"src="../images/icon/1369531963_settings.png" alt="option" />'.'</td>';
	
	echo'</tr>';
	}
?>
</table>
      
</div>
   </div><!--fin donnees --><br/>
   <div id="titre_div">
        Patient
    </div><!--fin de titre div -->
  <div id="donnees">
  <br/>
      <div id="don_adlin">
      
      	<table width="100%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <th>Nom</th>
    <th>Identifiant</th> 
    <th>Option</th>
    
    
  </tr>
 
    <?php

  $patients = getAllUser();
 while( $resultat_2 = mysql_fetch_array($patients))
  { echo '<tr>';
  
  echo '<td>'.$resultat_2['nom'].'</td>';
  echo '<td>'.$resultat_2['identifiant'].'</td>';
  
  echo '<td>'.'<img id="ico_mem" src="../images/icon/1369531944_user_profile.png" alt="profile" />'.'<img  id="ico_mem"src="../images/icon/1369531963_settings.png" alt="option" />'.'</td>';
  
  echo'</tr>';
  }
	?>
      	</table>
      	 </div><!--fin div don_membre-->
   </div><!--fin donnees -->
  </div><!--fin content_compte_droit -->
</div><!--fin content_compte -->





</body>
</html>
