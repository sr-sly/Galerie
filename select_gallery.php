<?php 
// Chargement des librairies
require_once './default_lib/InitLib.php';
require_once './default_lib/InitPic.php';
require_once './request.php';

$logged=Request::getPostParameters('islogged');

if ($logged == null){
	header('Browse_ToolTip2.php',true);
}

// Declaration des variables
$PathGalleries = './private_gallery/';
// recupere la liste des dossiers dans le répertoire
$DirArray = request::getListImage($PathGalleries,true);
// donne le nombre d'items et fix la limite de la boucle If pour la génération de la gallerie
$Indice = count($DirArray);


// DEBUT DE LA PAGE
InitLib::setHeaderHtml("Selectionner la Galerie");
InitLib::setOpenBodyHtml("srd\" style=\"margin-top:50px\"");

// fabrication du selecteur
// Parcourir les repertoire et proposer autant de Div qu'il y a de dossier.
echo '
	<div class="jumbotron text-center">
		<p>Selectionner la Galerie</p>
	</div>
<div class="container text-center">
	';
	if ($handle = opendir($PathGalleries)) {
	//    echo "Gestionnaire du dossier : $handle\n";

	for ($i = 0; $i < $Indice; $i++) {
		// chemin du répertoire en cours de parse
		$PathGallery = $PathGalleries.'images/'.$DirArray[$i];
		$PathThumb = $PathGalleries.'thumbs/'.$DirArray[$i];
		// fabric de l'unité 'Gallerie'
		echo '
			<div>
			<p name="Galerie_00'.$i.'" class="jumbotron"><a href="Browse_ToolTip2.php?PathDir='.$DirArray[$i].'">'.$DirArray[$i].'</a></p>
			<div>';
			// fabrication d'un thumbnail aléatoire fait de trois images aleatoire de la galerie
			
		echo'</div>
			</div>';
	}
		closedir($handle);
	}
echo '</div>';

InitLib::setCloseBodyHtml();

?>


