<div class="c50l">
    <img src="<?php echo ROOT.IMAGES; ?>Logo.jpg" alt="logo" align="absmiddle"  height="200"/>
</div>
<div class="c50r">
    <form class="yform columnar" action="<?php echo ROOT; ?>/login.php" name="login" method="post">
        <fieldset>
            <legend>Iniciar Sesión</legend>
            <div class="type-text" >
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario"/>
            </div>
            <div class="type-text">
                <label for="password">Contraseña:</label>
                <input type="password" name="password"/>
            </div>
            <div class="type-button">
                <input type="submit" name="ingresar" value="Ingresar"/>
                <span><a href="<?php echo ROOT; ?>/login.php">¿Deseas registrarte?</a> </span>
            </div>
        </fieldset>
    </form>
</div>
<div id="topnav">
    <a class="skip" title="skip link" href="#navigation">Skip to the navigation</a><span class="hideme">.</span>
    <a class="skip" title="skip link" href="#content">Skip to the content</a><span class="hideme">.</span>
    <!--<a href="login.php">Login</a> <a href="#" class="hideme">Contact</a> <a href="#" class="hideme">Imprint</a>-->
</div>