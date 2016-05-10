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
			<script>
				$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();   
				});
			</script>


			<style>
				nom-image{
					text-align:center;
					text-color: rgba(192,192,192,0.3);
					position: relative;
					top:-130px;
				}
			</style>

	</head>
<body class="">

    <?php 
require_once './request.php';


// Declaration des variables
$PathDir = "2016_LesStephans_Concert/";
$PathRoot = "../www/".$PathDir;
$PathGallery = $PathRoot."images/";
$PathThumb = $PathRoot."thumbs/";
$Image = '20160414_LesStephans__MG_4292.jpg';

// recupere la liste des images dans le répertoire

echo '<div class=\'col-sm-12 text-center\'>';
    echo '<h1>'.$Image.'</h1>';
    echo '<img src="'.$PathGallery.$Image.'" class="jumbotron" alt="$Image" style="width:50%;">';
echo '</div>';    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    



?>
</body>
</html>