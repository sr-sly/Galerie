<?php 

class Request{
// C'est la même fonction en POST ou en GET ; ne pas oublier, c'est 2 tableau distinct pouvant avoir les mêmes IDs
    
// COMMAND GET 'aka visible' & lire le contenu de la variable $name, sinon, ça vaut null 	
	public static function getGetParameters($name,$defaultValue=null){
		if (isset($_GET[$name]))
			return $_GET[$name];
		else return $defaultValue;
	}

// COMMAND POST 'aka non visible dans le 'HEADER' & lire le contenu de la variable $name, sinon, ç vaut null 
	public static function getPostParameters($name,$defaultValue=null){
		if (isset($_POST[$name]))
			return $_POST[$name];
		else return $defaultValue;
	}

// test pour afficher un var dump en CSS d'un variable
// fait sur mesure 
	public static function getDebug($NomVar='No Name',$debug,$stop=true){
		echo '<div id="getDebud" class="text text-warning">';
		// if ($debug[1]==false) {
				echo 'var_dump('.$NomVar.') => <BR>';var_dump($debug).'<BR>';
		// } else {
			// for ($i = 0; $i < $Indice; $i++) {
				// echo 'var_dump('.$strdebug.'['.[$i].']'.') => <BR>';var_dump($debug[$i]).'<BR>';
			// }
		// }
		echo '</div>';
		if ($stop != false){
			exit();
		}
	}
	
//Récupère dans un tableau triable la liste des fichiers dans un répertoire
	public static function GetListImage($Path,$bool,$files = null){
	
		$dh = null;
		$filename = null;
		
		// Vérifier et remplir le tableau
		$dh  = opendir($Path);
			
		if ($dh == false) {
			return 'Ouverture du dossier : impossible';
			exit();
		}
		while (false !== ($filename = readdir($dh))) {
			$files[] = $filename;
		}
		closedir($dh);
		
		//$files = array_slice(scandir($Path),2);
		
		unset($files[0]); // vidage de .
		unset($files[1]); // vidage de ..
		$files = array_values($files); //re indexation du tableau

		//triage du tableau
		if (true == $bool){
			natcasesort($files);
			// print_r($files);
			// echo "<BR>Sort file <BR>";
		} else {
			rsort($files, SORT_NATURAL | SORT_FLAG_CASE);
			// print_r($files);
			// echo "<BR>Reverse Sort file <BR>";
		}
		
		return $files;
	}








}
?>