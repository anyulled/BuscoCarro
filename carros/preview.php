<?php
include_once '../includes/constants.php';
// <editor-fold defaultstate="collapsed" desc="Datos Carro">
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
        "sonido" => "Estereo",
        "direccionVehiculo" => "hidraulica",
        "precioVehiculo" => "70000",
        "negociable" => "1",
        "comentario"=>"SUBARU WRX 4X4 IMPECABLE TODO UNA JOYA,MONTA 310 HP,TURBO GREDDY 18 PSI,TURBO TIMER GREDDY, tubo de escape et completo acero inoxidable de 3pulgadas un pipe,out pipe,Suspensión Tein autograduable con computadora. -Relojeria Defin con grabadora y base horiginal,-Radiador de aluminio de agua y radiador de aceite Gredy,reloges de air fuel y psi boost,con bases de fibra de carbono marca AEM,tacometro 9mil rpm marca defin,válvulas blow off HKS,croche de ceramica,sistema intake completo,boost controller marca ATP,rines 18´SPOR MAX cauchos salem 235/40/R18, bateria ceca de gel,3 juegos de luces hid, spoiler tracero de maletera del sti y tracero central del vidrio marca perrin,Doble din pioneer,4 cornetas kikers 6¨ en las puertas y 2 6x9 kikers KS trasera planta 4 canales kikers, esta acegurado casco hasta Obtubre 2010, tine recin montado nuevo el piñon de segunda y tercera de la caja es lo unico de mecanica que se le ha tocado ..",
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

/*
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link href="../css/my_layout.css" rel="stylesheet" type="text/css" />
        <script src="../js/lib/jquery-1.3.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.cycle.all.min.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" language="javascript">
            $(document).ready(function(){
                $(".c75l .images").cycle({
                    prev:"#prev",
                    next:"#next",
                    height:'300px',
                    fit:'true'
                });
            });
        </script>
        <title>Preview</title>
    </head>
    <body>
        <div class="page_margins" style="width: 900px; height: 400px;">
            <div class="page">
                <div id="col2" class="mainCol">
                    <div id="col2_content"><?php */?>
<div class="floatbox" style="width:800px; height:500px; overflow:hidden;">
    <h2 class="titulo">
        <div class="float_left" style="font-size: x-large;">
            <a id="prev" href="" class="arrow">&lt;</a>
            <a id="next" href="" class="arrow">&gt;</a>
        </div>
        <?php echo $carro['modelo']." ".$carro['marca']." ".$carro['anio'];; ?>
    </h2>
    <div class="c66l">
        <div class="clearBoth">
            <?php foreach ($carro['images'] as $value): ?>
            <img alt="<?php $carro['modelo']; ?>" src="<?php echo ROOT.IMAGES.$value ?>"/>
            <?php endforeach; ?>
        </div>
        <table class="full">
            <thead>
                <!--<tr>
                    <th colspan="4" align="center"> Extras </th>
                </tr>-->
            </thead>
            <tbody>
                <tr>
                    <th align="center">Vidrios Ahumados</th>
                    <th align="center">Tapizado</th>
                    <th align="center">Airbag</th>
                    <th align="center"> Frenos ABS </th>
                    <th align="center"> Aire Acondicionado </th>
                    <th align="center"> Sonido </th>
                    <th align="center"> Dirección </th>
                    <th align="center"> Negociable </th>
                </tr>
                <tr>
                    <td><?php echo ($carro['vidriosAhumados']==1)?' Si ':' No '; ?></td>
                    <td><?php echo ($carro['tapizado']==1)?' Si ':' No '; ?></td>
                    <td><?php echo ($carro['airbag']==1)?' Si ':' No '; ?></td>
                    <td><?php echo ($carro['frenosAbs']==1)?' Si ':' No '; ?></td>
                    <td><?php echo ($carro['aireAcondicionado']==1)?' Si ':' No '; ?></td>
                    <td><?php echo $carro['sonido']; ?></td>
                    <td><?php echo $carro['direccionVehiculo']; ?></td>
                    <td><?php echo ($carro['negociable']==1)?' Si ':' No '; ?></td>
                </tr>
                <tr>
                    <th colspan="4" align="center"> Precio </th>
                    <th colspan="2" width="50%"  align="center">Teléfono 1</th>
                    <th colspan="2" width="50%" align="center">Teléfono 2</th>
                </tr>
                <tr>
                    <td colspan="4" align="center"><?php echo number_format($carro['precioVehiculo'], 2); ?> Bsf.</td>
                    <td colspan="2" align="center"><?php echo $usuario['telefono1'] ?></td>
                    <td colspan="2" align="center"><?php echo $usuario['telefono2'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="c33r">
        <div class="subc">
            <table class="full">
                <!--<thead>
                    <tr>
                        <th align="center" colspan="2"> Especificaciones </th>
                    </tr>
                </thead>-->
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
                    <tr>
                        <td colspan="2">
                            <div style="height: 70px; overflow-y: scroll; text-transform: lowercase;">
                            <?php echo $carro['comentario'];?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /*?>
                    </div> 
                </div>
                <div class="floatbox" style="clear: both;">&nbsp;</div>
            </div>
        </div>
    </body>
</html>
<?php */ ?>