<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('index/index') ?>">Inicio</a>
           <input type="submit" value="Guardar" class="guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['razon_soc']->renderLabel() ?></th>
        <td>
          <?php echo $form['razon_soc']->renderError() ?>
          <?php echo $form['razon_soc'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rut']->renderLabel() ?></th>
        <td>
          <?php echo $form['rut']->renderError() ?>
          <?php echo $form['rut'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']->renderError() ?>
          <?php echo $form['direccion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono']->renderError() ?>
          <?php echo $form['telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['celular']->renderLabel() ?></th>
        <td>
          <?php echo $form['celular']->renderError() ?>
          <?php echo $form['celular'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mail']->renderLabel() ?></th>
        <td>
          <?php echo $form['mail']->renderError() ?>
          <?php echo $form['mail'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['es_empresa']->renderLabel() ?></th>
        <td>
          <?php echo $form['es_empresa']->renderError() ?>
          <?php echo $form['es_empresa'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

<div id="pie">
    <hr />
</div>
