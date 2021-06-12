<!DOCTYPE html>
<html lang="en">
    <head>
	<style>
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Students</title>
		<!-- Favicon -->
        <link rel="shortcut icon" href="./html-template/assets/img/favicon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./html-template/assets/plugins/bootstrap/css/bootstrap.min.css">
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="./html-template/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="./html-template/assets/plugins/fontawesome/css/all.min.css">
		<!-- Main CSS -->
        <link rel="stylesheet" href="./html-template/assets/css/style.css">

    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<?php include "Rep.html";?>
            <div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Ajouté staff</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="./html-template/students.html">Staff</a></li>
									<li class="breadcrumb-item active">Ajouté</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<form method="POST" action="ctrl.php?action=Adddroit&eml=<?php echo $_POST["EM"];?> enctype="multipart/form-data">
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Les droits du personnel</span></h5>
											</div>
											<div class="col-12 col-sm-6">  
												<label class="container">&nbsp&nbsp&nbsp&nbsp Creer une classe
												<input type="checkbox" checked="checked" name="cls" value="1">
												<span class="checkmark"></span>
												</label>
												<label class="container">&nbsp&nbsp&nbsp&nbsp Creer un étudiant
												<input type="checkbox" name="etd" value="1">
												<span class="checkmark"></span>
												</label>
												<label class="container">&nbsp&nbsp&nbsp&nbsp Creer une annonce 
												<input type="checkbox" name="anc" value="1">
												<span class="checkmark"></span>
												</label>
												<label class="container">&nbsp&nbsp&nbsp&nbsp Creer un compte utilisateur
												<input type="checkbox" name="user" value="1">
												<span class="checkmark"></span>
												</label>
												<label class="container">&nbsp&nbsp&nbsp&nbsp Creer un emploi du temps
												<input type="checkbox" name="edt" value="1">
												<span class="checkmark"></span>
												</label>												
												<label class="container">&nbsp&nbsp&nbsp&nbsp Creer un module
												<input type="checkbox" name="mdl" value="1">
												<span class="checkmark"></span>
												</label>
												<label class="container">&nbsp&nbsp&nbsp&nbsp Ajouter les notes
												<input type="checkbox" name="note" value="1">
												<span class="checkmark"></span>
												</label>
											</div>
											

										
											<div class="col-12">
												<button type="submit" class="btn btn-primary">soumettre</button>
											</div>
										</div>
									</form>
								</div>
							</div>							
						</div>					
					</div>					
				</div>				
			</div>
			<!-- /Page Wrapper -->
        </div>
		<!-- /Main Wrapper -->
		<!-- jQuery -->
        <script src="./html-template/assets/js/jquery-3.5.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="./html-template/assets/js/popper.min.js"></script>
        <script src="./html-template/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- Slimscroll JS -->
        <script src="./html-template/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<!-- Custom JS -->
		<script src="./html-template/assets/js/script.js"></script>

    </body>
</html>