<!-- apps/wap/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
      <title>SGF-Sistema Gestión Flota WAP</title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <div id="header">
        <div class="contentMenu">
            <?php include_partial('global/menuWAP') ?>
        </div>
    </div>
  </head>
  <body>
      <div id="container">
          <div class="contentC">
            <?php echo $sf_content ?>
          </div>
        
      </div>
    
  </body>
</html>
