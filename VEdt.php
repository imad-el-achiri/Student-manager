<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Department</title>
		
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
        	<?php include "Rep.php";?>
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Add Department</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="departments.html">Department</a></li>
									<li class="breadcrumb-item active">Add Department</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<style type="text/css" media="screen">
		    		.card-body {
					  position: relative;
					  overflow: hidden;
					  width: 100%;
					  padding-top: 40%; /* 56.25% 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
					}

					/* Then style the iframe to fit in the container div with full height and width */
					.responsive-iframe {
					  position: absolute;
					  top: 0;
					  left: 0;
					  bottom: 0;
					  right: 0;
					  width: 100%;
					  height: 100%;
					  zoom: 0.5;
					}
    	</style>
				
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<iframe class="responsive-iframe" frameborder="0" scrolling="no" src=<?php echo"$info[0]";?>></iframe>
								</div>
								<h5>Modifié le : <?php echo"$info[1].";?></h5>
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