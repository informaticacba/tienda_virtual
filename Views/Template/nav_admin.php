    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/avatar.png" alt="User Image">

      </div>
      <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>" target="_blank">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Ver sitio web</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/empleado">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Empleados</span>
            </a>
        </li>
       
      </ul>
    </aside>