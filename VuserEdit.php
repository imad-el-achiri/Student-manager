<!DOCTYPE html>
<html lang="en">
    <head>
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
								<h3 class="page-title">Ajoutée un(e) étudiant(e)</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="./html-template/students.html">Etudiants</a></li>
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
								<form method="POST" action="ctrl.php?action=user_update&id=<?php echo $_GET['id']?>&v=<?php echo $_GET['v']?>" enctype="multipart/form-data">
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Les informations de l'étudiant</span></h5>
											</div>
											<div class="col-12 col-sm-6">  
												<div class="form-group">
													<label>Prenom</label>
													<input type="text" class="form-control" name="PR" value="<?php echo $user_info['prenom']?>">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Nom</label>
													<input type="text" class="form-control" name="NOM" value="<?php echo $user_info['nom']?>">
												</div>
											</div>
					
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Genre</label>
													<select class="form-control" name="GE">
														<option value="<?php echo $user_info['Genre']?>">Sélectionnez le genre</option>
														<option value="F">Femelle</option>
														<option value="M">Mâle </option>
													</select>
												</div>
											</div>
											<?php 
											#print_r($user_info['photo_personnel']);
											

											if($v==1) { echo '
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Classe</label>
													<select class="form-control" name="cls">
														<option value="0">Sélectionner la classe</option>';
													
															for($i=0;$i<$l;$i++){
													echo '<option value="'.$cls[$i]['id_cls'].'">"'.$cls[$i]['nom_classe'].'"</option>';
												}
															
												echo "
													  </select>
												</div>
											</div>";}
											if($v==2) { echo ' <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Fonction</label>
													<select class="form-control" name="FO">
														<option value="0">Sélectionner la fonction</option>'; echo'
														<option value="Responsable">Responsable</option>
														<option value="prof">Professeur</option>
													</select>
												</div>
											</div>';} 
											?>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" class="form-control" name="EM" value="<?php echo $user_info['E_mail']?>">
												</div>
											</div>
								
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Num de tel</label>
													<input type="tel" class="form-control" name="TEL" value="<?php echo $user_info['num'] 
													//./images/<?php echo $user_info['photo_personnel']?>">

												</div>
											</div>

											<div class="col-12 col-sm-6">
												<div class="form-group">
												<label>Addresse</label>
												<textarea class="form-control" name="ADR"><?php echo $user_info['adr']?>
												</textarea> 
												</div>
											</div>	

											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Image d'étudiant</label>
													<input type="file" class="form-control" name="IMAGE", id="IMAGE">
												</div>
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