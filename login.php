<?php 
// Chargement des librairies
require_once './default_lib/InitLib.php';
require_once './default_lib/InitPic.php';
require_once './request.php';
require_once './constante.php';
require_once './user.php';
  
/* Connexion à une base ODBC avec l'invocation de pilote */
    $dsn = 'mysql:dbname='.dbnom.';host=127.0.0.1';

InitLib::setHeaderHtml('');
InitLib::setOpenBodyHtml("srd");

    try {
        $dbh = new PDO($dsn, dblogin, dbpwd);
    } catch (PDOException $e) {
    	$dbh = null;
    	die('Connexion échouée : ' . $e->getMessage());
        exit();
    } //fin de connexion à la base de données

    $entry1 = Request::getPostParameters('login');
    $stmt = $dbh->prepare("SELECT * FROM user where login = '$entry1' AND password = '".Request::getPostParameters('password')."'");
	// var_dump($stmt);
	if ($stmt->execute(array($entry1))) {
		$row = $stmt->fetch();
		if (!$row) {
			echo '<div class="alert alert-warning text-center"><strong>Access Denied</strong></div>';
			$dbh = null;
			exit();
		}
	}
		echo '<div class="alert alert-success text-center"><strong>Access Granted</strong></div>';
		sleep (20);
		header ('Location: Browse_ToolTip2.php',true);
    
// et maintenant, fermeture de la connection!
$dbh = null;
	
InitLib::setCloseBodyHtml();
?>