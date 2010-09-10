<h2>Lista Choferes</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Docid</th>
      <th>Domicilio</th>
      <th>Libconducir</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($chofers as $chofer): ?>
    <tr>
      <td><a href="<?php echo url_for('chofer/show?id='.$chofer->getId()) ?>"><?php echo $chofer->getId() ?></a></td>
      <td><?php echo $chofer->getNombre() ?></td>
      <td><?php echo $chofer->getDocid() ?></td>
      <td><?php echo $chofer->getDomicilio() ?></td>
      <td><?php echo $chofer->getLibconducir() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="pie">
    <a href="<?php echo url_for('chofer/new') ?>">Nuevo</a>
    <hr />
</div>
  
