<?php
    include_once('includes/db.php');
    include_once('includes/usuario.php');
    include_once('includes/class.krumo.php');
    include_once('includes/constants.php');
$db = new db();
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
                    <a id="navigation" name="navigation"></a>
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
                    <div id="col2" class="mainCol">
                        <div id="col2_content" class="clearfix">
                            <div class="subcolumns">
                                <?php if(!isset ($_POST['ingresar'])):?>
                                <div class="c50l">
                                    <form class="yform" action="registrar.php">
                                        <fieldset>
                                            <legend>Nuevo Cliente</legend>
                                            <div>
                                                <h3>Soy un nuevo cliente</h3>
                                                <p>Al crear una cuentra en <b>BuscoCarro.com</b> usted acepta los términos y condiciones de este sitio.</p>
                                            </div>
                                            <div class="type-button">
                                                <input type="submit" value="Continuar"/>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="c50r">
                                    <form class="yform columnar" action="login.php" method="post">
                                        <fieldset>
                                            <legend>Ya soy cliente</legend>
                                            <div class="type-text">
                                                <label for="usuario">Usuario:</label>
                                                <input type="text" name="usuario"/>
                                            </div>
                                            <div class="type-text">
                                                <label for="password">Password:</label>
                                                <input type="password" name="password"/>
                                            </div>
                                            <div>
                                                <a href="recuperarPassword.php">¿Olvidó su contraseña?</a>
                                            </div>
                                            <div class="type-button">
                                                <input type="submit" name="ingresar" value="Ingresar"/>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <?php else: ?>
                                <div> <b>Post</b> </div>
                                    <?php krumo::post(); ?>
                                    <?php
                                    try {
                                        $usuario = new usuario($_POST['usuario'],$_POST['password']);
                                        krumo::dump($usuario);
                                        echo $usuario->nombre." ".$usuario->apellido;
                                    }
                                    catch (Exception $exception) {
                                        echo $exception;
                                        echo 'usuario y/o clave inválidos';
                                    }


                                    ?>
                                <?php endif;?>
                            </div>
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