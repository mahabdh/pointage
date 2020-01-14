
<?php 
    session_start();
    require_once('connexion.php');

if($_POST["uname"]=="" or $_POST["psw"]==""){
    echo'<script type = "text/javascript"> alert ("Veuillez remplir les champs obligatoires")</script>';
		header("Refresh: 0; ../index.php");
	}else{
    $user=$_POST["uname"];
    $passe=$_POST["psw"];
    
     $sql=mysql_query("select * from agent where nom = '$user' and mdp = '$passe'");
     $nb = mysql_num_rows($sql);
    if($nb == 0){
        echo '<script type="text/javascript"> alert("Informations introuvablent!!!!")</script>';
        header("Refresh: 0; ../index.php");
    }else{
        $_SESSION['uname']=$user;
	  //  $_SESSION['passe']=$passe;
        
        
        $date = date('Y-m-d');
         mysql_query("delete from pointage where date != '$date'");
        
        header("Refresh: 0; ../index2.php");
    }
}
    
?>