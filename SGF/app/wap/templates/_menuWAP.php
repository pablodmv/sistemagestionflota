<?php if ($sf_user->isAuthenticated()): ?>
<div id="menu">
    <div class="divMenu">
        <ul class="menu">
           <li><a href="<?php echo url_for('orden/index') ?>">Mis Viajes </a></li>
           <li><a href="<?php echo url_for('sf_guard_signout')?>" >Salir</a></li>
        </ul>
    </div>
</div>

<?php endif ?>


