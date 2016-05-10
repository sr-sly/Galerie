<?php 
require_once './request.php';
require_once './default_lib/InitLib.php';

InitLib::setHeaderHtml('Authentication');
// ajoute une ombre au bouton
echo '	<style>
            .btn-info {
                box-shadow: 1px 2px 5px #000000;   
            }
        </style>';

InitLib::setOpenBodyHtml('srd');

// déclartion du formulaire de connection
echo '<div>
			<form action=login.php method=POST>
			<div class="container">
				<div class="jumbotron srd_form" >

					<div class="form-group">

						<label for="id">Login:</label>
						<input class="form-control" type="text" name="login" id="id" value="';
echo Request::getGetParameters('login', '');

echo '"/>
						<BR>
						<label for="pwd">Password:</label>
						<input class="form-control" type="password" name="password" id="pwd"/>
						<BR>
						<button type="submit" class="btn btn-info btn-sm" style="margin-left:33%;margin-right:33%;margin-top:20px;width:33%">Dive In !</button>
					</div>
				</div>
			</div>
			</form>
        </div>';
InitLib::setCloseBodyHtml();
?>
						


