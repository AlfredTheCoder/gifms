<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#"><img src="<?php echo base_url().'public/img/logo.jpg';?>" class="img-rounded"></a> 
        <span class="navbar-brand pull-right">GIFMS v2.0</span>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav nav-pills nav navbar-top-links navbar-right">
        <?php foreach ($menus as $key => $menu) {
            $active = '';
            if(strtolower($menu['Menu']) == strtolower($active_menu)){
                $active ='class="active"';
            }
            $url = base_url().str_ireplace('.x', '', $menu['URL']);
            echo '<li role="presentation" '.$active.'><a href="'.$url.'">'.$menu['Menu'].'</a></li>';
        }?>
        <!--Change password and logout-->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                <?php echo ucwords(strtolower($this->session->userdata('FirstName'))).' '.ucwords(strtolower($this->session->userdata('LastName')));?>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url().'changePassword'; ?>"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url().'logout'; ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search Supplier...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <?php foreach ($sidemenus as $key => $sidemenu) {
                    $url = base_url().str_ireplace('.x', '', $sidemenu['URL']);
                    echo '<li ><a href="'.$url.'">'.$sidemenu['Menu'].'</a></li>';
                }?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>