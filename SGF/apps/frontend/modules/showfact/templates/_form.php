<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('showfact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('showfact/index') ?>">Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'showfact/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
            <input type="submit" value="Guardar" class="guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php //echo $form->renderGlobalErrors() ?>
        <!--
      <tr>
        <th><?php //echo $form['num_fac']->renderLabel() ?></th>
        <td>
          <?php //echo $form['num_fac']->renderError() ?>
          <?php //echo $form['num_fac'] ?>
        </td>
      </tr>
       
      <tr>
        <th><?php// echo $form['cliente']->renderLabel() ?></th>
        <td>
          <?php// echo $form['cliente']->renderError() ?>
          <?php// echo $form['cliente'] ?>
        </td>
      </tr>
         -->
      <tr>
        <th><?php echo $form['fecha_fact']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_fact']->renderError() ?>
          <?php echo $form['fecha_fact'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['desc_generica']->renderLabel() ?></th>
        <td>
          <?php echo $form['desc_generica']->renderError() ?>
          <?php echo $form['desc_generica'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['subtotal']->renderLabel() ?></th>
        <td>
          <?php echo $form['subtotal']->renderError() ?>
          <?php echo $form['subtotal'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['total']->renderLabel() ?></th>
        <td> <?php echo $form['total']->renderError() ?>
          <?php echo $form['total'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['moneda']->renderLabel() ?></th>
        <td>
          <?php echo $form['moneda']->renderError() ?>
          <?php echo $form['moneda'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['formapago']->renderLabel() ?></th>
        <td>
          <?php echo $form['formapago']->renderError() ?>
          <?php echo $form['formapago'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaPago']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaPago']->renderError() ?>
          <?php echo $form['fechaPago'] ?>
        </td>
      </tr>
      <!--
      <tr>

        <th><?php// echo $form['tmplineafact_list']->renderLabel() ?></th>
        <td>
          <?php //echo $form['tmplineafact_list']->renderError() ?>
          <?php //echo $form['tmplineafact_list'] ?>
        </td>
      </tr>
      -->
    </tbody>
  </table>
</form>
