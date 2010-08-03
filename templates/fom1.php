<?php
$modelo = array("ford","chevy","fiat","mitsubishi");
$marcas = array("montero","lancer","eclipse","cosworth");
$ciudades = array("lara","distrito federal","falcón","mérida","Nueva Esparta");
$estados = array("Caracas","Los Teques","maracay","Coro");
?>

<div class="floatbox">
    <form action="busqueda.php" class="yform columnar" name="busqueda" id="busqueda" method="post">
        <input type="hidden" name="tipo"value="autos"/>
        <fieldset>
            <legend>Buscar Autos</legend>
            <div class="type-select">
                <label for="modelo">Modelo</label>
                <select name="modelo">
                    <?php foreach ($modelo as $marca) :?>
                    <option><?php echo $marca; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="type-select">
                <label for="marca">Marca</label>
                <select name="marca">
                    <?php foreach ($marcas as $item) :?>
                    <option><?php echo $item; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="type-select">
                <label for="precio">Precio</label>
                <input type="text" name="preciomin" value="" maxlength="6" size="4"/>
                <span> a </span>
                <input type="text" name="preciomax" value="" maxlength="6" size="4"/>
            </div>
            <div class="type-select">
                <label for="fecha">Año</label>
                <select name="fecha">
                    <?php for($i=date("Y")+1; $i>=date("Y")-20; $i--):?>
                    <option><?php echo $i; ?> </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="type-button">
                <input class="submit" type="submit" value="Buscar" name="submit"/>
            </div>
        </fieldset>
    </form>
</div>
<div class="floatbox">
    <form action="busqueda.php" class="yform columnar" name="guia" id="guia" method="post">
        <fieldset>
            <legend>Guía Automotriz</legend>
            <div class="type-select">
                <label for="tipo">Tipo de Servicio</label>
                <select name="tipoServicio">
                    <option> Taller </option>
                    <option> Concesionario </option>
                </select>
            </div>
            <div class="type-select">
                <label for="ciudad">Ciudad</label>
                <select name="ciudad">
                    <?php foreach ($ciudades as $ciudad) :?>
                    <option><?php echo $ciudad; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="type-select">
                <label for="estado">Estado</label>
                <select name="estado">
                    <?php foreach ($estados as $estado) :?>
                    <option><?php echo $estado; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="type-button">
                <input class="submit" type="submit" value="Buscar" name="submit"/>
            </div>
        </fieldset>
    </form>
</div>