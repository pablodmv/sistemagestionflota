<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('orden_search') ?>" method="get" >
    <fieldset id="idFieldSet" >
        <legend>Buscar Cliente</legend>
      <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
      <br>
      <input type="submit" value="Buscar" class="guardar" />
      <div class="help">

      </div>
    </fieldset>
</form>
    

<div id="pie">
    <hr />
</div>