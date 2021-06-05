<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login failed</title>
	<link rel="stylesheet" href="">
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="ctrl.php?action=login" method="GET"> 
	<div class="alert alert-danger" role="alert">
  		<h4>Login failed, click on the button below to retry :</h4>
	</div>
	<button type="submit" class="btn btn-secondary">Retry</button>
</form>
</body>
</html>