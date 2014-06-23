<?php 



  function  addrendez( $id_medecin , $date ,$heure ){

   openDatabase();
  // get the user
   $id_patient = $_GET['id'];   
  // request 
   $request = "INSERT INTO rendez_vous VALUES('','$date','$heure',$id_patient,$id_medecin,'','')" ;

    echo $request ;
  //exec
  $r = mysql_query($request) or die('Erreur SQL '.mysql_error());
  // close database
  closeDatabase();

  }


  function getAllRendez(){

			openDatabase()   ;
			$resultat = mysql_query('SELECT * FROM rendez_vous WHERE id_patient="'.$_GET['id'].'"');
			closeDatabase()  ; 
			return $resultat ;

  }

  function getAllRendezMedecin(){

			openDatabase()   ;
			$resultat = mysql_query('SELECT * FROM rendez_vous WHERE id_medecin="'.$_GET['id'].'"');
			closeDatabase()  ; 
			return $resultat ;

  }

function updateRendez($obsevation, $ordenance  ){
    
  openDatabase()   ;
  $resquest = 'UPDATE rendez_vous SET observation = "'.$obsevation.'" , ordenance = "'.$ordenance.'" WHERE id = '.$_GET['idr'].'' ;
  $resultat = mysql_query($resquest);
  closeDatabase()  ; 

}

 function getRendez($idr){
			openDatabase()   ;
			$resultat = mysql_query('SELECT * FROM rendez_vous WHERE id ='.$idr.'');
			$rendez   = mysql_fetch_array($resultat); 
			closeDatabase()  ; 
			return $rendez ;
  }


 ?>