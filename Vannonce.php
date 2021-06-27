<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Holiday</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" href="./html-template/assets/img/favicon.png">
	
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./html-template/assets/plugins/bootstrap/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="./html-template/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="./html-template/assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="./html-template/assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="./html-template/assets/plugins/fullcalendar/fullcalendar.min.css">
		
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
								<h3 class="page-title">Annonces</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active">Visualisation</li>
                </ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<style> .card-header{
                          color: black;

                    }</style>
	                <style> .modal-body{
                          color: black;

                    }</style>
                    <style> .modal-title{
                          color: black;

                    }</style>

                    <style> .card-body {
                      background-repeat: no-repeat;
                      background-position: 50% 50%;
                      background-size: cover;
                      width: 300px;
                      height: 300px;
                    }</style>
                  <!-- <style> .card-img-top {
                    background-repeat: no-repeat;
                    background-position: 50% 50%;
                    background-size: cover;
                    width: 300px;
                    height: 200px;</style> -->
                    <table border="0" align="center">
					          <?php 
                    $cards_color = array('secondary','danger', 'warning' ,'info', 'dark');
                    $count=0;
                    for($i=0;$i<$l;$i++){
                        shuffle($cards_color);
                        $r=strlen($anc[$i]["annonce"]);
                        if($count==0){
                          echo '<tr>';} 
                        #for($f=0;$f<3;$f++){
                        echo '<td>';
                        echo '<div class="card text-white bg-'.$cards_color[0].' mb-3" style="max-width: 18rem;">';
                        echo '<img class="card-img-top" src="images/'.$anc[$i]["photo"].'" alt="Card image cap">';
                        #echo '<div class="card-header">'.$anc[$i]["objet"].'</div>';
                        echo '<div class="card-body">
                          <h5 class="card-title">'.$anc[$i]["objet"].'</h5>';
                        if($r<=200){
                        echo'<p class="card-text">'.$anc[$i]["annonce"].'</p>
                        </div>';}
                        else{
                            $annonce=$anc[$i]["annonce"];
                            $ancshrink="";
                            for($j=0;$j<200;$j++){
                                $ancshrink=$ancshrink.$annonce[$j];
                            }
                            echo'<p class="card-text">'.$ancshrink.' ... </p>';
                            echo '<!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                              Launch demo modal
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">';
                                    echo '<h5 class="modal-title" id="exampleModalLongTitle">'.$anc[$i]["objet"].'</h5>';
                                    echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>';
                                  echo '<div class="modal-body">'.$anc[$i]["annonce"].'</div>';
                                  echo '<div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>';
                        echo '</div>';
                        }
                      echo '</div>';
                     
                      $count=$count+1;
                      if($count==3){
                        echo '</tr>';
                        $count=0;     
                      }
                      echo'</td>'; 
                    }?>
 	
			
			
				<!-- Footer -->
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
		
		<!-- Datetimepicker JS -->
		<script src="./html-template/assets/js/moment.min.js"></script>
		<script src="./html-template/assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Full Calendar JS -->
        <script src="./html-template/assets/js/jquery-ui.min.js"></script>
        <script src="./html-template/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="./html-template/assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>
		
		<!-- Custom JS -->
		<script  src="./html-template/assets/js/script.js"></script>
		
    </body>
</html>