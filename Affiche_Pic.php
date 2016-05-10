<?php
require_once './default_lib/InitLib.php';
require_once './default_lib/InitPic.php';
require_once './request.php';

$PathDir = request::getGetParameters('Path');

if ($PathDir == null) {
	InitLib::setHeaderHtml('error 404');
	InitLib::setOpenBodyHtml('container srd" style="margin-top:50px"');
	echo '<div class="jumbotron text-center" style="margin-top:70px">
		Pas d\'image
		</div>';
	InitLib::setCloseBodyHtml();
	exit();	
}

$DirArray = explode('/',$PathDir);
$indice = (count($DirArray)-1);

//$DirArray = request::getListImage($Path,true);

$Title = "Affiche Image ".$DirArray[$indice];

InitLib::setHeaderHtml($Title);
InitLib::setOpenBodyHtml("srd\" style=\"margin-top:50px\"");

echo '<div class="jumbotron text-center">';

echo '<img src="'.$PathDir.'" class="img-rounded" alt="'.$DirArray[$indice].'" width="80%" height="80%">';

echo '</div>';

InitLib::setCloseBodyHtml();



?>