<?php
include_once('../includes/db.php');
include_once('../includes/class.krumo.php');
include_once '../includes/constants.php';

//include_once('includes/fixture.php');
//$myRoot = "http://localhost/BuscoCarro.com/images/carros/";

$db = new db();
$carros = array('fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-language" content="en" />
        <title>BuscoCarro.com</title>
        <link href="../css/my_layout.css" rel="stylesheet" type="text/css" />
        <link href="../yaml/screen/forms.css" rel="stylesheet" type="text/css"/>
        <script src="../js/lib/jquery-1.3.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.cycle.all.min.js" type="text/javascript"></script>
        <script src="../js/index.js" type="text/javascript"></script>
        <!--[if lte IE 7]>
        <link href="../css/patches/patch_my_layout.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <body>
        <div class="page_margins">
            <!--<div id="border-top" class="hideme">
            <div id="edge-tl"></div>
            <div id="edge-tr"></div>
          </div>-->
            <div class="page">
                <div id="header">
                    <?php include_once '../templates/header.php'; ?>
                </div>
                <div id="nav">
                    <?php include_once '../templates/nav.php'; ?>
                    <div class="marcas">
                        <?php include_once '../templates/marcas.php'; ?>
                    </div>
                </div>
                <div id="teaser">
                    <?php include_once '../templates/teaser.php'; ?>
                </div>
                <div id="main">
                    <div id="col1">
                        <div id="col1_content" class="clearfix">
                            <?php include_once '../templates/fom1.php'; ?>
                        </div>
                    </div>
                    <div id="col2">
                        <div id="col2_content" class="clearfix">
                            <div class="floatbox">
                                <h1 class="titulo">Autos</h1>
                                <div  class="floatbox">
                                    <h2>Subaru Impreza</h2> <a href="#">Repuestos de esta marca</a> | <a href="">Concesionarios de esta marca</a><img alt="subaru" src="../images/logos marcas/subaru.gif" />
                                </div>
                                <h2 class="titulo" align="right">2009</h2>
                                <?php foreach ($carros['fotos'] as $carro) :?>
                                <div class="carro">
                                    <img class="center" alt="imagen auto" src="<?php echo ROOT.IMAGES."/carros/".$carro; ?>"/>
                                    <div class="infoCarro">
                                        <p><b>Versión:</b> Sedan</p>
                                        <p>Caracas</p>
                                        <p>Automático</p>
                                        <p>Precio: 100.000 Bsf.</p>
                                        <img alt="info y fotos" src=""/>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <div id="col3">
                        <div id="col3_content" class="clearfix">
                            <?php include_once '../templates/ads.php'; ?>
                        </div>
                        <!-- IE Column Clearing -->
                        <div id="ie_clearing"> &#160; </div>
                    </div>
                </div>
                <!-- begin: #footer -->
                <div id="footer">
                    <div class="center"><p class="center">BuscoCarro.com &copy; <?php echo date('Y') ;?></p>
                    </div>
                </div>
            </div>
            <!--<div id="border-bottom" class="hideme">
            <div id="edge-bl"></div>
            <div id="edge-br"></div>
          </div>-->
        </div>
    </body>
</html>