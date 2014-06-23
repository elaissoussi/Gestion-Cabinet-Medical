
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

</div>
<!--fin div données -->

      </div><!--fin profil -->
     
  </div><!--fin content_compte_gauche -->

    <div id="content_compte_droit">
    <?php 
    // modification du compte 
    if(isset($_POST['modification'])){
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


    <!-- Rendezvous************************************************************************************ -->
    
    <div id="titre_div">
        Prendre un Rendez-vous
    </div>

    <div id="donnees">
        Prenez un Rendez-vous en remplissant le formulaire suivant :<br/><br/>
    <div id="rendezvous_form">
     
   <!-- Rendez vous Medecin  -->
     <form action="" method="post" >
       
      <select name="id_medecin"> 
			<option value="">-- Selectionner votre Médecin --</option>
  <?php
      
      $medecins = getMedecin();      
      
      while( $m = mysql_fetch_array($medecins)) {
      
          echo '<option value='.$m['id'].'>'.$m['nom'].'  '.$m['prenom'].'</option>';

       }		
   ?>
					   
    </select>						
		
    <input name="date" type="date" id="date" size="50" placeholder="Date du Rendez-vous">	
    <input name="heure" type="time" id="heur" size="50" placeholder="Heur du Rendez-vous"><br/><br/>
    <input class="bouton" name="addrendez-vous" type="submit" value="Valider">
       
  </form>


  <?php 

    include '../php/rendez_vous.php';

   if( isset($_POST['id_medecin'])  and isset($_POST['date'])  and isset($_POST['heure'] ) ){

      addrendez($_POST['id_medecin'] , $_POST['date'] , $_POST['heure']) ;
      header('Location: ../compte/compte_patient.php?id='.$_GET['id'].'');          


    }
    else{

      echo 'SVP Remplir Tous les champs';
    }

    ?>
      </div>
 </div>
	
		<br/>	
	<div id="titre_div">Journal des Rendez-vous</div>
    <div id="donnees">Ici est la liste de vous rendez vous<br/><br/>
    
    <table width="100%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <th>Médecin</th>
    <th>Date</th>
    <th>Heure</th>
    <th>Observation</th>
    <th>Ordenance</th>  
  </tr>
 
  <?php
   $allrendez_vous = getAllRendez();

  while( $resultat_2 = mysql_fetch_array($allrendez_vous))
	{ 

  $medecin = getUserById($resultat_2['id_medecin']) ;

  echo '<tr>';
	echo '<td>'.$medecin.'</td>';
	echo '<td>'.$resultat_2['date'].'</td>';
	echo '<td>'.$resultat_2['heure'].'</td>';
	echo '<td>'.$resultat_2['observation'].'</td>';
	echo '<td>'.$resultat_2['ordenance'].'</td>';
	echo'</tr>';

	}
	?>

  </table>  
   </div><!--fin donnees -->
  </div><!--fin content_compte_droit -->
</div><!--fin content_compte -->



</body>
</html>
