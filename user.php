<?php 
// lire les params de USER, en mode privé
class User{
    // déclaration des varaibles
	private $login = null;
	private $password = null;

	//init the variables
    // this = 'l'objet appelant'
    public function __construct($login, $password){
		$this->login = $login;
		$this->password = $password;
	}

	// lire le nom, depuis n'importe où pourvu qu'il y ai l'include dans la page d'appel
    public function getLogin(){
		return $this->login;
	}

	// lire le password, depuis n'importe où pourvu qu'il y ai l'include
    public function getPassword(){
		return $this->password;
	}
}

?>