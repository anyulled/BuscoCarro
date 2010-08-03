<?php
include_once('../includes/db.php');
include_once('../includes/class.krumo.php');
include_once '../includes/constants.php';

//include_once('includes/fixture.php');
//$myRoot = "http://localhost/BuscoCarro.com/images/carros/";

// <editor-fold defaultstate="collapsed" desc="Datos carro">
$db = new db();
$carros = array('fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'));
$carro = array(
        "marca" => "Ford",
        "modelo" => "Fiesta",
        "anio" => "2009",
        "transmision" => "Automática",
        "km" => "3000",
        "tipoVehiculo" => "Feo",
        "modeloVehiculo" => "Coupe",
        "version" => "militar",
        "color" => "rojo",
        "placa" => "ABD-70N",
        "motor" => "V8",
        "cilindros" => "200",
        "traccion" => "manual",
        "vidriosAhumados" => "1",
        "tapizado" => "1",
        "airbag" => "1",
        "frenosAbs" => "1",
        "aireAcondicionado" => "1",
        "estereo" => "1",
        "direccionVehiculo" => "hidraulica",
        "precioVehiculo" => "70000",
        "negociable" => "1",
        "images"=>array(
            'Bmw X6 Interceptor/bmw_x6_interceptor_met-r.jpg',
            'Bmw X6 Interceptor/bmw_x6_interceptor_met-r_15.jpg',
            'Bmw X6 Interceptor/bmw_x6_interceptor_met-r_5.jpg',
            'Bmw X6 Interceptor/bmw_x6_interceptor_met-r_8.jpg')
);

$usuario = array(
        "telefono1"=>"0412-599.87.80",
        "telefono2"=>"0426-717.49.42"
);
//// </editor-fold>

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
        <script src="../js/lib/jquery.cycle.all.min.js" type="text/javascript"></script>
        <script src="../js/index.js" type="text/javascript"></script>
        <script src="../fancybox/jquery.fancybox-1.3.1.pack.js" type="text/javascript"></script>
        <!--[if lte IE 7]>
        <link href="../css/patches/patch_my_layout.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#imagenesCarro").cycle({
                    fx:'fade',
                    pager:'#thumbs',
                    height:"220px",
                    pagerAnchorBuilder : function(index, DOMelement){
                        console.dir(DOMelement);
                        return '<a href="#"><img src="' + $(DOMelement).find("img").attr("src") + '" width="46"/></a>';
                    }
                });
                $("#imagenesCarro .image").fancybox({
                    'transitionIn' : 'elastic',
                    'transitionOut' : 'fade',
                    'padding':0,
                    'speedIn' :	600,
                    'speedOut' : 200,
                    'cyclic':true,
                    'overlayShow' :false,
                    'titlePosition': 'over'
                });
            });
        </script>
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
                                <h1 class="titulo"><?php echo $carro['marca']." ".$carro['modelo']." ".$carro['anio'];  ?>  </h1>
                                <div  class="floatbox">
                                    <div class="c50l">
                                        <div id="imagenesCarro" style="background-color: black;">
                                            <?php foreach ($carro['images'] as $imagen) :?>
                                            <a title="<?php echo $carro['marca']." ".$carro['modelo']." ".$carro['anio']; ?>" rel="gallery" class="image" href="<?php echo ROOT.IMAGES.$imagen ?>">
                                                <img  src="<?php echo ROOT.IMAGES.$imagen ?>" alt="" width="100%"/>
                                            </a>
                                            <?php endforeach; ?>
                                        </div>
                                        <div id="thumbs"></div>
                                    </div>
                                    <div class="c50r">
                                        <div>
                                            <table class="full">
                                                <thead>
                                                    <tr>
                                                        <th align="center" colspan="2"> Especificaciones </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th width="50%"> Modelo </th>
                                                        <td> <?php echo $carro['modelo']?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Marca </th>
                                                        <td> <?php echo $carro['marca']?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Año </th>
                                                        <td> <?php echo $carro['anio']?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Transmisión </th>
                                                        <td> <?php echo $carro['transmision']?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kilometros</th>
                                                        <td><?php echo $carro['km']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tipo de Vehículo</th>
                                                        <td><?php echo $carro['tipoVehiculo']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Modelo del vehículo</th>
                                                        <td><?php echo $carro['modeloVehiculo']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Versión </th>
                                                        <td><?php echo $carro['version']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Color</th>
                                                        <td><?php echo $carro['color']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Placa</th>
                                                        <td><?php echo $carro['placa']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Motor</th>
                                                        <td><?php echo $carro['motor']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Cilindros</th>
                                                        <td><?php echo $carro['cilindros']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th> Tracción</th>
                                                        <td><?php echo $carro['traccion']?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <table class="full">
                                    <thead>
                                        <tr>
                                            <th colspan="4" align="center"> Extras </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Vidrios Ahumados</th>
                                            <th>Tapizado</th>
                                            <th>Airbag</th>
                                            <th> Frenos ABS </th>
                                        </tr>
                                        <tr>
                                            <td><?php echo ($carro['vidriosAhumados']==1)?' Si ':' No '; ?></td>
                                            <td><?php echo ($carro['tapizado']==1)?' Si ':' No '; ?></td>
                                            <td><?php echo ($carro['airbag']==1)?' Si ':' No '; ?></td>
                                            <td><?php echo ($carro['frenosAbs']==1)?' Si ':' No '; ?></td>
                                        </tr>
                                        <tr>
                                            <th> Aire Acondicionado </th>
                                            <th> Estereo </th>
                                            <th> Dirección </th>
                                            <th> Negociable </th>
                                        </tr>
                                        <tr>
                                            <td><?php echo ($carro['aireAcondicionado']==1)?' Si ':' No '; ?></td>
                                            <td><?php echo ($carro['estereo']==1)?' Si ':' No '; ?></td>
                                            <td><?php echo ($carro['direccionVehiculo']==1)?' Si ':' No '; ?></td>
                                            <td><?php echo ($carro['negociable']==1)?' Si ':' No '; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="4"> Precio </th>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="center"> <?php echo number_format($carro['precioVehiculo'], 2); ?> Bsf.</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" width="50%">Teléfono 1</th>
                                            <th colspan="2" width="50%">Teléfono 2</th>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2"><?php echo $usuario['telefono1'] ?></td>
                                            <td align="center" colspan="2"><?php echo $usuario['telefono2'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
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