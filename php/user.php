<?php 


//  database function 
include "database.php";



function getUser(){

openDatabase();

$lire_donnee = mysql_query('SELECT * FROM user WHERE id="'.$_GET['id'].'"');
$resultat = mysql_fetch_array($lire_donnee) or die( "erreur dans le compte "); 

closeDatabase() ; 

return $resultat;

}

function getUserById($id){

openDatabase();

$lire_donnee = mysql_query('SELECT * FROM user WHERE id= '.$id.' ');
$resultat = mysql_fetch_array($lire_donnee) or die( "erreur dans le compte "); 

closeDatabase() ; 

return $resultat['nom']." ".$resultat['prenom'];


}

function getMedecin(){

openDatabase();

$resultat = mysql_query('SELECT * FROM user WHERE profile ="Medecin"');

closeDatabase() ; 

return $resultat;

}

function getAllUser(){

openDatabase();

$resultat = mysql_query('SELECT * FROM user WHERE profile ="Patient"');

closeDatabase() ; 

return $resultat;

}

function updateUser(){
openDatabase() ;

 if(isset($_POST['nom']) and isset($_POST['email']) and isset($_POST['motdepasse']) and 
    isset($_POST['prenom']) and isset($_POST['identifiant']))
 {


$id = $_GET['id'];
$nom = $_POST['nom'] ;
$identifiant = $_POST['identifiant'];
$motdepasse = $_POST['motdepasse'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$datedenaissance = $_POST['datedenaissance'];

 $request = "UPDATE  user  SET nom = '$nom' ,  identifiant = '$identifiant',
   prenom= '$prenom' ,  email= '$email' ,  motdepasse= '$motdepasse' ,
   datedenaissance= '$datedenaissance' WHERE id = $id " ;    
 
 $r = mysql_query($request) or die('Erreur SQL '.mysql_error());

 }

closeDatabase() ;

}
 ?>