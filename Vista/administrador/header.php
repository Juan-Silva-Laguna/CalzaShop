<?php
session_start();

// Verifica si la variable de sesión 'nombre' está establecida y no está vacía
if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] == '') {
    header('Location: ../IniciarSesion.php');
    exit(); // Asegúrate de que el script se detenga después de la redirección
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../..//Assets/general/images/icono.png" type="image/png" />

    <title>CalzaShop</title>

    <!-- Bootstrap -->
    <link href="../../Assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../Assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../Assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../Assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../../Assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../Assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../Assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../Assets/admin/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../Assets/sweetalert2.min.css">
    <link rel="stylesheet" href="../../Assets/admin/css/dataTables.min.css">

    <style>
      .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
      }

      .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
      }

      .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
      }

      .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
      }

      .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
      }

      .colored-toast .swal2-title {
        color: white;
      }

      .colored-toast .swal2-close {
        color: white;
      }

      .colored-toast .swal2-html-container {
        color: white;
      }

      .notificacion {
            display: inline-block; /* Permite animar el elemento */
            animation: moverYGirar 0.3s infinite alternate; /* Llama a la animación */
        }

        @keyframes moverYGirar {
            0% {
                transform: translateX(0) rotate(15deg); /* Posición inicial y sin rotación */
            }
            100% {
                transform: translateX(0) rotate(-15deg); /* Regresa a la posición original y rota en la dirección opuesta */
            }
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title text-center mt-2" id="logo_principal">
                <img src="../../Assets/admin/images/calzashop.png" alt="..." style="width: 140px;">
              </a>
            </div>
            
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix mt-3">
              <a href="perfil.php">
              <div class="profile_pic">
                <img src="../../Assets/general/images/user.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>Bienvenido(a), <br>
                  <?php 
                  echo $_SESSION['nombre'];
                ?>
              </h2>
              </a>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu text-center">
                  <li>
                    <a href="index.php">
                      <!-- <i class="fa fa-home"></i> -->
                       INICIO </a>
                  </li>
                  <?php
                    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador') {
                  ?>
                    <li>
                      <a href="usuarios.php">
                        <!-- <i class="fa fa-home"></i> -->
                        USUARIOS</a>
                    </li>
                    <li>
                      <a href="categoria.php">
                        <!-- <i class="fa fa-home"></i> -->
                        CATEGORIAS </a>
                    </li>
                    <li>
                      <a href="producto.php">
                        <!-- <i class="fa fa-home"></i> -->
                        PRODUCTOS 
                        <div class="notificacion" id="not_productos">
                        </div>
                      </a>
                    </li>
                  <?php
                    }
                  ?>
                  <li>
                    <a href="ventas.php">
                      <!-- <i class="fa fa-home"></i> -->
                       VENTAS </a>
                  </li>
                  <li>
                    <a href="pedido - online.php">
                      <!-- <i class="fa fx`a-home"></i> -->
                       PEDIDO - ONLINE 
                       <div class="notificacion" id="not_pedido_online">
                          
                      </div>
                      </a>
                  </li>
                  <li>
                    <a href="reporte.php">
                      <!-- <i class="fa fa-home"></i> -->
                      REPORTES </a>
                  </li>
                  <li>
                    <a href="contactar.php">
                      <!-- <i class="fa fa-home"></i> -->
                      CONTACTAR 
                      <div class="notificacion" id="not_contactar">
                          
                      </div>
                    </a>
                  </li>
                </ul>
                
                <ul class="nav side-menu text-center mt-3">
                  <li class="mt-5 pt-3">
                    <a id="cerra_sesion" class="mt-5 pt-3" style="color: red; font-weight: bold;">
                       SALIR </a>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <div class="text-right">
                <h3>$ <span id="tot_global"></span> &nbsp; </h3>
              </div>
          </div>
        </div>
        <!-- /top navigation -->