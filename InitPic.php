<?php

class InitPic {
static function GetEXIF ($FullPathPic, $FullNamePic){
	// echo "$FullPathPic<br />\n";
	// echo "$FullNamePic<br />\n";
	$Pic = $FullPathPic.$FullNamePic;

    # The default empty return
    // $return = array(
        // 'make'      => "",
        // 'model'     => "",
        // 'exposure'  => "",
        // 'aperture'  => "",
        // 'iso'       => ""
    // );
    $return = null;

    // Check if the variable is set and if the file itself exists before continuing
    if ((isset($Pic)) AND (file_exists($Pic)))
    {
        // There are 2 arrays which contains the information we are after, so it's easier to state them both
        $exif_ifd0 = @exif_read_data($FullPathPic.$FullNamePic ,'IFD0' ,0);
        $exif_exif = @exif_read_data($FullPathPic.$FullNamePic ,'EXIF' ,0);
		
		// var_dump($exif_ifd0);
		// echo '<BR><BR>';
		// var_dump($exif_exif);

        # Ensure that we actually got some information
        if (($exif_ifd0 !== false) AND ($exif_exif !== false))
        {
            // Make
            if (@array_key_exists('Make', $exif_ifd0))
            {
                $return['make']     = $exif_ifd0['Make'];
            }
            // Model
            if (@array_key_exists('Model', $exif_ifd0))
            {
                $return['model']    = $exif_ifd0['Model'];
            }
            // Exposure
            if (@array_key_exists('ExposureTime', $exif_ifd0))
            {
                $return['exposure'] = $exif_ifd0['ExposureTime'];
            }
            // Aperture
            if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED']))
            {
                $return['aperture'] = $exif_ifd0['COMPUTED']['ApertureFNumber'];
            }
            // ISO
            if (@array_key_exists('ISOSpeedRatings',$exif_exif))
            {
                $return['iso']     = $exif_exif['ISOSpeedRatings'];
            }
        }
    # Return either an empty array, or the details which we were able to extrapolate.
    return $return;	}
}

static function MakeImage($NumImageMI){
	printf("<div>");
		printf("<div id=\"$NumImageMI\">");
			printf("<a href=\"$ImagePath\" class=\"list-group-item text-center\">");
			printf("<img src=\"$ImageThumb\" class=\"img-thumbnail\" alt=\"$DirArray[$i]\" style=\"height:100px;\">");
			printf("</a>");
		printf("</div>");
	printf("</div>");
}

static function MakeExif($returngeME,$NomCourtME){
	if ($returngeME !== null) {
		printf("<div>");
		// Bouton des propriétés
			printf("<a href=\"#$NomCourtME\" class=\"btn btn-info\" data-toggle=\"collapse\">".$NomCourtME."</a>");
			printf("<div id=\"$NomCourtME\" class=\"collapse\">");
				// echo "artist      => '.$returngeME['artist']."<BR>";
				printf("model     => ".$returngeME["model"]."<BR>");
				printf("exposure  => ".$returngeME["exposure"]."<BR>");
				printf("aperture  => ".$returngeME["aperture"]."<BR>");
				printf("iso       => ".$returngeME["iso"]."<BR>");
			printf("</div>");
		printf("</div>");
	}
}

static function MakeToolTip($returngeMTT,$NomCourtMTT,$SwitchCRLF=null){
	
	$msgMTT = "aucune information disponible";
	
	if ($returngeMTT !== null) {

		if ($SwitchCRLF) {
		$model = 	"Model     => ".$returngeMTT["model"]."\n";
		$exposure = "Exposure  => ".$returngeMTT["exposure"]."\n";
		$aperture = "Aperture  => ".$returngeMTT["aperture"]."\n";
		$iso = 		"ISO       => ".$returngeMTT["iso"]."\n";

		$msgMTT = $model.$exposure.$aperture.$iso;

		} else {

		$model = 	"Model     => ".$returngeMTT["model"]."<BR>";
		$exposure = "Exposure  => ".$returngeMTT["exposure"]."<BR>";
		$aperture = "Aperture  => ".$returngeMTT["aperture"]."<BR>";
		$iso = 		"ISO       => ".$returngeMTT["iso"]."<BR>";

		$msgMTT = $model.$exposure.$aperture.$iso;
		}

	} 
	return $msgMTT;
}

static function BtnProprerty ($NomCourtBP,$msgBP) {
	printf("<div style=\"margin-top:5px\">");
	// Bouton des propriétés
		printf("<a href=\"#$NomCourtBP\" class=\"btn btn-info\" data-toggle=\"collapse\">".$NomCourtBP."</a>");
		printf("<div id=\"$NomCourtBP\" class=\"collapse\" style=\"margin:5px\">".$msgBP."</div>");
	printf("</div>");
	
}

static function getImage ($PathGallery,$PathThumb,$DirArray,$i){
	$ImagePath = $PathGallery.$DirArray[$i];
	$ImageThumb = $PathThumb.$DirArray[$i];
	$input = explode('MG_',$DirArray[$i]);
	$NomCourt = trim($input[1],".jpg");

	// recupere les informations EXIF dans un tableau
	$returnge = InitPic::GetEXIF($PathGallery,$DirArray[$i]);

	// génération de la vignette
	echo '<div class="col-xs-4 jumbotron" style="border: 2px solid;
    border-radius: 10px;">';
		echo '<div id="Image'.$i.'" class="text-center">';
			$infos = InitPic::MakeToolTip($returnge,$NomCourt,true);
			echo '<a href="./Affiche_Pic.php?Path='.$ImagePath.'" data-toggle="" title="'.$infos.'">';
			echo '<img src="'.$ImageThumb.'" class="img-thumbnail" alt="'.$DirArray[$i].'">';
			echo '</a>';
			if ($infos !== 'aucune information disponible') {
				InitPic::BtnProprerty ($NomCourt,InitPic::MakeToolTip($returnge,$NomCourt));
			}
		echo '</div>';
	echo'</div>';}

}?>