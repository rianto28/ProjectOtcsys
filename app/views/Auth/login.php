
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman | <?= $data['judul']; ?> </title>
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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= BASEURL ; ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= BASEURL; ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= BASEURL; ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= BASEURL; ?>/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><font color="black"><b>AnA</b>sys</a></font>
            <small><font color="black">Service - Integrity - Professional</font></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="<?= BASEURL; ?>/home/auth" method="POST">
                    <div><?php Flasher::flash(); ?></div>
                    <div class="msg"><img src="<?= BASEURL; ?>/img/logo.png" width=250></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= BASEURL; ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= BASEURL; ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= BASEURL; ?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= BASEURL; ?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= BASEURL; ?>/js/admin.js"></script>
    <script src="<?= BASEURL; ?>/js/pages/examples/sign-in.js"></script>
</body>

</html>