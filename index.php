<!doctype html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Les Docteurs</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="gird_style/gird_16.css" rel="stylesheet" type="text/css">
<link href="style/head_style.css" rel="stylesheet" type="text/css">
<link href="style/content_css.css" rel="stylesheet" type="text/css">
<script src="respond.min.js"></script>
</head>

<!--  End Head-->
<body>

<div id="haut">
<table id="bouton" width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#810303" class="bouton"><a href="#top">Haut</a></td>
  </tr>
</table>
</div>

<!-- Header -->
<?php  

session_start() ;

?>

<header>
	<nav>
       <table  border="0" align="center" cellpadding="0" cellspacing="10">
          <tr>
            
            <td class="nav_b"><a href="index.php">Acceuil</a></td>  
            <td class="nav_b"><a href="index.php#equipe">Equipe</a></td>
            <td class="nav_b"><a href="index.php#contact">Contact</a></td>
          
            <?php 
              if( isset( $_SESSION['l']) and isset($_SESSION['id'])){
                
                $profile = $_SESSION['l'] ;

                      if( $profile == "Patient")
                      print '<td class="nav_b"><a href="compte/compte_patient.php?id='.$_SESSION['id'].'">Compte Patient</a></td>'  ;
                      else if( $profile == "Medecin")
                      print '<td class="nav_b"><a href="compte/compte_medecin.php?id='.$_SESSION['id'].'">Compte Medecin</a></td>'  ;
                      else if( $profile == "Admin")
                      print '<td class="nav_b"><a href="compte/compte_admin.php?id='.$_SESSION['id'].'">Compte Admin</a></td>'  ;
              }    
            
             ?>
            <td class="nav_b"><a href="<?php 
                                    if(isset($_SESSION['l'])) { echo "php/logout.php" ;}
                                    else { echo "login/login.php" ;} ?>">
                            
                                    <?php  if(isset($_SESSION['l'])) { echo "Deconnexion" ;}
                                               else { echo "Connexion" ;} ?>
            </a></td>

              
          </tr>
        </table>
  </nav>

</header>


<!-- End Header -->

<!--  content -->

<div id="content_1">
	<table width="80%" border="0" align="center"  >
  <tr>

<td width="40%">

<div id="content_gauche">
        <a id="titre">Les Docteurs</a><br/>
       <?php  
       
        if (! isset($_SESSION['l'])){

        print'<a id="titre">Parce que la santé passe en premier, inscrivez-vous pour bénificier ou </a>
        <a class="bouton"  href="login/login.php">S\'authentifer</a>';

         }
         else{

          print'<a id="titre"> vous souhaitent  Bonne Navagigation  '.$_SESSION['nom'].' </a>';

         }
       ?> 
        
</div><!--end of content_gauche-->
</td>
    
   <td width="40%">
 <?php  
   
  if( ! isset($_SESSION['l'])) { 
   print '<div id="content_droit">
   	  
     <a id="titre" >Inscription</a> <br/>
     <a id="sous_titre">Créer votre compte</a>
     <hr/>
     
   <form action="index.php" method="post" name="inscription_form">
     

     <input name="nom" type="text" id="nom" size="50" placeholder="Votre Nom"><br/><br/>
     <input name="prenom" type="text" id="prenom" size="50" placeholder="Votre Prénom"><br/><br/>
     <input name="identifiant" type="text" id="identifiant" size="50" placeholder="Votre Identifiant"><br/><br/>	
     <input name="motdepasse" type="password" id="motdepassel" size="50" placeholder="Votre Mot de passe"><br/><br/>
     <input name="email" type="email" id="email" size="50" placeholder="Votre email"><br/><br/>
	   <label><input name="sexe" type="radio" value="Femme">Femme</label>
     <label><input name="sexe" type="radio" value="Homme">Homme</label><br/><br/>
     <input name="datedenaissance" type="date" id="date" size="50" placeholder="Votre date de naissance"><br/><br/>
     <input class="bouton"  name="inscription" type="submit" value="Inscrire">
    </form>  
   </div><!--end of content_droit-->
   </td>
    </table>
  </div><!--end of content_1-->
     ';
        
   }
// inscription 

 include 'php/authRegister.php';
 register('Patient') ;

?>   


