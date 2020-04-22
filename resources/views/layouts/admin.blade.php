<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('styles')
</head>
<body>


<div class="wrapper d-flex align-items-stretch">




    <nav id="sidebar" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">




        <!-- /.navbar-header -->
        <div class="p-4 pt-5">

            <ul class="list-unstyled components mb-5">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>

                                    </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li class="active">
                    <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i> Users<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="userSubmenu">
                        <li>
                            <a href="{{route('admin.user.index')}}">All Users</a>
                        </li>
                        <li>
                            <a href="{{route('admin.user.create')}}">Create User</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="active">
                    <a href="#postSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="postSubmenu">
                        <li>
                            <a href="{{route('admin.post.index')}}">All Posts</a>
                        </li>
                        <li>
                            <a href="{{route('admin.post.create')}}">Create Posts</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="active">
                    <a href="#categoriesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i> Categories<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="categoriesSubmenu">
                        <li>
                            <a href="{{route('admin.categories.index')}}">All Categories</a>
                        </li>
                        <li>
                            <a href="{{route('admin.categories.index')}}">Create Category</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="active">
                    <a href="#mediaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i> Media<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="mediaSubmenu">
                        <li>
                            <a href="{{route('admin.media.index')}}">All Media</a>
                        </li>
                        <li>
                            <a href="{{route('admin.media.create')}}">Upload Media</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="active">
                    <a href="#chartSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="chartSubmenu">
                        <li>
                            <a href="flot.html">Float Charts</a>
                        </li>
                        <li>
                            <a href="morris.html">Morris.js Charts</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                </li>
                <li>
                    <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                </li>

                <li class="active">
                    <a href="#uiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="uiSubmenu">
                        <li>
                            <a href="panels-wells.html">Panels and Wells</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="notifications.html">Notifications</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="icons.html"> Icons</a>
                        </li>
                        <li>
                            <a href="grid.html">Grid</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>


                <li class="active">
                    <a href="#MLSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="MLSubmenu">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#TLSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Third Level<span class="fa arrow"></span></a>
                            <ul class="collapse list-unstyled" id="TLSubmenu">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                    <!-- /.nav-second-level -->
                </li>




                <li class="active">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-files-o fa-fw"></i>  Sample Pages<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a class="active" href="blank.html">Blank Page</a>
                        </li>
                        <li>
                            <a href="login.html">Login Page</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <!-- Page Content -->

            </ul>
        </div>


    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                        <div class="container-fluid" style="padding-top: 30px">

                            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                                <i class="fa fa-bars"></i>
                                <span class="sr-only">Toggle Menu</span>
                            </button>
                            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars"></i>
                            </button>


                         </div>
                    <h1 class="page-header"></h1>


                    @yield('content')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>


<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/popper.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

@yield('scripts')
</body>
</html>