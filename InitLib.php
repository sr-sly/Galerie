<?php

class InitLib{

static function setFuncTooltipBootstrap(){
	echo '<script>';
		echo '$(document).ready(function(){';
		echo '$(\'[data-toggle="tooltip"]\').tooltip();'; 
		echo '});';
	echo '</script>';
}

static function setHeaderHtml($title){
	$css='./home/mon_css.css';
	$bootstrapcss='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css';
	$jquery='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js';
	$bootstrap='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js';

	echo '<!DOCTYPE html>';
	echo '<html lang="fr">';
		echo '<head>';
			echo '<title>'.$title.'</title>';
			echo '<meta charset="utf-8">';
			echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
			echo '<link rel="stylesheet" href="'.$css.'">';
			echo '<link rel="stylesheet" href="'.$bootstrapcss.'">';
			echo '<script src="'.$jquery.'"></script>';
			echo '<script src="'.$bootstrap.'"></script>';
			echo '<style>';
			//setFuncTooltipBootstrap();
			echo '</style>';
		echo '</head>';
}

static function setOpenBodyHtml ($style) {
	echo '<body class="'.$style.'">';
	InitLib::setNavBar(null);
}

static function setNavBar($focus=null) {
        echo '<nav id="headersrd" class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="www.instantdapres.fr">InstantdApres.fr</a>                    </div>';
                    echo '<div class="collapse navbar-collapse" id="myNavbar" align=center>
                        <ul id="links" class="nav navbar-nav">
                            <li><a href="./home.php">Home</a></li>
                            <li class="active"><a href="Browse_ToolTip2.php">Galleries</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href=""><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                    </div>

                </div>
            </nav>';
}

static function setCloseBodyHtml () {
	echo '</body>';
	echo '</html>';
}

}
?>