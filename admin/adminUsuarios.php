<?php
include_once('../includes/db.php');
include_once('../includes/class.krumo.php');
include_once '../includes/constants.php';
//include_once('../includes/fixture.php');
session_start();
$db = new db();

if(isset ($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar':
        case 'borrar':
            krumo::post();
            break;
        default:
            krumo::post();
            break;
    }
}

if (isset ($_POST['sesion']) && $_POST['sesion']== 'false') {
    if(isset ($_SESSION)) {
        session_destroy();
    }
}

$usuarios = array(
        0=>array(
                'id'=>0,
                'nombre'=>'Anyul',
                'apellido'=>'Rivas',
                'login'=>'anyulled'
        )
        ,
        1=>array(
                'id'=>1,
                'nombre'=>'Jonathan',
                'apellido'=>'barcelos',
                'login'=>'jonathanBarcelos'
        )
);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-language" content="en" />
        <title>Admin | BuscoCarro.com</title>
        <link href="../css/my_layout.css" rel="stylesheet" type="text/css" />
        <link href="../yaml/screen/forms.css" rel="stylesheet" type="text/css"/>
        <script src="../js/lib/jquery-1.3.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.cycle.all.min.js" type="text/javascript"></script>
        <script src="../js/index.js" type="text/javascript"></script>
        <!--[if lte IE 7]>
        <link href="../css/patches/patch_my_layout.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <style type="text/css" media="all">
            #col2{
                width: 100%;
            }
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
                            <?php //include_once '../templates/fom1.php'; ?>
                        </div>
                    </div>
                    <div id="col2">
                        <div id="col2_content" class="clearfix">
                            <?php if(isset ($_SESSION)):?>
                            <p>Bienvenido, <?php echo $_SESSION['usuario']; ?></p>
                                <?php foreach ($usuarios as $usuario) : ?>
                            <form action="" method="post">
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>apellido</th>
                                            <th>Login</th>
                                            <th colspan="2">titulo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="id" readonly="true" value="<?php echo $usuario['id'] ?>"/>
                                            </td>
                                            <td>
                                                <input type="text" name="nombre" readonly="true" value="<?php echo $usuario['nombre'] ?>"/>
                                            </td>
                                            <td>
                                                <input type="text" name="apellido" readonly="true" value="<?php echo $usuario['apellido'] ?>"/>
                                            </td>
                                            <td>
                                                <input type="text" name="login" readonly="true" value="<?php echo $usuario['login'] ?>"/>
                                            </td>
                                            <td>
                                                <input type="submit" name="accion" value="uno"/><br/>
                                                <input type="submit" name="accion" value="dos"/>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </form>
                            <!--<form action="adminUsuarios.php" method="post" class="yform ">
                                <table class="full">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>login</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;
                                                <input type="text" name="id" disabled="true" value="<?php echo $usuario['id']; ?>"/>
                                            </td>
                                            <td>&nbsp;
                                                <input type="text" name="nombre" disabled="true" value="<?php echo $usuario['nombre']; ?>"/>
                                            </td>
                                            <td>&nbsp;
                                                <input type="text" name="apellido" disabled="true" value="<?php echo $usuario['apellido']; ?>"/>
                                            </td>
                                            <td>&nbsp;
                                                <input type="text" name="login" disabled="true" value="<?php echo $usuario['login']; ?>"/>
                                            </td>
                                            <td>
                                                <input type="button" name="editar" value="Editar"/>
                                                <input type="button" name="borrar" value="Borrar"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>-->
                                <?php endforeach; ?>
                            <?php else: ?>
                            <p>No ha iniciado sesión</p>
                            <?php endif; ?>
                            <a href="index.php?sesion=false">Cerrar sesión</a>
                        </div>
                    </div>
                    <div id="col3">
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