<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="busqueda" action="<?php echo url_for('reportes/FechaFactura') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('reportes/FechaFactura') ?>">Volver</a>
            <input type="submit" id="consultar" value="Consultar" class="guardar" />
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
