<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('orden/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('orden/index') ?>">Lista Ordenes</a>
          &nbsp;<a href="<?php echo url_for('facturar/index') ?>">Facturar</a>
          <?php if (!$form->getObject()->isNew()): ?>
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
    <hr/>
</div>