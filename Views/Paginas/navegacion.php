<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="Public/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <?php
                echo '<p>'.$_SESSION['nombre'].'</p>';
                echo '<a href="#">' . $_SESSION['tipoUsuario'] . '</a>';
            ?>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!--ENCABEZADO-->
            <li class="header"> <center> <strong> ADMINISTRACION </strong> </center> </li>

            <!--OPCION DE DASHBOARD-->
            <li>
                <a href="inicio.php?action=dashboard">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li> 



            <!--OPCION DE CONSOLAS-->
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-gamepad"></i>
                    <span>Consolas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="inicio.php?action=consolas">
                            
                            <i class="far fa-list-alt"></i> Lista de Consolas
                        </a>
                    </li>
                    <li active>
                        <a href="inicio.php?action=agregar_consola">
                            <i class="fas fa-plus"></i> Agregar consola
                        </a>
                    </li>
                </ul>
            </li>

            
        </ul>
    </section>
</aside>