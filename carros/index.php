<?php
include_once('../includes/db.php');
include_once('../includes/class.krumo.php');
include_once '../includes/constants.php';

//include_once('includes/fixture.php');
//$myRoot = "http://localhost/BuscoCarro.com/images/carros/";

$db = new db();
// <editor-fold defaultstate="collapsed" desc="Carros">
$carros = array(
        '0' => array('nombre' => 'Ford Focus', 'version' => 'Sedan', 'Ciudad' => 'Caracas', 'tipo' => 'automatico', 'precio' => '1000000', 'foto' => 'focus.jpg'),
        '1' => array('nombre' => 'Audi TT', 'version' => 'Sedan', 'Ciudad' => 'Caracas', 'tipo' => 'automatico', 'precio' => '1000000', 'foto' => 'auditt.jpg'),
        '2' => array('nombre' => 'Elantra', 'version' => 'Sedan', 'Ciudad' => 'Caracas', 'tipo' => 'automatico', 'precio' => '1000000', 'foto' => 'elantra.jpg'),
        '3' => array('nombre' => 'Ford Focus', 'version' => 'Sedan', 'Ciudad' => 'Caracas', 'tipo' => 'automatico', 'precio' => '1000000', 'foto' => 'focus08.jpg'),
        '4' => array('nombre' => 'Fortuner', 'version' => 'Sedan', 'Ciudad' => 'Caracas', 'tipo' => 'automatico', 'precio' => '1000000', 'foto' => 'fortuner.jpg'),
        '5' => array('nombre' => 'Mitsubishi Lancer', 'version' => 'Sedan', 'Ciudad' => 'Caracas', 'tipo' => 'automatico', 'precio' => '1000000', 'foto' => 'lancer.jpg'),
        '6' => array('nombre' => 'Mitsubishi Lancer', 'version' => 'Sedan', 'Ciudad' => 'Caracas', 'tipo' => 'automatico', 'precio' => '1000000', 'foto' => 'lancer04.jpg')
); // </editor-fold>
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
        <link href="../fancybox/jquery.fancybox-1.3.1.css" rel="stylesheet" media="screen" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <!--<script src="../js/lib/jquery-1.3.js" type="text/javascript"></script>-->
        <script src="../js/lib/jquery.cycle.all.min.js" type="text/javascript"></script>
        <script src="../js/index.js" type="text/javascript"></script>
        <script src="../fancybox/jquery.fancybox-1.3.1.pack.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript">
            $(document).ready(function(){
                $("#col2 a").fancybox({
                    'transitionIn' : 'none',
                    'transitionOut' : 'none',
                    'type':'ajax',
                    'overlayShow' : true,
                    'overlayOpacity':0.35,
                    'padding':'0',
                    'centerOnScroll':true,
                    'scrolling':'no',
                    'titleShow':false,
                    /*'autoScale':false,
                    'width':'50%',
                    'height':'50%',*/
                    'onComplete':function(){
                        $("div#fancybox-inner .clearBoth").cycle({
                            prev:"#prev",
                            next:"#next",
                            height:'300px',
                            random:true,
                            fit:'true',
                            containerResize:false,
                            pause:true
                        });
                    }
                });
            });
        </script>
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
                                    <h2>Subaru Impreza</h2> <a href="#" title="Repuestos">Repuestos de esta marca</a> | <a href="">Concesionarios de esta marca</a><img alt="subaru" src="../images/logos marcas/subaru.gif" />
                                </div>
                                <h2 class="titulo" align="right">2009</h2>
                                <?php foreach ($carros as $carro) : ?>
                                <div class="carro">
                                    <a href="preview.php">
                                        <img class="center" alt="imagen auto" src="<?php echo ROOT . IMAGES . "/carros/" . $carro['foto']; ?>"/>
                                    </a>
                                    <div class="infoCarro">
                                        <ul>
                                            <li><b>Versión:</b> <?php echo $carro['version']; ?></li>
                                            <li><?php echo $carro['Ciudad']; ?></li>
                                            <li><?php echo $carro['tipo']; ?> </li>
                                            <li>Precio: <?php echo number_format($carro['precio'], 2); ?> Bsf.</li>
                                        </ul>
                                        <!--<a href="preview.php"><img alt="info y fotos" src=""/></a>-->
                                    </div>
                                </div>
                                <?php endforeach; ?>
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
                    <div class="center"><p class="center">BuscoCarro.com &copy; <?php echo date('Y'); ?></p>
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