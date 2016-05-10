<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
</head>
<body>

    
<?php 
    require_once './request.php';
    require_once './constante.php';
    require_once './user.php';
  
/* Connexion à une base ODBC avec l'invocation de pilote */
    $dsn = 'mysql:dbname='.dbnom.';host=127.0.0.1';

    try {
        $dbh = new PDO($dsn, dblogin, dbpwd);
    } catch (PDOException $e) {
    	$dbh = null;
    	die('Connexion échouée : ' . $e->getMessage());
        exit();
    } //fin de connexion à la base de données

    $entry1 = Request::getPostParameters('login');
    $stmt = $dbh->prepare("SELECT * FROM user where login = '$entry1' AND password = '".Request::getPostParameters('password')."'");
//var_dump($stmt);
	if ($stmt->execute(array($entry1))) {
		$row = $stmt->fetch();
		if (!$row) {
			echo "Access Denied";
			$dbh = null;
			exit();
		}
		echo "Access Granted";
		sleep (2);
		header ('Location: Browse_ToolTip.php',true);
	}
    
// et maintenant, fermeture de la connection!
	$dbh = null;
?>
</body>
</html>