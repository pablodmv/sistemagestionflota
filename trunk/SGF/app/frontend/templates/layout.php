<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <title>SGF-Sistema Gestión Flota</title>
 <link rel="shortcut icon" href="/favicon.ico" />
 <?php include_javascripts() ?>
 <?php include_stylesheets() ?>
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
    <?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice">
     <?php echo $sf_user->getFlash('notice') ?>
    </div>
    <?php endif; ?>
    <?php if ($sf_user->hasFlash('error')): ?>
    <div class="flash_error">
     <?php echo $sf_user->getFlash('error') ?>
    </div>
    <?php endif; ?>
    <div class="contentC">
     <?php echo $sf_content ?>
    </div>
   </div>
     
  
  </div>
    <!--
     <div id="footer">
    <div class="content">
      <span class="symfony">
        powered by <a href="http://www.symfony-project.org/">
       <img src="/images/symfony.gif" alt="symfony framework" />
       </a>
      </span>

    </div>
   </div>
    -->
    <?php if ($sf_user->isAuthenticated()): ?>
    <div id="pie"><label class="datosfoot" id="user">Usuario:</label> <label  id="nombreUser" class="datosfoot"> <?php echo sfGuardUserProfile::getName($sf_user->getGuardUser()->getId());  ?></label>
    </div>
    <?php endif ?>
 </body>

</html>