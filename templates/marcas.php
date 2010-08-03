<?php

// include_once '../includes/db.php';
// $db = new db();
//$marcas =   $db->select(array('nombre','urlImagen'),'marcas');
$root = "http://localhost";
$rutaImagenes = "/BuscoCarro.com/images/logos marcas/";
$marcas =$db->dame_query("select nombre, urlImagen from marcas ORDER BY RAND() LIMIT 20");

foreach($marcas['data'] as $marca):?>
<a title="<?php echo $marca['nombre']; ?>" href="<?php echo $root ?>/BuscoCarro.com/carros/marca.php?nombre=<?php echo $marca['nombre']; ?>"><img alt="<?php echo $marca['nombre'] ?>" align="absmiddle" src="<?php echo $root.$rutaImagenes.$marca['urlImagen']; ?>"/></a>
<?php endforeach;?>
