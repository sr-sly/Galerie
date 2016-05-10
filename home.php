<?php 
// Chargement des librairies
require_once './default_lib/InitLib.php';
require_once './default_lib/InitPic.php';
require_once './request.php';

// Declaration des variables

// DEBUT DE LA PAGE
InitLib::setHeaderHtml("Welcome to InstantDapres");
InitLib::setOpenBodyHtml("srd\" style=\"margin-top:50px\"");

?>
       <div class="jumbotron" align=center>
            <h1>InstantdApres</h1>
            <p>Destiné à partager</p> 
            <ul class="nav">
                <li>de belles images</li>
                <li>et quelques exercices</li>
                <li><code>chteumeuleu & PHP & bootstrap</code></li>
                <li><code>angular & javascript</code></li>
            </ul>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron alert fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-pushpin" style="closebtn"></span></a>
                        <h3><span class="glyphicon glyphicon-picture"></span>&nbsp;Gallerie Publique</h3>
                        <div align=center>
                        <a href="Browse_ToolTip2.php" target="_parent" name="iframe_a"><button type="button" class="btn btn-default btn-lg"><span class="text-default">C'est par là</span><span class="glyphicon glyphicon-chevron-right"></span></button></a>
                            </div>
                    </div>    
                </div>
                <div class="col-xs-12">
                    <div class="jumbotron alert fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="glyphicon glyphicon-pushpin"></span></a>
                        <h3><span class="glyphicon glyphicon-film"></span>&nbsp;Nepal</h3>
                        <p class="">L'itinéraire de l'ACFN</p>
                        <div class="" align=center>
                            <iframe src="https://www.youtube.com/embed/ntM1nalSxEo" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
             </div>
        </div>

<?php 

		InitLib::setCloseBodyHtml();

?>