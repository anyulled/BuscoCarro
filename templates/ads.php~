<?php
$root="http://localhost/BuscoCarro.com/";
$ads = array(
        0 => array('image'=>'images/ads/google.jpg', 'link'=>'http://www.google.com'),
        1 => array('image'=>'images/ads/microsoft.jpg', 'link'=>'http://www.google.com'),
        2 => array('image'=>'images/ads/ibm.jpg', 'link'=>'http://www.google.com'),
        3 => array('image'=>'images/ads/apple.jpg', 'link'=>'http://www.google.com'),
        4 => array('image'=>'images/ads/coke.jpg', 'link'=>'http://www.google.com')
);
shuffle($ads);
?>
<div class="floatbox">
    <?php foreach ($ads as $ad) :?>
    <a href="<?php echo $ad['link']; ?>"><img src="<?php echo $root.$ad['image']; ?>" alt="<?php echo $ad['link']; ?>"/></a>
    <?php endforeach; ?>
</div>
