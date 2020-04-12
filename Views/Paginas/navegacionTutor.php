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
            <li class="header"> <center> <strong> ADMINISTRACION </strong> </center> </li>

            <!--OPCION DE DASHBOARD-->
            <li>
                <a href="../usuarios/usuarios.php">
                    <i class="fa fa-th"></i> <span>Usuarios</span>
                </a>
            </li>
            <li style="display:none;">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Redes sociales</span>
                </a>
            </li>
            <li>
                <a href="../plataformas/plataformas.php">
                    <i class="fa fa-th"></i> <span>Plataformas</span>
                </a>
            </li>
            <li>
              <a href="../consolas/consolas.php">
                  <i class="fa fa-th"></i> Consolas
              </a>
            </li>
            <li>
                <a href="../juegos/juegos.php">
                    <i class="fa fa-th"></i> <span>Juegos</span>
                </a>
            </li>
            <li>
                <a href="../rentas/rentas.php">
                    <i class="fa fa-th"></i> <span>Rentas</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-list-ol"></i>
                    <span>Accesorios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../accesorios/accesorios.php">
                            <i class="fa fa-th"></i> Lista de accesorios
                        </a>
                    </li>
                    <li>
                        <a href="../rentasAccesorios/rentasAccesorios.php">
                            <i class="fa fa-th"></i> Rentar accesorio
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-list-ol"></i>
                    <span>Dulces</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../dulces/dulces.php">
                            <i class="fa fa-th"></i> Lista de dulces
                        </a>
                    </li>
                    <li>
                        <a href="../ventasDulces/ventaDulces.php">
                            <i class="fa fa-th"></i> Vender dulce
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-list-ol"></i>
                    <span>Torneos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../torneos/torneos.php">
                            <i class="fa fa-th"></i> Lista de torneos
                        </a>
                    </li>
                    <li>
                        <a href="../premios/premios.php">
                            <i class="fa fa-th"></i> Premios
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
