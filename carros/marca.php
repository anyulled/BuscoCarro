<?php
include_once('../includes/db.php');
include_once '../includes/constants.php';
$db = new db();

if(isset ($_GET['nombre'])) {
    $miMarca = $db->dame_query("select nombre, urlimagen, banner from marcas where nombre ='".$_GET['nombre']."'" );
}
include_once('../includes/class.krumo.php');
//krumo::dump($marca);
// <editor-fold defaultstate="collapsed" desc="array">
$lista = array(
        0 => array(
                'version'=>'sedan',
                'ciudad'=>'Caracas',
                'precio'=>'1000000',
                'nombre'=>'lancer',
                'marca'=>'ford',
                'fecha'=>'2006',
                'km'=>'2000',
                'transmision'=>'automática',
                'foto'=>'1.jpg'
        ),
        1 => array(
                'version'=>'sedan',
                'ciudad'=>'Caracas',
                'precio'=>'1000000',
                'nombre'=>'audi',
                'marca'=>'ford',
                'fecha'=>'2006',
                'km'=>'2000',
                'transmision'=>'automática',
                'foto'=>'2.jpg'
        ),
        2 => array(
                'version'=>'sedan',
                'ciudad'=>'Caracas',
                'precio'=>'1000000',
                'nombre'=>'explorer',
                'marca'=>'ford',
                'fecha'=>'2006',
                'km'=>'2000',
                'transmision'=>'automática',
                'foto'=>'2.jpg'
        ),
        3 => array(
                'version'=>'sedan',
                'ciudad'=>'Caracas',
                'precio'=>'1000000',
                'nombre'=>'lancer',
                'marca'=>'ford',
                'fecha'=>'2006',
                'km'=>'2000',
                'transmision'=>'automática',
                'foto'=>'3.jpg'
        ),
        4 => array(
                'version'=>'sedan',
                'ciudad'=>'Caracas',
                'precio'=>'1000000',
                'nombre'=>'fortuner',
                'marca'=>'ford',
                'fecha'=>'2006',
                'km'=>'2000',
                'transmision'=>'automática',
                'foto'=>'4.jpg'
        ),
        5 => array(
                'version'=>'sedan',
                'ciudad'=>'Caracas',
                'precio'=>'1000000',
                'nombre'=>'focus',
                'marca'=>'ford',
                'fecha'=>'2006',
                'km'=>'2000',
                'transmision'=>'automática',
                'foto'=>'5.jpg'
        ),
        5 => array(
                'version'=>'sedan',
                'ciudad'=>'Caracas',
                'precio'=>'1000000',
                'nombre'=>'hilux',
                'marca'=>'ford',
                'fecha'=>'2006',
                'km'=>'2000',
                'transmision'=>'automática',
                'foto'=>'6.jpg'
        )
);// </editor-fold>
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
                            <?php if(isset($miMarca)):?>
                            <div class="floatbox">
                                <h2 class="titulo"> <?php  echo $miMarca["data"][0]['nombre'];?></h2>
                                <img class="center" src="../images/Banners/<?php  echo $miMarca['data'][0]['banner']; ?>" alt="<?php  echo $miMarca["data"][0]['nombre'];?>"/>
                            </div>
                            <?php endif;
                            foreach ($lista as $auto) :?>
                            <div class="auto">
                                <img class="center" src="../images/<?php echo $auto['foto'] ?>" alt="auto"/>
                                <p align="right"><?php echo $auto['nombre']; ?></p>
                                <p><a href="ver.php">Ver</a> </p>
                            </div>
                            <?php endforeach;?>
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