<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>SGF- Administración Sistema Gestión Flota</title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <div id="header">
   <div class="contentMenu">
       <div class="contentMenuDer">
          <div class="contentMenuIzq">
               <?php include_partial('global/menu') ?>
          </div>
       </div>
       <br></br>
    </div>
   </div>
  </head>
  <body>
      <div id="container">
          <div id="content">
              <div class="contentC">
                  <?php echo $sf_content ?>
              </div>
          </div>
      </div>
  </body>
  <div id="footer">
  <div class="content">
    <!-- footer content -->

    <?php //include_component('language', 'language') ?>
  </div>
</div>
</html>
