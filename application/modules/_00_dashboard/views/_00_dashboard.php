<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/material/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/material/assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title><?php echo SITE_NAME; ?></title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <!-- <link href="<?php echo base_url(); ?>assets/material/assets/css/bootstrap-select.min.css" rel="stylesheet" /> -->
        <link href="<?php echo base_url(); ?>assets/material/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/select2/css/select2.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/datetimepicker/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <!-- <link href="<?php echo base_url(); ?>assets/material/assets/demo/demo.css" rel="stylesheet" /> -->

        <style>
            .pagination {
                display: inline-block;
                padding-left: 0;
                margin: 20px 0;
                border-radius: 4px;
            }
            .pagination > li {
                display: inline;
            }
            .pagination > li > a,
            .pagination > li > span {
                position: relative;
                float: left;
                padding: 6px 12px;
                margin-left: -1px;
                line-height: 1.42857143;
                color: #428bca;
                text-decoration: none;
                background-color: #fff;
                border: 1px solid #ddd;
            }
            .pagination > li:first-child > a,
            .pagination > li:first-child > span {
                margin-left: 0;
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }
            .pagination > li:last-child > a,
            .pagination > li:last-child > span {
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
            }
            .pagination > li > a:hover,
            .pagination > li > span:hover,
            .pagination > li > a:focus,
            .pagination > li > span:focus {
                color: #2a6496;
                background-color: #eee;
                border-color: #ddd;
            }
            .pagination > .active > a,
            .pagination > .active > span,
            .pagination > .active > a:hover,
            .pagination > .active > span:hover,
            .pagination > .active > a:focus,
            .pagination > .active > span:focus {
                z-index: 2;
                color: #fff;
                cursor: default;
                background-color: #428bca;
                border-color: #428bca;
            }
            .pagination > .disabled > span,
            .pagination > .disabled > span:hover,
            .pagination > .disabled > span:focus,
            .pagination > .disabled > a,
            .pagination > .disabled > a:hover,
            .pagination > .disabled > a:focus {
                color: #999;
                cursor: not-allowed;
                background-color: #fff;
                border-color: #ddd;
            }
            .pagination-lg > li > a,
            .pagination-lg > li > span {
                padding: 10px 16px;
                font-size: 18px;
            }
            .pagination-lg > li:first-child > a,
            .pagination-lg > li:first-child > span {
                border-top-left-radius: 6px;
                border-bottom-left-radius: 6px;
            }
            .pagination-lg > li:last-child > a,
            .pagination-lg > li:last-child > span {
                border-top-right-radius: 6px;
                border-bottom-right-radius: 6px;
            }
            .pagination-sm > li > a,
            .pagination-sm > li > span {
                padding: 5px 10px;
                font-size: 12px;
            }
            .pagination-sm > li:first-child > a,
            .pagination-sm > li:first-child > span {
                border-top-left-radius: 3px;
                border-bottom-left-radius: 3px;
            }
            .pagination-sm > li:last-child > a,
            .pagination-sm > li:last-child > span {
                border-top-right-radius: 3px;
                border-bottom-right-radius: 3px;
            }
        </style>

        <script src="<?php echo base_url(); ?>assets/material/assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/select2/js/select2.min.js"></script>

    </head>

    <body class="text-sm">

        <!-- Wrapper -->
        <div class="wrapper ">

            <!-- Sidebar -->
            <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url(); ?>assets/material/assets/img/sidebar-1.jpg">
                <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

                Tip 2: you can also add an image using data-image tag
                -->
                <div class="logo">
                    <a href="<?php echo site_url(); ?>" class="simple-text logo-normal"><?php echo SITE_NAME . ' ' . SITE_VERSION; ?></a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item <?php echo ($this->uri->segment(1) == '' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo site_url(); ?>">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <?php if ($this->ion_auth->logged_in()) { ?>
                        <!-- setup -->
                        <?php
                        $uri = array(
                            'auth',
                            '_36_warganegara',
                            '_37_hubungan',
                            '_38_status',
                            '_39_pekerjaan',
                            '_40_pendidikan',
                            '_41_agama',
                            '_42_provinsi',
                            '_43_kabupaten',
                            '_44_kecamatan',
                            '_45_desa',
                            );
                        ?>
                        <li class="nav-item dropdown <?php echo (in_array($this->uri->segment(1), $uri) ? 'active' : ''); ?>">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">settings</i>Setup</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo site_url('auth'); ?>">User Management</a>
                                <div class="dropdown-divider"></div>
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false">Region</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('_42_provinsi'); ?>">Provinsi</a>
                                    <a class="dropdown-item" href="<?php echo site_url('_43_kabupaten'); ?>">Kabupaten</a>
                                    <a class="dropdown-item" href="<?php echo site_url('_44_kecamatan'); ?>">Kecamatan</a>
                                    <a class="dropdown-item" href="<?php echo site_url('_45_desa'); ?>">Kelurahan</a>
                                </div>
                                <!-- <a class="dropdown-item" href="javascript:;">Separated link</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url('_41_agama'); ?>">Agama</a>
                                <a class="dropdown-item" href="<?php echo site_url('_40_pendidikan'); ?>">Pendidikan</a>
                                <a class="dropdown-item" href="<?php echo site_url('_39_pekerjaan'); ?>">Pekerjaan</a>
                                <a class="dropdown-item" href="<?php echo site_url('_38_status'); ?>">Status Kawin</a>
                                <a class="dropdown-item" href="<?php echo site_url('_37_hubungan'); ?>">Hubungan Keluarga</a>
                                <a class="dropdown-item" href="<?php echo site_url('_36_warganegara'); ?>">Kewarganegaraan</a>
                            </div>
                        </li>
                        <!-- user management -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo site_url(); ?>auth">
                                <i class="material-icons">people</i>
                                <p>User Management</p>
                            </a>
                        </li> -->
                        <!-- warga -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo site_url(); ?>_05_warga">
                                <i class="material-icons">escalator_warning</i>
                                <p>Warga</p>
                            </a>
                        </li> -->
                        <!-- penduduk -->
                        <li class="nav-item <?php echo ($this->uri->segment(1) == '_06_penduduk' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo site_url(); ?>_06_penduduk">
                                <i class="material-icons">escalator_warning</i>
                                <p>Penduduk</p>
                            </a>
                        </li>
                        <!-- user profile -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/user.html">
                                <i class="material-icons">person</i>
                                <p>User Profile</p>
                            </a>
                        </li> -->
                        <!-- table list -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/tables.html">
                                <i class="material-icons">content_paste</i>
                                <p>Table List</p>
                            </a>
                        </li> -->
                        <!-- typography -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/typography.html">
                                <i class="material-icons">library_books</i>
                                <p>Typography</p>
                            </a>
                        </li> -->
                        <!-- icons -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/icons.html">
                                <i class="material-icons">bubble_chart</i>
                                <p>Icons</p>
                            </a>
                        </li> -->
                        <!-- maps -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/map.html">
                                <i class="material-icons">location_ons</i>
                                <p>Maps</p>
                            </a>
                        </li> -->
                        <!-- notifications -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/notifications.html">
                                <i class="material-icons">notifications</i>
                                <p>Notifications</p>
                            </a>
                        </li> -->
                        <!-- rtl support -->
                        <!-- <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/rtl.html">
                                <i class="material-icons">language</i>
                                <p>RTL Support</p>
                            </a>
                        </li> -->
                        <?php } ?>

                        <?php if ($this->session->userdata('user_id') != "") { ?>
                        <!-- logout -->
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo site_url(); ?>auth/logout">
                                <i class="material-icons">assignment</i>
                                <p>Logout</p>
                            </a>
                        </li>
                        <?php } else { ?>
                            <!-- login -->
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo site_url(); ?>auth/login">
                                <i class="material-icons">assignment</i>
                                <p>Login</p>
                            </a>
                        </li>
                        <?php }?>
                        <!-- <li class="nav-item active-pro ">
                        <a class="nav-link" href="<?php echo base_url(); ?>assets/material/examples/upgrade.html">
                        <i class="material-icons">unarchive</i>
                        <p>Upgrade to PRO</p>
                        </a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!-- End Sidebar -->

            <!-- Main Panel -->
            <div class="main-panel">

                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand" href="javascript:;"><?php echo $_caption; ?></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <!-- <form class="navbar-form">
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </form> -->
                            <ul class="navbar-nav">
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="javascript:;">
                                        <i class="material-icons">dashboard</i>
                                        <p class="d-lg-none d-md-block">Stats</p>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">notifications</i>
                                        <span class="notification">5</span>
                                        <p class="d-lg-none d-md-block">Some Actions</p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                        <a class="dropdown-item" href="#">Another Notification</a>
                                        <a class="dropdown-item" href="#">Another One</a>
                                    </div>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">person</i>
                                        <p class="d-lg-none d-md-block">Account</p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                        <?php if ($this->session->userdata('user_id') != "") { ?>
                                        <!-- <a class="dropdown-item" href="#">Profile</a> -->
                                        <a class="dropdown-item" href="<?php echo site_url(); ?>auth/change_password">Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url(); ?>auth/logout">Logout</a>
                                        <?php } else { ?>
                                        <a class="dropdown-item" href="<?php echo site_url(); ?>auth/login">Login</a>
                                        <?php }?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->

                <!-- Content -->
                <div class="content">
                    <div class="container-fluid">

                        <?php $this->load->view($_view); ?>

                    </div>
                </div>
                <!-- End Content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li>
                                    <a href="https://www.creative-tim.com">Creative Tim</a>
                                </li>
                                <li>
                                    <a href="https://creative-tim.com/presentation">About Us</a>
                                </li>
                                <li>
                                    <a href="http://blog.creative-tim.com">Blog</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/license">Licenses</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright float-right">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, made with <i class="material-icons">favorite</i> by
                            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                        </div>
                    </div>
                </footer>
            </div>
            <!-- End Main Panel -->

        </div>
        <!-- End Wrapper -->

        <!-- <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title"> Sidebar Filters</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger active-color">
                            <div class="badge-colors ml-auto mr-auto">
                                <span class="badge filter badge-purple" data-color="purple"></span>
                                <span class="badge filter badge-azure" data-color="azure"></span>
                                <span class="badge filter badge-green" data-color="green"></span>
                                <span class="badge filter badge-warning" data-color="orange"></span>
                                <span class="badge filter badge-danger" data-color="danger"></span>
                                <span class="badge filter badge-rose active" data-color="rose"></span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="header-title">Images</li>
                    <li class="active">
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="<?php echo base_url(); ?>assets/material/assets/img/sidebar-1.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="<?php echo base_url(); ?>assets/material/assets/img/sidebar-2.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="<?php echo base_url(); ?>assets/material/assets/img/sidebar-3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="<?php echo base_url(); ?>assets/material/assets/img/sidebar-4.jpg" alt="">
                        </a>
                    </li>
                    <li class="button-container">
                        <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
                    </li> -->
                    <!-- <li class="header-title">Want more components?</li>
                    <li class="button-container">
                    <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                    Get the pro version
                    </a>
                    </li> -->
                    <!-- <li class="button-container">
                        <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">View Documentation</a>
                    </li>
                    <li class="button-container github-star">
                        <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                    </li>
                    <li class="header-title">Thank you for 95 shares!</li>
                    <li class="button-container text-center">
                        <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                        <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                        <br>
                        <br>
                    </li>
                </ul>
            </div>
        </div> -->

        <!--   Core JS Files   -->
        <!-- <script src="<?php echo base_url(); ?>assets/material/assets/js/core/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/core/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/material/assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/bootstrap-selectpicker.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/bootstrap-select.min.js"></script> -->
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
        <!-- Chartist JS -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?php echo base_url(); ?>assets/material/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <!-- <script src="<?php echo base_url(); ?>assets/material/assets/demo/demo.js"></script> -->

        <script>
            $(document).ready(function() {
                $().ready(function() {

                    $sidebar = $('.sidebar');

                    $sidebar_img_container = $sidebar.find('.sidebar-background');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                            $('.fixed-plugin .dropdown').addClass('open');
                        }
                    }

                    $('.fixed-plugin a').click(function(event) {
                        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .active-color span').click(function() {
                        $full_page_background = $('.full-page-background');

                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-color', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data-color', new_color);
                        }
                    });

                    $('.fixed-plugin .background-color .badge').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('background-color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-background-color', new_color);
                        }
                    });

                    $('.fixed-plugin .img-holder').click(function() {
                        $full_page_background = $('.full-page-background');

                        $(this).parent('li').siblings().removeClass('active');
                        $(this).parent('li').addClass('active');


                        var new_image = $(this).find("img").attr('src');

                        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            $sidebar_img_container.fadeOut('fast', function() {
                                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                $sidebar_img_container.fadeIn('fast');
                            });
                        }

                        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $full_page_background.fadeOut('fast', function() {
                                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                                $full_page_background.fadeIn('fast');
                            });
                        }

                        if ($('.switch-sidebar-image input:checked').length == 0) {
                            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                        }
                    });

                    $('.switch-sidebar-image input').change(function() {
                        $full_page_background = $('.full-page-background');

                        $input = $(this);

                        if ($input.is(':checked')) {
                            if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                            }

                            if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                            }

                            background_image = true;
                        } else {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar.removeAttr('data-image');
                                $sidebar_img_container.fadeOut('fast');
                            }

                            if ($full_page_background.length != 0) {
                                $full_page.removeAttr('data-image', '#');
                                $full_page_background.fadeOut('fast');
                            }

                            background_image = false;
                        }
                    });

                    $('.switch-sidebar-mini input').change(function() {
                        $body = $('body');

                        $input = $(this);

                        if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                        } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function() {
                                $('body').addClass('sidebar-mini');

                                md.misc.sidebar_mini_active = true;
                            }, 300);
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);

                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Javascript method's body can be found in assets/js/demos.js
                md.initDashboardPageCharts();

            });
        </script>
        <script>
            $(function () {
                $('.btn').addClass('btn-sm')
                $('.table').addClass('table-sm')
                $('.form-control').addClass('form-control-sm')
            })
        </script>

    </body>
</html>
