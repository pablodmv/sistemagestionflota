<?php if ($sf_user->isAuthenticated()): ?>

<div id="menu">
    <div class="divMenu">
        <ul class="menu">
           <li><a id="item1">Logistica</a></li>
           <li><a id="item2">Contabilidad</a></li>
           <li><a id="item3">Trabajos</a></li>
           <li><a id="item4">Consultas</a></li>
           <li><a id="item5" >Reportes</a></li>
           <li><a href="<?php echo url_for('sf_guard_signout')?>" id="item6" >Salir</a></li>
        </ul>
    </div>

    <div class="divMenu1">
        <ul class="menu1">
           <li><a  href="<?php echo url_for('pasajero/new') ?>" id="item11" class="item">Administrar Ordenes</a></li>
           <li><a  href="<?php echo url_for('vehiculo/index') ?>" id="item11" class="item">Administrar Vehiculos</a></li>
        </ul>
    </div>

    <div class="divMenu2">
        <ul class="menu2">
           <li><a  href="<?php echo url_for('facturar/index') ?>" id="item21" class="item">Detalle Factura</a></li>
           <li><a  href="<?php echo url_for('cobro/index') ?>" id="item21" class="item">Cobro Factura</a></li>
           <li><a  href="<?php echo url_for('gasto/new') ?>" id="item22" class="item">Adm.Gastos</a></li>
           <li><a  href="<?php echo url_for('tarifa/new') ?>" id="item24" class="item">Tarifas</a></li>
           <li><a  href="<?php echo url_for('liquidacion/index') ?>" id="item25" class="item">Liquidar Proveedores</a></li>
           <li><a  href="<?php echo url_for('proveedor/new') ?>" id="item26" class="item">Ingresar Proveedores</a></li>
           <li><a  href="<?php echo url_for('cliente/new') ?>" id="item26" class="item">Ingresar Clientes</a></li>
        </ul>
    </div>

     <div class="divMenu3">
        <ul class="menu3">
            <li><a  href="<?php echo url_for('consulta/orden') ?>" id="item31" class="item">Ingresar Orden</a></li>
            <li><a  href="<?php echo url_for('remito/new') ?>" id="item32" class="item">Ingreso Remito</a></li>
            
        </ul>
    </div>

    <div class="divMenu4">
        <ul class="menu4">
            <li><a  href="<?php echo url_for('consulta/pasajero') ?>" id="item41" class="item">Pasajeros</a></li>
            <li><a  href="<?php echo url_for('vehiculo/index') ?>" id="item42" class="item">Vehículos</a></li>
           <li><a  href="<?php echo url_for('consulta/orden') ?>" id="item43" class="item">Ordenes por Cliente</a></li>
        </ul>
    </div>

     <div class="divMenu5">
        <ul class="menu5">
            <li><a  href="<?php echo url_for('reportes/FactFecha') ?>" id="item51" class="item">Facturacion por Fecha</a></li>
            <li><a  href="<?php echo url_for('reportes/OrdenesPend') ?>" id="item52" class="item">Ordenes Pendientes</a></li>
           <li><a  href="<?php echo url_for('reportes/ListaOrden') ?>" id="item53" class="item">Ordenes por Cliente</a></li>
           <li><a  href="<?php echo url_for('reportes/ListaPasajero') ?>" id="item53" class="item">Pasajeros por Vehiculo</a></li>
        </ul>
    </div>
    
</div>

<?php endif ?>


