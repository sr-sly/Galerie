<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Authentication</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../www/bootstrap-3.3.4-dist/css/bootstrap.css">
        <link rel="stylesheet" href="../www/mon_css.css">
        <script src="../www/jquery-1.11.1/jquery.js"></script>
        <script src="../www/bootstrap-3.3.4-dist/js/bootstrap.js"></script>
        <style>
            .btn-info {
                box-shadow: 1px 2px 5px #000000;   
            }
        </style>
    </head>

    <body class="srd">
        <div>
			<form action=login.php method=POST>
			<div class="container">
				<div class="jumbotron" style="width:400px;margin-top:20%;margin-left:20%;margin-right:20%;>

					<div class="form-group">

						<label for="id">Login:</label>
						<input class="form-control" type="text" name="login" id="id" value="
<?php 

//include request.php;
require_once './request.php';

echo Request::getGetParameters('login', '')

?>
						"/>
						<BR>
						<label for="pwd">Password:</label>
						<input class="form-control" type="password" name="password" id="pwd"/>
						<BR>
						<button type="submit" class="btn btn-info btn-sm" style="margin-left:33%;margin-right:33%;margin-top:20px;width:33%">Dive In !</button>
					</div>
				</div>
			</div>
			</form>
        </div>
		<div class="container" style="margin-left:33%;margin-right:33%;margin-top:20px;width:33%">
			<span><a href="./NewUser.php">Se cr&eacuteer un nouvel acc&eacutes</a></span>
		</div>
</body>
</html>


