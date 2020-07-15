<?php
session_start();
include_once 'LQS_EUQ/GuiasTraker.php';
$fecha = date("d") . '-' . date("m") . '-' . date("Y");

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');
} else {
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Mole Tracker / Tracker </title>
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

  <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="css/animate.css" rel="stylesheet" type="text/css" />
  <link href="css/admin.css" rel="stylesheet" type="text/css" />
  <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href="plugins/kalendar/kalendar.css" rel="stylesheet">
  <link rel="stylesheet" href="plugins/scroll/nanoscroller.css">
  <link href="plugins/morris/morris.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/EstiloTablas.css">
  <link rel="stylesheet" href="css/custom2.css">
  <link rel="icon" href="imagenes/LOGOTKM.PNG">

  <style>
    body {
      background: url("imagenes/Registro.jpg") no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      background-attachment: fixed;
      overflow: scroll;
    }
  </style>


</head>

<body class="dark_theme  fixed_header left_nav_fixed light_theme green_thm">
  <div class="wrapper">
    <!--\\\\\\\ wrapper Start \\\\\\-->
    <div class="header_bar">
      <!--\\\\\\\ header Start \\\\\\-->
      <div class="brand">
        <!--\\\\\\\ brand Start \\\\\\-->
        <div class="logo" style="display:block">
          <img src="imagenes/LOGOTKM2.PNG" width="auto" height="30" class="d-inline-block align-top" alt="Logo GDX">
          <span class="theme_color">Mole</span> Tracker</div>
      </div>
      <!--\\\\\\\ brand end \\\\\\-->
      <div class="header_top_bar ">
        <!--\\\\\\\ header top bar start \\\\\\-->
        <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
        <div class="top_left">
          <div class="top_left_menu">
            <ul>
              <li> <a href="javascript:ReloadPage();"><i class="fa fa-repeat"></i></a> </li>
              <li class="dropdown">
                <a data-toggle="dropdown" href="javascript:Salir();"> <i class="fa fa-sign-out-alt"></i> </a>
                <ul class="drop_down_task dropdown-menu" style="margin-top:50px">
                  <div class="top_left_pointer"></div>
                  <li>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember">
                        Recordarme </label>
                    </div>
                  </li>
                  <li> <a href="help.html"><i class="fa fa-question-circle"></i> Ayuda</a> </li>
                  <li> <a href="settings.html"><i class="fa fa-cog"></i> Configuración </a></li>
                  <li> <a href="login.php"><i class="fa fa-power-off"></i> LogOut</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="top_right_bar">
          <div class="top_right">
            <div class="top_right_menu">
            </div>
          </div>
          <div class="user_admin dropdown">
            <?php
            echo '<div class="user_admin dropdown"><span class="user_adminname">Usuario: ' . $_SESSION['Usuario'] . '</span></div>';
            ?>
            <ul class="dropdown-menu">
              <div class="top_pointer"></div>
              <li> <a href="profile.html"><i class="fa fa-user"></i> Perfil</a> </li>
              <li> <a href="help.html"><i class="fa fa-question-circle"></i> Ayuda</a> </li>
              <li> <a href="settings.html"><i class="fa fa-cog"></i> Configuracion </a></li>
              <li> <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a> </li>
            </ul>
          </div>
        </div>
      </div>
      <!--\\\\\\\ header top bar end \\\\\\-->

    </div>
    <!--\\\\\\\ header end \\\\\\-->
    <div class="inner">
      <!--\\\\\\\ inner start \\\\\\-->
      <div class="left_nav">
        <!--\\\\\\\left_nav start \\\\\\-->
        <div class="search_bar"> <i class="fa fa-search"></i>
          <input name="" type="text" class="search" placeholder="Buscar..." />
        </div>
        <div class="left_nav_slidebar">
          <ul>
            <li class="left_nav_active theme_border"><a href="javascript:void(0);"><i class="fa fa-home"></i> TRACKER <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span> </a>
              <ul class="opened" style="display:block">
                <li>
                  <a href="DashboardTraker.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b>DashBoard</b> </a>
                </li>
                <li>
                  <a href="TrackerGuiasEntregadas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guias Entregadas</b> </a>
                </li>
                <li>
                  <a href="TrackerGuiasPlanificadas.php"> <span>&nbsp;</span> <i class="fa fa-circle  theme_color"></i> <b class="theme_color">Guias Planificadas</b> </a>
                </li>
                <li>
                  <a href="TrackerAtrasos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guias Retrasadas</b> </a>
                </li>
                <li>
                  <a href="TrackerGuiaActiva.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guia Activa</b> </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!--\\\\\\\left_nav end \\\\\\-->
      <div class="contentpanel">
        <!--\\\\\\\ contentpanel start\\\\\\-->
        <!-- Inicia la barra de Tutulo en right -->
        <div class="pull-left breadcrumb_admin clear_both">
          <div class="pull-left page_title theme_color">
            <h1>Tiempos del Piloto...</h1>
            <h2 class="">Panel Informativo...</h2>
          </div>
          <div class="pull-right">
            <ol class="breadcrumb">
              <li><a href="http://www.google.com">Sertero</a></li>
              <li><a href="http://www.google.com">AplicacionesWeb</a></li>
              <li class="active">Mole Tracker</li>
            </ol>
          </div>
        </div>
        <!-- Finaliza Barra de Titulo en right -->

        <!-- PreLoader -->
        <div id="PreLoaderCont">
          <div class="d-flex justify-content-center">
            <div class="spinner-grow text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
        <!-- Fin Preloader -->

        <!-- Contenido -->
        <div id="PreLoaderCont">
          <div class="row">
            <div class="col-md-6">
              <div class="multi-stat-box">
                <div class="header">
                  <div class="left">
                    <h2>KILOS CARGADOS</h2>
                    <a><i class="fa fa-chevron-down"></i> </a>
                  </div>
                  <div class="right">
                    <h2>NOV 10 - NOV 17</h2>
                    <div class="percent"><i class="fa fa-angle-double-down"></i> 34%</div>
                  </div>
                </div>
                <div class="content">
                  <div class="left">
                    <ul>
                      <li> <span class="date">Vision General</span> <span class="value">1,104</span> </li>
                      <li class="active"> <span class="date">Esta Semanak</span> <span class="value">486</span> </li>
                      <li> <span class="date">Ayer</span> <span class="value">364</span> </li>
                      <li> <span class="date">Hoy</span> <span class="value">254</span> </li>
                    </ul>
                  </div>
                  <div class="right">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="130" data-width="90%" data-line-width="1" data-line-color="#ddd" data-spot-color="#ccc" data-fill-color="" data-highlight-line-color="#ddd" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455,150,530,140]"></div>
                    <div class="ticket-lebel">DOM</div>
                    <div class="ticket-lebel">LUN</div>
                    <div class="ticket-lebel">MAR</div>
                    <div class="ticket-lebel">MIE</div>
                    <div class="ticket-lebel">JUE</div>
                    <div class="ticket-lebel">VIE</div>
                    <div class="ticket-lebel">SAB</div>
                    <div class="ticket-lebel">DOM</div>
                  </div>
                </div>
              </div>
              <br />
              <div class="panel">
                <div class="panel-body">
                  <div class="chart">
                    <div class="heading"> <span>Noviembre</span> <strong>15 Días | 57%</strong> </div>
                    <div id="barchart"></div>
                  </div>
                </div>
                <div class="chart-tittle"> <span class="title text-muted">Surtido de Productos</span> <span class="value-pie text-muted">Por Guia de Carga</span> </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4>Comparación de Horas perdidas y kilos cargados</h4>
                </div>
                <div class="panel-body">
                  <div id="hero-graph" class="graph"></div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-4 ">
              <div class="block-web green-bg-color">
                <h3 class="content-header ">Obserbaciónes</h3>
                <div class="porlets-content">
                  <ul class="list-group task-list no-margin collapse in">
                    <li class="list-group-item green-light-bg-color">
                      <label class="label-checkbox inline">
                        <input type="checkbox" checked="" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Mejorar Tiempos muertos <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Atender las llamadas a Rampa <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Revisar Picking <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      cumplir CheckList <span class="label label-warning m-left-xs">1:30PM</span> <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Revisar Marchamos <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                    <li class="list-group-item">
                      <label class="label-checkbox inline">
                        <input type="checkbox" class="task-finish">
                        <span class="custom-checkbox"></span> </label>
                      Marcar Salidas <span class="label label-danger m-left-xs">4:40PM</span> <span class="pull-right"> <a class="task-del" href="#"><i class="fa fa-times"></i></a> </span> </li>
                    <form class="form-inline margin-top-10" role="form">
                      <input type="text" class="form-control" placeholder="Agregar Tarea...">
                      <button class="btn btn-default btn-warning pull-right" type="submit"><i class="fa fa-plus"></i> Add Task</button>
                    </form>
                  </ul>
                  <!-- /list-group -->
                </div>
                <!--/porlets-content-->
              </div>
              <!--/block-web-->
            </div>
            <!--/col-md-4-->
            <div class="col-md-4 ">
              <div class="block-web">
                <h3 class="content-header">Notas</h3>
                <div class="block widget-notes">
                  <div contenteditable="true" class="paper"> <br>
                    <s>.</s><br>
                    <s></s><br>
                    <s></s><br>
                    <br>
                    <br>
                    <br>
                    <br>
                  </div>
                </div>
                <!--/widget-notes-->
              </div>
              <!--/block-web-->
            </div>
            <!--/col-md-4 -->
            <div class="col-md-4 ">
              <div class="kalendar"></div>
              <div class="list-group"> <a class="list-group-item" href="#"> <span class="badge bg-danger">7:50 Rampa No. R12</span> Guia No. 2543 </a> <a class="list-group-item" href="#"> <span class="badge bg-success">10:30 Rampa No. R2</span> Guia No. 3421 </a> <a class="list-group-item" href="#"> <span class="badge bg-light">11:40 Rampoa No. R04</span> Guia No. 9832 </a> </div>
              <!--/calendar end-->
            </div>
            <!--/col-md-4 end-->
          </div>
        </div>
        <!-- Fin Se Ingresan los mantenimientos -->

        <div class="demo"><span id="demo-setting"><i class="fa fa-cog txt-color-blueDark"></i></span>
          <form>
            <legend class="no-padding margin-bottom-10" style="color:#6e778c;">Layout Options</legend>
            <section><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-header" name="subscription"><span>Fixed Header</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-navigation" name="terms"><span>Fixed Navigation</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-rigth-navigation" name="terms"><span>Right Navigation</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-boxed-layout" name="terms"><span>Boxed Layout</span></label>
              <span id="smart-bgimages" style="display: none;"></span>
            </section>
            <section>
              <h6 class="margin-top-10 semi-bold margin-bottom-5">Clear Localstorage</h6><a id="reset-smart-widget" class="btn btn-xs btn-block btn-primary" href="javascript:void(0);"><i class="fa fa-refresh"></i> Factory Reset</a>
            </section>
            <h6 class="margin-top-10 semi-bold margin-bottom-5">Ultimo Skins</h6>
            <section id="smart-styles"><a style="background-color:#23262F;" class="btn btn-block btn-xs txt-color-white margin-right-5" id="dark_theme" href="javascript:void(0);"><i id="skin-checked" class="fa fa-check fa-fw"></i> Dark Theme</a><a style="background:#E35154;" class="btn btn-block btn-xs txt-color-white" id="red_thm" href="javascript:void(0);">Red Theme</a><a style="background:#34B077;" class="btn btn-xs btn-block txt-color-darken margin-top-5" id="green_thm" href="javascript:void(0);">Green Theme</a><a style="background:#56A5DB" class="btn btn-xs btn-block txt-color-white margin-top-5" data-skinlogo="img/logo-pale.png" id="blue_thm" href="javascript:void(0);">Blue Theme</a><a style="background:#9C6BAD" class="btn btn-xs btn-block txt-color-white margin-top-5" id="magento_thm" href="javascript:void(0);">Magento Theme</a>
              <a style="background:#FFFFFF" class="btn btn-xs btn-block txt-color-black margin-top-5" id="light_theme" href="javascript:void(0);">Light Theme</a>
            </section>
          </form>
        </div>
      </div>
      <!-- Fin Contenido -->



      <script src="js/jquery-2.1.0.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/common-script.js"></script>
      <script src="js/jquery.slimscroll.min.js"></script>
      <script src="js/jquery.sparkline.js"></script>
      <script src="js/sparkline-chart.js"></script>
      <script src="js/graph.js"></script>
      <script src="js/edit-graph.js"></script>
      <script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
      <script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>
      <script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
      <script src="plugins/sparkline/jquery.customSelect.min.js"></script>
      <script src="plugins/sparkline/sparkline-chart.js"></script>
      <script src="plugins/sparkline/easy-pie-chart.js"></script>
      <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
      <script src="plugins/morris/raphael-min.js" type="text/javascript"></script>
      <script src="plugins/morris/morris-script.js"></script>
      <script src="plugins/demo-slider/demo-slider.js"></script>
      <script src="plugins/knob/jquery.knob.min.js"></script>
      <script src="js/jPushMenu.js"></script>
      <script src="js/side-chats.js"></script>
      <script src="js/jquery.slimscroll.min.js"></script>
      <script src="plugins/scroll/jquery.nanoscroller.js"></script>
      <script src="js/FuncionesInternas.js"></script>
      <script>
                    window.addEventListener('load', () => {
                        carga();
                    })
                </script>



</body>

</html>