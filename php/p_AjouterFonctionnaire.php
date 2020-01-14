<?php


 session_start();
    require_once('connexion.php');




$id=$_POST['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date_de_naissance=$_POST['date_de_naissance'];
$Fonction=$_POST['Fonction'];
$departement=$_POST['departement'];
$min_naissance = "2000-01-01";
$max_naissance = "1930-01-01";

$sql=mysql_query("select * from fonctionnaire where id = '$id'");
    $nb = mysql_num_rows($sql); 
    if($nb != 0){
    echo '<script type="text/javascript"> alert("Ce fonctionnaire exste déja")</script>';
    header("Refresh: 0; ../fonctionnaire.php");
}else{
if($date_de_naissance > $min_naissance or $date_de_naissance < $max_naissance){
    echo '<script type="text/javascript"> alert("date de naissance invalide")</script>';
    header("Refresh: 0; ../fonctionnaire.php");
}else{
$query="INSERT INTO fonctionnaire(id,nom,prenom,datenaissance,fonction,departement)
VALUES('$id','$nom','$prenom','$date_de_naissance','$Fonction','$departement')";


if(!mysql_query($query)){
	die('error in insserting records'.mysql_error());
}else{?> 
	 <script> alert('Ajouter avec succés');</script>
	 <?php
}
header("Refresh: 0; ../fonctionnaire.php");
}
        }
?>