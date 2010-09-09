<?php use_helper('javascriptBase','GMap') ?>
<?php include_stylesheets('mapaSuccess.css')?>

<h4>Mapa Pasajero</h4>

<div id="containerMap">
    
        <?php include_map($gMap); ?>
</div>

<div id="pie">
<a href="<?php echo url_for('pasajero/index') ?>">Volver </a>
<hr />
</div>

<?php include_map_javascript($gMap); ?>