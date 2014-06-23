<?php 

// connexion à la base données 
function openDatabase(){

mysql_connect('localhost','user','user') or die("erreur de connexion au serveur Mysql");;
mysql_select_db('lesdocteurs') or die("erreur selection de  la base données");;

}

// close connexion with database
function closeDatabase(){
	 mysql_close() or die("erreur de fermeture connexion");;
}



 ?>