<hr />
<div id="equipe"></div>
<div id="content_2">

    <a id="titre" >Equipe</a> <br/>
   <a id="sous_titre">Notre équipe:</a><br/><br/>
    <div id="equipe">
    
    <table width="90" border="0" align="center" cellpadding="10" cellspacing="50">
  <tr>
    <td ><div id="cadre" >
      <img src="images/photo_docteur_1.jpg" alt="photo_d_1" width="214" height="286" id="img_p">
      <div id="cadre_av">
      <a id="nom_p">M . Mohammed 1 </a><br/>
   <a id="fonction_p">Docteur X </a><hr/>
   <img id="icon_p" src="images/icon/1367804565_46-facebook.png" alt="facbook_icon"> 
   <img id="icon_p" src="images/icon/twitter.png" alt="twitter">
   <img id="icon_p" src="images/icon/google_plus.png"> </div>
    </div> 
     </td>
    <td >
    <div id="cadre">  <img id="img_p" src="images/photo_docteur_2.jpg" width="214" height="286" alt="photo_docteur_2"><div id="cadre_av">
    <a id="nom_p">Me. X</a><br/>
   <a id="fonction_p">Docteur ss</a><hr/>
   <img id="icon_p" src="images/icon/1367804565_46-facebook.png" alt="facbook_icon"> 
   <img id="icon_p" src="images/icon/twitter.png" alt="twitter">
   <img id="icon_p" src="images/icon/google_plus.png"> 
    </div></div></td>
    <td >
     <div id="cadre"> <img id="img_p" src="images/photo_docteur_3.png" width="214" height="286" alt="photo_docteur_3"><div id="cadre_av">
     <a id="nom_p">Nom de la personne</a><br/>
   <a id="fonction_p">Sa fonction</a><hr/>
   <img id="icon_p" src="images/icon/1367804565_46-facebook.png" alt="facbook_icon"> 
   <img id="icon_p" src="images/icon/twitter.png" alt="twitter">
   <img id="icon_p" src="images/icon/google_plus.png"> 
     </div></div></td>
    
  </tr>
  <tr>
    <td>
      <div id="cadre_b"><img id="img_b" src="images/photo_docteur_4.jpg" width="214" height="286" alt="photo_docteur_4">
      <div id="cadre_b_av">
      <a id="nom_p">Nom de la personne</a><br/>
   <a id="fonction_p">Sa fonction</a><hr/>
   <img id="icon_p" src="images/icon/1367804565_46-facebook.png" alt="facbook_icon"> 
   <img id="icon_p" src="images/icon/twitter.png" alt="twitter">
   <img id="icon_p" src="images/icon/google_plus.png"> 
      </div>
      </div>
      
      </td>
    <td>
      <div id="cadre_b"><img id="img_b" src="images/photo_docteur_5.png" width="214" height="286" alt="photo_docteur_5">
    <div id="cadre_b_av">
    <a id="nom_p">Nom de la personne</a><br/>
   <a id="fonction_p">Sa fonction</a><hr/>
   <img id="icon_p" src="images/icon/1367804565_46-facebook.png" alt="facbook_icon"> 
   <img id="icon_p" src="images/icon/twitter.png" alt="twitter">
   <img id="icon_p" src="images/icon/google_plus.png"> 
    </div>
      </div></td>
    <td>
      <div id="cadre_b"><img id="img_b" src="images/photo_docteur_6.jpg" width="214" height="286" alt="photo_docteur_6">
   <div id="cadre_b_av">
   <a id="nom_p">Nom de la personne</a><br/>
   <a id="fonction_p">Sa fonction</a><hr/>
   <img id="icon_p" src="images/icon/1367804565_46-facebook.png" alt="facbook_icon"> 
   <img id="icon_p" src="images/icon/twitter.png" alt="twitter">
   <img id="icon_p" src="images/icon/google_plus.png"> 
   </div>
      </div></td>
   
  </tr>
</table>

    
  </div>    
 </div><!--end of content_2-->
<hr/>
<div id="contact"></div>
<div id="content_3">
<div >
<a id="titre" >Contact</a> <br/>
<a id="sous_titre">N'oubliez pas de nous écrire vos impressions sur notre organisme.</a><br/><br/><br/><br/>
<div id="content_3_gauche">
<form action="" method="POST" name="contact">
	<input name="nom_contact" type="text" id="nom_contact" size="50" placeholder="Votre Nom complet"><br/><br/>
    <input name="email_contact" type="email" id="email_contact" size="50" placeholder="Votre E-Mail"><br/><br/>
    <textarea name="msg_contact" id="msg_contact" cols="80" rows="10" placeholder="Votre message"></textarea><br/><br/>
    <input class="bouton" name="envoyer_msg" type="submit" value="Envoyer">


    <?php
	
mysql_connect('localhost','root','');
mysql_select_db('lesdocteurs');


if(isset($_POST['envoyer_msg'])){
	if(isset($_POST['nom_contact']) and isset($_POST['email_contact']) and isset($_POST['msg_contact']) and $_POST['nom_contact']!="" and $_POST['email_contact']!="" and  $_POST['msg_contact']!="" ){
$ajout_a_contact = mysql_query("INSERT INTO contact VALUES('','$_POST[nom_contact]','$_POST[email_contact]','$_POST[msg_contact]')");
echo'Votre message a était envoyer';
}
else{echo 'Veuilliez remplire tous les champs';}

}
	mysql_close();
?>  


</form></div>
</div><!--end of content_3_gauche-->
<div id="content_3_droit">
<a id="sous_titre">Adresse:</a><br/>
Avenue M. VII Nr 24 <br/><br/>
<a id="sous_titre">Téléphone:</a><br/>
212+(0)666-000000<br/><br/>
<a id="sous_titre">E-Mail:</a><br/>
lesdocteur@cabinet.com<br/><br/>

   <img id="icon_p" src="images/icon/1367804565_46-facebook.png" alt="facbook_icon"> 
   <img id="icon_p" src="images/icon/twitter.png" alt="twitter">
   <img id="icon_p" src="images/icon/google_plus.png">
</div><!--end of content_3_droit-->
</div><!--end of content_3-->
<hr/>


<footer>
<div id="foot">Tous les droits sont réservés.</div>
</footer><!--end of footer-->
</body>
</html>
