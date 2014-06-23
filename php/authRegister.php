<?php 

//  database function 
include "database.php";




//  registration 
function register($Patient) {

// open connexion 
  openDatabase() ;

// inscription 	
if(isset($_POST['inscription'])){
 
 if(isset($_POST['nom']) and isset($_POST['email']) and isset($_POST['motdepasse']) and 
    isset($_POST['prenom']) and isset($_POST['sexe'])and isset($_POST['identifiant']))
 {
  
   $request = "INSERT INTO user  VALUES('null','$_POST[nom]','$_POST[identifiant]','$_POST[motdepasse]','$_POST[email]',
  '$_POST[prenom]','$Patient','$_POST[sexe]','$_POST[datedenaissance]')" ;

   //echo $request ; 
   $req = mysql_query($request) or die('Erreur SQL '.mysql_error()); 


 }
 else{
	 echo 'Veuilliez remplire tous les champs';
   
	 }
}

// close connexion
closeDatabase();

authen();

}



// authentification 
function authen(){

// open connexion 
       openDatabase() ;
 if( isset($_POST['identifiant']) and isset($_POST['motdepasse'])) {

       $result = mysql_query('SELECT * FROM user WHERE identifiant="'.$_POST["identifiant"].'" and motdepasse="'.$_POST["motdepasse"].'"');
	   if(	$resultat = mysql_fetch_array($result)){
        
        // session 
	   	session_start();
		$_SESSION['l']=$resultat['profile'];
	    $_SESSION['id']=$resultat['id'];
		$_SESSION['nom']=$resultat['nom'];

		 $id=$resultat['id'];
		 $compte= $resultat["profile"];

		   // close connexion
			if($compte =='Patient'){header('Location: /cabinet/compte/compte_patient.php?id='.$id.' ');}
			elseif($compte =='Medecin'){header('Location: /cabinet/compte/compte_medecin.php?id='.$id.' ');}
			elseif($compte =='Admin'){header('Location: /cabinet/compte/compte_admin.php?id='.$id.' ');}

	}else{

		echo '<br/> <strong>Identifiant ou mot de passe erroné </strong>';
	}

			closeDatabase();

   }
	  
}







 ?>