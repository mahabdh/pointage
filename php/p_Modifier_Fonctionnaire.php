<?php


 session_start();
    require_once('connexion.php');

$min_naissance = "2000-01-01";
$max_naissance = "1930-01-01";
if($_POST['datenaissance'] > $min_naissance or $_POST['datenaissance'] < $max_naissance){
    echo '<script type="text/javascript"> alert("Date de naissance non valide")</script>';
    header("Refresh: 0; ../fonctionnaire.php");
    
}else{

$id = $_POST['idorigine'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$datenaissance = $_POST['datenaissance'];
$fonction = $_POST['departement'];
$departement = $_POST['departement'];


                               $requete = "UPDATE fonctionnaire SET nom='" . $_POST['nom'] . "' "
							   . ",prenom='" . $_POST['prenom'] . "'"
							   . ",datenaissance='" . $_POST['datenaissance'] . "'"
							   . ",fonction='" . $_POST['fonction'] . "'"
                               . ",departement='" . $_POST['departement'] . "' "
                               ." WHERE id='" . $_POST['idorigine'] . "'";
							   
        mysql_query($requete);	

    echo '<script type="text/javascript"> alert("fonctionnaire modifier avec succée")</script>';
    header("Refresh: 0; ../fonctionnaire.php");
}
?>