<?php
$root="http://localhost/BuscoCarro.com/";
// <editor-fold defaultstate="collapsed" desc="Variables">
$autos = array(
        0 => array(
                'marca'=>'Mazda',
                'modelo'=>'RX 7',
                'año'=>'2005',
                'precio'=>'50000',
                'fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'),
                'caracteristicas'=>array('','','','','')
        ),
        1 => array(
                'marca'=>'Mitsubishi',
                'modelo'=>'Lancer',
                'año'=>'2010',
                'precio'=>'50000',                'fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'),
'caracteristicas'=>array('','','','','')
        ),
        3 => array(
                'marca'=>'Ford',
                'modelo'=>'Fiesta',
                'año'=>'2009',
                'precio'=>'36000',                'fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'),
'caracteristicas'=>array('','','','','')
        ),
        4 => array(
                'marca'=>'Lancia',
                'modelo'=>'Stratos',
                'año'=>'1973',
                'precio'=>'70000',                'fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'),
'caracteristicas'=>array('','','','','')
        ),
        5 => array(
                'marca'=>'Ford',
                'modelo'=>'Focus',
                'año'=>'2008',
                'precio'=>'30000',                'fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'),
'caracteristicas'=>array('','','','','')
        ),
        5 => array(
                'marca'=>'Subaru',
                'modelo'=>'Impreza',
                'año'=>'2009',
                'precio'=>'20000',                'fotos'=>array('auditt.jpg','elantra.jpg','focus.jpg','focus08.jpg','fortuner09.jpg','lancer.jpg','lancer04.jpg'),
'caracteristicas'=>array('','','','','')
        ),
);// </editor-fold>
?>

<div id="cycle">
  <?php foreach ($autos as $auto) :?>
  <div class="oferta">
    <p class="icaption_right"><img src="<?php echo $root."images/carros/".$auto['fotos'][array_rand($auto['fotos'])]; ?>" alt="<?php echo $auto['marca']; ?> <?php echo $auto['modelo']; ?>"></p>
    <div class="otrosmodelos float_right">
    <h3>Otros Modelos:</h3>
    <ul></ul>
    </div>
    <h1><?php echo $auto['marca']; ?> <?php echo $auto['modelo']; ?></h1>
    <div class="datos">
      <p>Año: <span><?php echo $auto['año']; ?> </span></p>
      <p>Precio: <span><?php echo number_format($auto['precio'], 2); ?> </span></p>
    </div>
    <div class="imagenes">
      <?php foreach ($auto['fotos'] as $foto) :?>
      <a href="#"><img class="thumb" src="<?php echo $root."images/carros/".$foto; ?>" alt=""/></a>
      <?php endforeach; ?>
    </div>
    <div class="masinfo"> <a href="#">Más de este modelo</a>  <a href="#">Ver más</a> </div>
  </div>
  <?php endforeach; ?>
</div>
