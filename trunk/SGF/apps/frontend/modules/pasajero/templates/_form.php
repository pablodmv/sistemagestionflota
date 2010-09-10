<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('pasajero/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('orden/index') ?>">Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'pasajero/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Desea borar a '.$form->getObject()->getNombre().'?')) ?>
          <?php endif; ?>
         <input type="submit" value="Guardar" class="guardar" />
        </td>
      </tr>
    </tfoot>
        
    <tbody>
      <?php echo $form ?>
    </tbody>

   </table>


</form>
<div id="pie">
    <hr />
</div>