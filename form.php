<?php 

class RequestForm{

    public function generateFrom('$form')
    // déclaration et init des varaibles
	private $form = null;

	//init the variables
    public function __construct($form){
		$this->form = $form;
	}
    
    
    $form = '<form action=login.php method=POST>
                <input type="text" name="login" value="'.Request::getGetParameters('login', '').'" />
                <input type="password" name="password" />
                <button type="submit" >click here</button>
                </form>'
    return '0';
?>