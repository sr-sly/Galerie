
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Untitled Document</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../www/home/mon_css.css">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

			<style>
				nom-image{
					text-align:center;
					text-color: rgba(192,192,192,0.3);
					position: relative;
					top:-130px;
				}
			</style>

	</head>
<body class="srd">
<?php 
// <body class="srd">
require_once './request.php';


function GetEXIF ($FullPathPic, $FullNamePic){
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

// DO NOT ! $PathGallery = "http://asuna:80/www/public_gallery/images/";
// $PathDir = "public_gallery/";
$PathDir = "2016_LesStephans_Concert/";
$PathRoot = "../www/".$PathDir;
$PathGallery = $PathRoot."images/";
$PathThumb = $PathRoot."thumbs/";

// recupere la liste des images dans le répertoire
$DirArray = request::GetListImage($PathGallery,true);
// donne le nombre d'items
$Indice = count($DirArray);

//printf("<div class=\"container-fluid\">");
printf("<div class=\"jumbotron text-center\">");
printf("<h3>".Trim($PathDir,'/')." : $Indice Images</h3></div>");

printf("<div class=\"list-group text-center\" style=\"margin-left:10px;margin-right:10px;\">");
// génération de la vignette
for ($i = 0; $i < $Indice; $i++) {
    
	$ImagePath = $PathGallery.$DirArray[$i];
	$ImageThumb = $PathThumb.$DirArray[$i];
	$NomCourt = trim(trim($DirArray[$i],"20160414_LesStephans_"),".jpg");
	$returnge = GetEXIF($PathGallery,$DirArray[$i]);
	
		printf("<div>");
			printf("<div id=\"Image$i\">");
				printf("<a href=\"$ImagePath\" class=\"list-group-item text-center\">");
				printf("<img src=\"$ImageThumb\" class=\"img-thumbnail\" alt=\"$DirArray[$i]\" style=\"height:100px;\">");
				printf("</a>");
			printf("</div>");
		printf("</div>");

		if ($returnge !== null) {
			printf("<div>");
			// Bouton des propriétés
				printf("<a href=\"#$NomCourt\" class=\"btn btn-info\" data-toggle=\"collapse\">".$NomCourt."</a>");
				printf("<div id=\"$NomCourt\" class=\"collapse\">");
					// echo 'owner      => '.$returnge['make']."<BR>";
					printf("model     => ".$returnge["model"]."<BR>");
					printf("exposure  => ".$returnge["exposure"]."<BR>");
					printf("aperture  => ".$returnge["aperture"]."<BR>");
					printf("iso       => ".$returnge["iso"]."<BR>");
				printf("</div>");
			printf("</div>");
		}
}
printf("</div>");





?>
</body>
</html>