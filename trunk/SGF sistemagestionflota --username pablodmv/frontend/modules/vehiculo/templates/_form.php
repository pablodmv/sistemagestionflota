<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('vehiculo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('vehiculo/index') ?>">Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php  echo link_to('Borrar', 'vehiculo/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Desea borar a '.$form->getObject()->getDescripcion().'?')) ?>
          <?php endif; ?>
            <input type="submit" value="Guardar" class="guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion']->renderError() ?>
          <?php echo $form['descripcion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['marca']->renderLabel() ?></th>
        <td>
          <?php echo $form['marca']->renderError() ?>
          <?php echo $form['marca'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['modelo']->renderLabel() ?></th>
        <td>
          <?php echo $form['modelo']->renderError() ?>
          <?php echo $form['modelo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ano']->renderLabel() ?></th>
        <td>
          <?php echo $form['ano']->renderError() ?>
          <?php echo $form['ano'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['matricula']->renderLabel() ?></th>
        <td>
          <?php echo $form['matricula']->renderError() ?>
          <?php echo $form['matricula'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['capacidad']->renderLabel() ?></th>
        <td>
          <?php echo $form['capacidad']->renderError() ?>
          <?php echo $form['capacidad'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['proveedor']->renderLabel() ?></th>
        <td>
          <?php echo $form['proveedor']->renderError() ?>
          <?php echo $form['proveedor'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
<div id="pie">
    <hr/>
</div>