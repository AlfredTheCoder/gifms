<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GIFMS | Login</title>
    <!--favicon-->
    <link rel="shortcut icon" type="text/css" href="<?php echo base_url().'public/img/favicon.ico';?>">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'public/sb-admin-2/vendor/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url().'public/sb-admin-2/vendor/metisMenu/metisMenu.min.css'; ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'public/sb-admin-2/dist/css/sb-admin-2.css'; ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url().'public/sb-admin-2/vendor/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'public/css/custom.css';?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="row text-center">
                        <img src="<?php echo base_url().'public/img/logo.jpg';?>" class="text-center"> 
                    </div>
                    <div class="panel-heading">
                        <h2 class="panel-title text-center">ENTER CREDENTIALS TO SIGN IN</h2>
                        <?php echo $this->session->flashdata('login_msg'); ?>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo base_url().'authenticate';?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="email" type="email" autofocus required="required">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="required">
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url().'public/sb-admin-2/vendor/jquery/jquery.min.js'; ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'public/sb-admin-2/vendor/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url().'public/sb-admin-2/vendor/metisMenu/metisMenu.min.js'; ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url().'public/sb-admin-2/dist/js/sb-admin-2.js'; ?>"></script>
</body>
</html>