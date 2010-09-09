<h1>Lista de Facturas </h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Num fac</th>
      <th>Cliente</th>
      <th>Fecha fact</th>
      <th>Iva</th>
      <th>Subtotal</th>
      <th>Total</th>
      <th>Moneda</th>
      <th>Formapago</th>
      <th>Fechapago</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facturas as $factura): ?>
    <tr>
      <td><!--<a href="<?php //echo url_for('showfact/edit?id='.$factura->getId()) ?>"><?php echo $factura->getId() ?></a>--><?php echo $factura->getId() ?></td>
      <td><?php echo $factura->getNumFac() ?></td>
      <td><?php echo $factura->getNombreCliente() ?></td>
      <td><?php echo $factura->getFechaFact() ?></td>
      <td><?php echo $factura->getIva() ?></td>
      <td><?php echo $factura->getSubtotal() ?></td>
      <td><?php echo $factura->getTotal() ?></td>
      <td><?php echo $factura->getTipoMoneda() ?></td>
      <td><?php echo $factura->getFormapago() ?></td>
      <td><?php echo $factura->getFechapago() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <!--<a href="<?php //echo url_for('showfact/new') ?>">Nueva</a>-->
<a href="<?php echo url_for('facturar/index') ?>">Nueva</a>