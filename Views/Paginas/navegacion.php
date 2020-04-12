<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="../Public/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <?php
              echo '<p>'.$_SESSION['nombre'].'</p>';
              if($_SESSION['tipoUsuario'] == '1')
                echo '<h6>' . 'Administrador' . '</h6>';
              else
                echo '<h6>' . 'Gamer' . '</h6>';
            ?>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!--ENCABEZADO-->
            <li class="header"> <center> <strong> GAMER </strong> </center> </li>

            <!--OPCION DE DASHBOARD-->
            <li>
                <a href="../torneos/torneosGamer.php">
                    <i class="fa fa-th"></i> <span>Lista de torneos</span>
                </a>
            </li>
            <li>
                <a href="../torneos/misTorneos.php">
                    <i class="fa fa-th"></i> <span>Mis torneos</span>
                </a>
            </li>
            <li>
                <a href="../torneos/invitaciones.php">
                    <i class="fa fa-th"></i> <span>Invitaciones</span>
                </a>
            </li>
            <li>
                <a href="../rentas/rentasHistorico.php">
                    <i class="fa fa-th"></i> <span>Historiales</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
