<?php use_helper('javascriptBase','GMap') ?>
<?php include_stylesheets('mapaSuccess.css')?>

<h4>Mapa Pasajero</h4>
<?php echo $latitud.' * '.$longitud ?>
<div id="containerMap">
    
        <?php include_map($gMap); ?>
</div>

<div>
<a href="<?php echo $anterior ?>">Volver </a>
<hr />
</div>

<?php include_map_javascript($gMap); ?>