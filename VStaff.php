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
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="./html-template/assets/plugins/datatables/datatables.min.css">
		<!-- Main CSS -->
        <link rel="stylesheet" href="./html-template/assets/css/style.css">
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
        	<?php require 'Rep.html';?>
			<!-- Header 
            <div class="header"> -->
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Professeurs et Personnel</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="../index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Students</li>
								</ul>
							</div>
							<div class="col-auto text-right float-right ml-auto">
								<a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
								<a href="./html-template/add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0 datatable">
											<thead>
												<tr>
													<th>ID</th>
													<th>Nom</th>
													<th>Prénom</th>
													<th>Genre</th>
													<th>E-mail</th>
													<th>Fonction</th>
													<th>N° de téléphone</th>
													<th>Adresse</th>
													<th> &nbsp&nbsp&nbspAction</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($stf as $s) {
												echo '<div class="modal fade" id="'."exampleModalCenter$s[0]".'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLongTitle">Suppression</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        Etes vous sûre que vous voulez supprimer cet utilisateur?
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
						        <a href="'."ctrl.php?action=user_delete&id_user=$s[0]".'">'.'<button type="button" class="btn btn-primary">Oui</button></a>';echo "
						      </div>
						    </div>
						  </div>
						</div>";
												echo
												"<tr>
													<td>$s[0]</td>
													<td>
														<h2 class='table-avatar'>
															<a href='./html-template/student-details.html' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='./images/$s[6]' alt='User Image'></a>
															<a href='./html-template/student-details.html'>$s[2]</a>
														</h2>
													</td>
													<td>$s[3]</td>";
													if($s[8]=='M') echo '<td>Mâle</td>';
													if($s[8]=='F') echo '<td>Femelle</td>';
													echo "
													<td><a href=".'"mailto:'."$s[1]".'">'."$s[1]</a></td>
													<td>$s[4]</td>
													<td><a href=".'"tel:'."$s[9]".'">'."$s[9]</a></td>
													<td>$s[10]</td>
													<td class='text-right'>
														<div class='actions'>
															<a href='./html-template/edit-student.html' class='btn btn-sm bg-success-light mr-2'>
																<i class='fas fa-pen'></i>
															</a>
															<a href='#' class='btn btn-sm bg-danger-light' data-toggle='modal' data-target=\"#exampleModalCenter$s[0]\">
																<i class='fas fa-trash'></i>
															</a>
														</div>
													</td>
												</tr>";
											}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>					
					</div>
				</div>					
				<!-- Footer -->
				<footer>
					<p>Copyright © 2020 Dreamguys.</p>					
				</footer>
				<!-- /Footer -->				
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
		<!-- Datatables JS -->
		<script src="./html-template/assets/plugins/datatables/datatables.min.js"></script>
		<!-- Custom JS -->
		<script src="./html-template/assets/js/script.js"></script>
    </body>
</html>