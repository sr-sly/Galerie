<?php 
// Chargement des librairies
require_once './default_lib/InitLib.php';
require_once './default_lib/InitPic.php';
require_once './request.php';

// Declaration des variables
// recupere le répertoire à parcourir
$PathDir = Request::getGetParameters('PathDir');
//request::getDebug('PathDir',$PathDir);

if ($PathDir == null) {
	$PathDir = 'public_gallery/';
} else {
	switch($PathDir)
    {
      case "public_gallery": $PathDir = 'public_gallery/'; break;
      case "Galerie_000": $PathDir = 'private_gallery/20140921_Test_nuits/'; break;
      case "Galerie_001": $PathDir = 'private_gallery/2016_LesStephans_Concert/'; break;
      default: echo("Gallerie introuvable !"); exit(); break;
    }
}
$PathRoot = './'.$PathDir;
$PathGallery = $PathRoot.'images/';
$PathThumb = $PathRoot.'thumbs/';

// recupere la liste des images dans le répertoire
$DirArray = request::getListImage($PathGallery,true);
// donne le nombre d'items et fix la limite de la boucle If pour la généeration de la gallerie
$Indice = count($DirArray);

InitLib::setHeaderHtml("Gallery : ".$PathDir);
InitLib::setOpenBodyHtml("srd\" style=\"margin-top:50px\"");

echo '<div class="jumbotron text-center">';
echo '<h3>'.Trim($PathDir,'/').' : '.$Indice.' Images</h3></div>';

// echo '<div class="row" style="margin-left:10px;margin-right:10px;">';

// Préparation du parcours du tableau des images
for ($i = 0; $i < $Indice; $i++) {
	
	InitPic::getImage ($PathGallery,$PathThumb,$DirArray,$i);
}

printf("</div>");


InitLib::setCloseBodyHtml();


?>
</body>
</html>