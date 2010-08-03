<?php
include_once('../includes/db.php');
include_once('../includes/class.krumo.php');
include_once '../includes/constants.php';
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
        <script src="../js/lib/jquery.cycle.all.pack.js" type="text/javascript"></script>
        <script src="../js/index.js" type="text/javascript"></script>
        <!--[if lte IE 7]>
        <link href="../css/patches/patch_my_layout.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <style media="all" type="text/css">
            #col2{width: 100%; padding: 0;}
        </style>
    </head>
    <body>
        <div class="page_margins">
            <!--<div id="border-top" class="hideme">
            <div id="edge-tl"></div>
            <div id="edge-tr"></div>
          </div>-->
            <div class="page">
                <div id="header">
                    <img src="../images/logo.jpg" alt="logo" align="absmiddle"/>
                    <div id="topnav">
                        <a class="skip" title="skip link" href="#navigation">Skip to the navigation</a><span class="hideme">.</span>
                        <a class="skip" title="skip link" href="#content">Skip to the content</a><span class="hideme">.</span>
                        <a href="../login.php">Login</a> <a href="#" class="hideme">Contact</a> <a href="#" class="hideme">Imprint</a>
                    </div>
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
                    <div id="col1" class="hideme">
                        <div id="col1_content" class="clearfix">
                            <?php //include_once '../templates/fom1.php'; ?>
                        </div>
                    </div>
                    <div id="col2">
                        <div id="col2_content" class="clearfix">
                            <form action="../Copy of carros/registrar" class="yform columnar">
                                <fieldset>
                                    <legend>Datos del Vehículo</legend>
                                    <div class="subcolumns">
                                        <div class="c50l">
                                            <div class="type-select">
                                                <label for="tipovehiculo">Tipo de vehículo <sup>*</sup> </label>
                                                <select name="tipovehiculo">
                                                    <option>feo</option>
                                                </select>
                                            </div>
                                            <div class="type-select">
                                                <label for="modelovehiculo">Modelo</label>
                                                <select name="modelovehiculo">
                                                    <option>coupé</option>
                                                </select>
                                            </div>
                                            <div class="type-select">
                                                <label for="fecha">Año<sup>*</sup> </label>
                                                <select name="fecha">
                                                    <option>2010</option>
                                                </select>
                                            </div>
                                            <div class="type-text">
                                                <label for="recorrido">Recorrido<sup>*</sup> </label>
                                                <input type="text" name="recorrido"/>
                                            </div>
                                        </div>
                                        <div class="c50r">
                                            <div class="type-select">
                                                <label for="marca">Marca<sup>*</sup> </label>
                                                <select name="marca">
                                                    <option>Volkswagen</option>
                                                </select>
                                            </div>
                                            <div class="type-text">
                                                <label for="version">Versión</label>
                                                <input type="text" name="version"/>
                                            </div>
                                            <div class="type-select">
                                                <label for="color">Color</label>
                                                <select name="color">
                                                    <option>Tornasol</option>
                                                </select>
                                            </div>
                                            <div class="type-text">
                                                <label for="placa">Placa<sup>*</sup> </label>
                                                <input type="text" name="placa"/>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Motor</legend>
                                    <div class="subolumns">
                                        <div class="c50l">
                                            <div class="type-text">
                                                <label for="motor">Motor <sup>*</sup> </label>
                                                <input type="text" name="motor"/>
                                            </div>
                                            <div class="type-select">
                                                <label for="transmision">Transmisión <sup>*</sup> </label>
                                                <select name="transmision">
                                                    <option>Automático</option>
                                                    <option>Manual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="c50r">
                                            <div class="type-text">
                                                <label for="cilindros">N° Cilindros</label>
                                                <input type="text" name="cilindros"/>
                                            </div>
                                            <div class="type-text">
                                                <label for="traccion">Tracción</label>
                                                <select name="traccion">
                                                    <option>4x4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Accesorios</legend>
                                    <div class="subcolumns">
                                        <div class="c50l">
                                            <div class="type-select">
                                                <label for="vidrios">Vidrios</label>
                                                <select name="vidrios">
                                                    <option>Ahumados</option>
                                                </select>
                                            </div>
                                            <div class="type-select">
                                                <label for="tapizado">Tapizado</label>
                                                <select name="tapizado">
                                                    <option>seleccionar</option>
                                                </select>
                                            </div>
                                            <div class="type-select">
                                                <label for="airbag">Airbag</label>
                                                <select name="airbag">
                                                    <option>Seleccionar</option>
                                                </select>
                                            </div>
                                            <div class="type-select">
                                                <label for="frenosabs">Frenos ABS</label>
                                                <select name="frenosabs">
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="c50r">
                                            <div class="type-select">
                                                <label for="direccion">Dirección <sup>*</sup> </label>
                                                <select>
                                                    <option>Seleccionar</option>
                                                </select>
                                            </div>
                                            <div class="type-select">
                                                <label for="aireacondicionado">Aire Acondicionado</label>
                                                <select name="aireacondicionado">
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                            <div class="type-select">
                                                <label for="estereo">Estereo </label>
                                                <select>
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Otras caracteristicas</legend>
                                    <div class="type-text">
                                        <label for="caracteristicas">Características</label>
                                        <textarea cols="3" rows="3"></textarea>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Precio</legend>
                                    <div class="sucolumns">
                                        <div class="c50l">
                                            <div class="type-text">
                                                <label for="precio">Precio<sup>*</sup> </label>
                                                <input type="text" name="precio"></input>
                                            </div>
                                        </div>
                                        <div class="c50r">
                                            <div class="type-select">
                                                <label for="negociable">Negociable <sup>*</sup> </label>
                                                <select name="negociable">
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Fotos</legend>
                                    <div class="type-text">
                                        <label for="fotos">Foto Principal <sup>*</sup> </label>
                                        <input type="file" name="foto[]"/>
                                        <label for="fotos">Foto </label>
                                        <input type="file" name="foto[]"/>
                                        <label for="fotos">Foto </label>
                                        <input type="file" name="foto[]"/>
                                        <label for="fotos">Foto </label>
                                        <input type="file" name="foto[]"/>
                                        <label for="fotos">Foto </label>
                                        <input type="file" name="foto[]"/>
                                    </div>
                                    <div class="type-button">
                                        <p align="right">
                                            <input type="button" name="vistaprevia" value="Vista Previa"/>
                                            <input type="submit" name="enviar" value="Enviar"/>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div id="col3" class="hideme">
                        <div id="col3_content" class="clearfix">
                            <?php //include_once '../templates/ads.php'; ?>
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