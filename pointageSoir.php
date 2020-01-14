<?php
session_start();
if(!isset($_SESSION['uname'])){
	header('Location:index.php');
exit;}
	?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Pointage Alg1</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  
  
   <style>
/* Full-width input fields */

/* Set a style for all buttons */
.cont input[type=text],.cont input[type=number]{
     width: 90%;   
}


/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.cont{
    padding: 40px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 1% 20%; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 75%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 3px;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

h3{
    font-family: Dotum;
    margin-top: 2%;  
}
hr{
    margin-top: 1%;
    height: 50%;
}
.ihssene{
    width: 15%;
    font-size: 20px;
}
</style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index2.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pointage Alg1</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-home"></i>
            <span class="nav-link-text">Accueil</span>   
           </a> 
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="fonctionnaire.php">
            <i class="fa fa-users"></i>
            <span class="nav-link-text">Fonctionnaire</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-calendar"></i>
            <span class="nav-link-text">Poitage</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
                <a href="ListePointage.php">Liste pointage</a>
            </li>
            <li>
              <a href="pointageMatin.php">Poitage Matin</a>
            </li>
            <li>
              <a href="pointageSoir.php">Pointage Soir</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="retard.php">
            <i class="fa fa-clock-o"></i>
            <span class="nav-link-text">Retards</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="absence.php">
            <i class="fa fa-ban"></i>
            <span class="nav-link-text">Absence</span>
          </a>
        </li>
		       
		
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
       <li class="nav-item">
          <a href="php/p_log-out.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="ListePointage.php">Liste pointages</a>
        </li>
        <li class="breadcrumb-item active">Pointage Soir</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-calendar"></i> Poitage Soir</div>

     <div class='card-body'>
       <div class='table-responsive'>			    
		 
            <form  action='php/p_Pointer_Soire.php' method='post'>
    
             <table border='0' align="center" width="80%">
	        <tr>
                  
                      <td><label>Id</label></td>	      
                </tr>
                <tr>
                  
                     <td><input class='form-control' type='text' name='id' required /> </td>
     
                </tr>
                 <tr>
                  
                     
                      <td><label>Nom</label></td>
		              <td><label>Prenom</label></td>		      
                  
                </tr>
                <tr>
                  
                     <td><input class='form-control' type='text' name='nom' required disabled/> </td>
		             <td><input class='form-control' type='text' name='prenom' required disabled/> </td>
       
                </tr>
                
                   
                <tr>
                    <td><label>Fonction</label></td>
		      <td><label>Departement</label></td>	   
                </tr>
                <tr>
                    <td><input class='form-control' type='text' name='fonction' required disabled/> </td>
		    <td><input class='form-control' type='text' name='departement' required disabled/> </td>
                               
                </tr>
                <tr>
                  
                    <td><input  style="width:20%;" type="radio" name="rad" value="entre"/> Entree
                     <input style="width:20%;" type="radio" name="rad" value="sortie"/>Sortie</td>
					 
                 
                </tr>
              
     </table>
	  
							  
</div>
</div>
<div align='right' class='card-footer small text-muted'>
     
    <button class="ihssene btn btn-primary fa fa-plus " type="submit"> Pointer</button>
    
         
          </div>
 

 </form>
    
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!--***---------- Formulaire-----------------**-->
    <!-- /.content-wrapper-->
   
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
