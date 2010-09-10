<?php if ($sf_user->isAuthenticated()): ?>
<div id="menu">
    <div class="divMenu">
        <ul class="menu">
           <li><a id="item1" href="<?php echo url_for('chofer')?>">Chofer</a></li>
           <li><a id="item2" href="<?php echo url_for('cliente')?>">Cliente</a></li>
           <li><a id="item3" href="<?php echo url_for('localidad')?>">Localidad</a></li>
           <li><a id="item4" href="<?php echo url_for('moneda')?>">Moneda</a></li>
           <li><a id="item5" href="<?php echo url_for('proveedor')?>">Proveedor</a></li>
           <li><a id="item6" href="<?php echo url_for('tarifa')?>">Tarifa</a></li>
           <li><a id="item7" href="<?php echo url_for('tipo_gasto')?>">T.Gasto</a></li>
           <li><a id="item8" href="<?php echo url_for('vehiculo')?>">Vehículo</a></li>
           <li><a id="item9" href="<?php echo url_for('zona')?>">Zona</a></li>
           <li><a id="item10" href="<?php echo url_for('sf_guard_user')?>">Usuarios</a></li>
           <li><a href="<?php echo url_for('sf_guard_signout')?>" id="item6" >Salir</a></li>
        </ul>
    </div>
</div>

<?php endif ?>