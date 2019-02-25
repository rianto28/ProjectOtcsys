<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman | <?= $data['judul']; ?></title>
    <!-- Favicon-->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= BASEURL; ?>/img/ico/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/ico/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/ico/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/ico/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/ico/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?= BASEURL; ?>/img/ico/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="<?= BASEURL; ?>/img/ico/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="<?= BASEURL; ?>/img/ico/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="<?= BASEURL; ?>/img/ico/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="<?= BASEURL; ?>/img/ico/mstile-310x310.png" />

    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

     
    <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/dist/material-datetime-picker.css">

    
     <!-- Bootstrap Core Css -->
    <link href="<?= BASEURL; ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

       
    <!-- Waves Effect Css -->
    <link href="<?= BASEURL; ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="<?= BASEURL; ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

     <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= BASEURL; ?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= BASEURL; ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?= BASEURL; ?>/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Data Tabel -->
    <link href="<?= BASEURL; ?>/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="<?= BASEURL; ?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link href="<?= BASEURL; ?>/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?= BASEURL; ?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= BASEURL; ?>/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/BeatPicker/css/BeatPicker.min.css"/>

    <!-- Sweetalert Css -->
    <link href="<?= BASEURL; ?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php  ">OTCsys - PT AnA</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                            
                    <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= BASEURL; ?>/img/userimage/<?= $_SESSION['foto']; ?>" width="50" height="50" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['name']; ?></div>
                    <div class="email"><?= $_SESSION['username']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= BASEURL; ?>/home/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
           
            <?= require_once ($data['usermenu'].".php"); ?>

            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">Heri Rianto - OTCsys</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">