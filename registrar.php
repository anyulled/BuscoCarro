<?php
include_once('includes/db.php');
$db = new db();
include_once('includes/class.krumo.php');
include_once 'includes/constants.php';
include_once 'includes/usuario.php';
//include_once('includes/fixture.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-language" content="en" />
        <title>BuscoCarro.com</title>
        <link href="css/my_layout.css" rel="stylesheet" type="text/css" />
        <link href="yaml/screen/forms.css" rel="stylesheet" type="text/css"/>
        <script src="js/lib/jquery-1.3.js" type="text/javascript"></script>
        <script src="js/lib/jquery.cycle.all.min.js" type="text/javascript"></script>
        <script src="js/index.js" type="text/javascript"></script>
        <!--[if lte IE 7]>
        <link href="css/patches/patch_my_layout.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <style media="all" type="text/css">
        #col2{width: 100%; padding: 0;}
    </style>
    <body>
        <div class="page_margins">
            <!--<div id="border-top" class="hideme">
            <div id="edge-tl"></div>
            <div id="edge-tr"></div>
          </div>-->
            <div class="page">
                <div id="header">
                    <?php include_once 'templates/header.php'; ?>
                </div>
                <div id="nav">
                    <?php include_once 'templates/nav.php'; ?>
                    <div class="marcas">
                        <?php include_once 'templates/marcas.php'; ?>
                    </div>
                </div>
                <div id="teaser">
                    <?php include_once 'templates/teaser.php'; ?>
                </div>
                <div id="main">
                    <div id="col1" class="hideme">
                        <div id="col1_content" class="clearfix">
                            <?php //include_once 'templates/fom1.php'; ?>
                        </div>
                    </div>
                    <div id="col2">
                        <div id="col2_content" class="clearfix">
                            <?php if(!isset ($_POST['enviar'])): ?>
                            <form class="yform columnar" action="registrar.php" method="post" name="registro">
                                <fieldset>
                                    <legend>Datos Personales</legend>
                                    <div class="type-text">
                                        <label for="nombre">Nombre<sup>*</sup></label>
                                        <input type="text" name="nombre" />
                                    </div>
                                    <div class="type-text">
                                        <label for="apellido">Apellido<sup>*</sup> </label>
                                        <input type="text" name="apellido"/>
                                    </div>
                                    <div class="type-text">
                                        <label for="id">Cédula/Rif</label>
                                        <select name="tipoid">
                                            <option>V</option>
                                            <option>E</option>
                                            <option>J</option>
                                        </select>
                                        <input type="text" name="numeroid" style="width:64%; display:inline;"/>
                                    </div>
                                    <div class="type-text">
                                        <label for="telefono">Teléfono<sup>*</sup> </label>
                                        <input type="text" name="telefono"/>
                                    </div>
                                    <div class="type-text">
                                        <label for="telefono2">Teléfono 2</label>
                                        <input type="text" name="telefono2"/>
                                    </div>
                                    <div class="type-select">
                                        <label for="estado">Estado<sup>*</sup> </label>
                                        <select name="estado">
                                            <option>Aragua</option>
                                        </select>
                                    </div>
                                    <div class="type-select">
                                        <label for="ciudad">Ciudad<sup>*</sup> </label>
                                        <select name="ciudad">
                                            <option>Caracas</option>
                                        </select>
                                    </div>
                                    <div class="type-text">
                                        <label for="direccion">Dirección <sup>*</sup></label>
                                        <textarea name="direccion" cols="5" rows="3"></textarea>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Datos de su Cuenta</legend>
                                    <div class="type-text">
                                        <label for="usuario">Usuario <sup>*</sup> </label>
                                        <input type="text" name="usuario"/>
                                    </div>
                                    <div class="type-text">
                                        <label for="password">Password <sup>*</sup></label>
                                        <input type="password" name="password"/>
                                    </div>
                                    <div class="type-text">
                                        <label for="password2">Repita su password:</label>
                                        <input type="password" name="password2"/>
                                    </div>
                                    <div class="type-button">
                                        <center><input type="submit" name="enviar" value="Enviar"/></center>
                                    </div>
                                </fieldset>
                            </form>
                            <?php else: ?>
                                <?php

                                krumo::post();

                                $usuarioTemp = $db->select('*', 'usuarios', array('nombre'=>$_POST['nombre'],'password'=>$_POST['password']));
                                echo "UsuarioTemp";
                                krumo::dump($usuarioTemp);

                                if ($usuarioTemp['suceed']== 'false' && count($usuarioTemp['data']) == 0) {
                                    if($_POST['password'] == $_POST['password2']) {
                                        $usuario = new usuario();
                                        $result =$usuario->crearUsuario(
                                                $_POST['nombre'],
                                                $_POST['apellido'],
                                                $_POST['tipoid'],
                                                $_POST['numeroid'],
                                                $_POST['telefono'],
                                                $_POST['telefono2'],
                                                $_POST['estado'],
                                                $_POST['ciudad'],
                                                $_POST['direccion'],
                                                $_POST['usuario'],
                                                $_POST['password']);
                                        if($result) {
                                            echo "<h1>Registro culminado con éxito.</h1>";
                                        }
                                        else {
                                            echo 'Error. Por favor intente de nuevo.';
                                        }
                                    }
                                    else {
                                        echo "passwords no coinciden";
                                    }
                                }
                                else {
                                    echo "Este usuario ya existe";
                                }
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div id="col3" class="hideme">
                        <div id="col3_content" class="clearfix">
                            <?php //include_once 'templates/ads.php'; ?>
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