<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
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

<!-- ***************************************************************************************** -->

<div id="content_compte">
	<div id="content_compte_gauche">
   	  <div id="profil">
<?php	
	  
include '../php/user.php';
include '../php/rendez_vous.php';

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
         <input class="bouton" name="modificationMedecin" type="submit" value="Modifier compte"></br>
        <input class="bouton" name="deconnexion" type="submit" value="Déconnexion">
        </form>


        </div><!--fin div données -->

      </div><!--fin profil -->
     
  </div><!--fin content_compte_gauche -->
  
<!-- ************************************************************************************* -->
  <div id="content_compte_droit">
    
     
   <?php 
    // modification du compte 
    if(isset($_POST['modificationMedecin'])){
    print'
    <div id="titre_div">
        modifier votre compte
    </div><!--fin de titre div -->
       
     <form action="compte_patient.php?id='.$_GET['id'].'" method="post"> <br/>
     <label>Nom</label><br/><input value="'.$resultat['nom'].'" name="nom" type="text" id="nom" size="50" placeholder="Votre Nom"><br/><br/>
     <label>Prenom</label><br/><input value="'.$resultat['prenom'].'" name="prenom" type="text" id="prenom" size="50" placeholder="Votre Prénom"><br/><br/>
     <label>Identifiant</label><br/><input value="'.$resultat['identifiant'].'" name="identifiant" type="text" id="identifiant" size="50" placeholder="Votre Identifiant"><br/><br/>  
     <label>Motdepasse</label><br/><input value="'.$resultat['motdepasse'].'" name="motdepasse" type="password" id="motdepassel" size="50" placeholder="Votre Mot de passe"><br/><br/>
     <label>Email</label><br/><input value="'.$resultat['email'].'" name="email" type="email" id="email" size="50" placeholder="Votre email"><br/><br/>
     <label>Date de naissance</label><br/><input value="'.$resultat['datedenaissance'].'" name="datedenaissance" type="date" id="date" size="50" placeholder="Votre date de naissance"><br/><br/>
     <label></label><input class="bouton"  name="modifierCompte" type="submit" value="modifier"></br></br>
    ';
     }

   if( isset($_POST['modifierCompte'])){
            updateUser() ;
            header('Location: ../compte/compte_medecin.php?id='.$_GET['id'].'');          

          }
    ?>



<!--************************************************************************************-->
    
<br/><br/>
    
	<div id="titre_div">Journal des Rendez-vous</div>
    <div id="donnees">Ici est la liste de vous rendez vous<br/><br/>
    
    <table width="100%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <th>Passion</th>
    <th>Date</th>
    <th>Heure</th>
    <th>Observation</th>
    <th>Ordenance</th>
    <th>Editer</th>
    
  </tr>
 
<?php
  
 $rendezvousMedecin = getAllRendezMedecin();
 while( $resultat = mysql_fetch_array($rendezvousMedecin))
	{ echo '<tr>';

  $patient = getUserById($resultat['id_patient']) ;

  echo '<tr>';
  echo '<td>'.$patient.'</td>';
  echo '<td>'.$resultat['date'].'</td>';
  echo '<td>'.$resultat['heure'].'</td>';
  echo '<td>'.$resultat['observation'].'</td>';
  echo '<td>'.$resultat['ordenance'].'</td>';
  echo '<td> <a href="compte_medecin.php?id='.$_GET['id'].'&idr='.$resultat['id'].'">Editer</a></td>';
  echo'</tr>';

}	

	?>
  </table>  
   </div><!--fin donnees -->


<br/><br/>

    <?php 

  if( isset($_GET['idr'])){

  $rendez  = getRendez($_GET['idr']);
  $observation= $rendez['observation'];
  $ordenance= $rendez['ordenance'];

  $patient = getUserById($rendez['id_patient']);
  print'
  <div id="titre_div">Espace Observation et Ordenance :</div>
  <div id="donnees">Ici vous pouvez communique les observations ainsi que les ordenances à vos passion :<br/><br/>    
  <form method="post" name="obs_ord">
          <label type="text" > Nom </label><br/>
          <input value ="'.$patient['nom'].'" type="text"/> <br/>
          <label type="text" >Prénom</label><br/>
          <input value ="'.$patient['prenom'].'" type="text"/> <br/><br/>
          <textarea  value="'.$observation.'" name="obsevation" id="msg_contact" cols="80" rows="6" placeholder="Observation"></textarea><br/><br/>
          <textarea  value="'.$ordenance.'"  name="ordenance" id="msg_contact" cols="80" rows="6" placeholder="Ordenance"></textarea><br/><br/>
          <input class="bouton" name="editeRendezVous" type="submit" value="Valider">
        
  </form>';



        }

    if( isset( $_POST['editeRendezVous']) ){

      updateRendez( $_POST['obsevation'],$_POST['ordenance'] );
      header('Location: ../compte/compte_medecin.php?id='.$_GET['id'].'');          
      
    }    
         

     ?>
  <br/>
</div>

</div><!--fin content_compte_droit -->
</div><!--fin content_compte -->





</body>
</html>