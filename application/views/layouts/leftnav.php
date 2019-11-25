<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>" class="site_title">
                <img src="<?php echo base_url('/resources/img/logoWhite.png'); ?>" alt="LogoITC" width='26'>
                <span>InterCableado</span></a>
        </div>
        <div class="clearfix"></div>

        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo $this->session->userdata('fotografia'); ?>" alt="..."
                    class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenido</span>
                <h2>
                    <?php
echo $this->session->userdata('nombre');
echo "&nbsp";
echo $this->session->userdata('ap_patern');
?>
                </h2>
            </div>
        </div>

        <br />

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Folios</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-database"></i> Cat&aacute;logos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Materiales</a></li>
                            <li><a>Cluster</a></li>
                            <li><a>Motivos</a></li>
                            <li><a>DTTO</a></li>
                            <li><a>Despachos</a></li>
                            <li><a>Tipos de Fallas</a></li>
                            <li><a>Cuadrillas</a></li>
                            <li><a>T&eacute;cnicos</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-cogs"></i> Sistema <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('usuarios'); ?>">Usuarios</a></li>
                            <li><a href="<?php echo site_url('status'); ?>">Status</a></li>
                            <li><a href="<?php echo site_url('nivel'); ?>">Nivel de usuario</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>


        <div class="sidebar-footer hidden-small">
            <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a> -->
            <a href="<?php echo site_url("login/login/logout"); ?>" data-toggle="tooltip" data-placement="top"
                title="Salir">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>

    </div>
</div>