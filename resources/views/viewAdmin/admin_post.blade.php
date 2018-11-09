
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IT-Jobs Admin  | Post manager</title>
    @include("viewAdmin.elements.stylesheet")

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/test/public/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S-cart</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="{{ asset('images/img/scart-min.png')}}"></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <style>
                .search-form {
                    width: 250px;
                    margin: 10px 0 0 20px;
                    border-radius: 3px;
                    float: left;
                }
                .search-form input[type="text"] {
                    color: #666;
                    border: 0;
                }
                .search-form .btn {
                    color: #999;
                    background-color: #fff;
                    border: 0;
                }
            </style>

            <form action="{!! url('/api/admin_post/') !!}" method="get" class="search-form" pjax-container>
                <div class="input-group input-group-sm ">
                    <input type="text" name="keyword" class="form-control" placeholder="Search order id, email, phone or name">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>


            <!-- Navbar Right Menu -->
            @include("viewAdmin.elements.NavbarRightMenu")
        </nav>
    </header>    
    @include("viewAdmin.elements.menu")
    <div class="content-wrapper" id="pjax-container">
        <section class="content-header">
            <h1>
                Post manager
                <small> </small>
            </h1>

            <!-- breadcrumb start -->

            <!-- breadcrumb end -->

        </section>

        <section class="content">


            <div class="row"><div class="col-md-12"><div class="box">

                <div class="box-header with-border">
                    <div class="pull-right">

                        

                        <div class="btn-group pull-right" style="margin-right: 10px">
                            <a href="{!! url('/api/admin_post/add') !!}" class="btn btn-sm btn-success" title="New">
                                <i class="fa fa-save"></i><span class="hidden-xs">&nbsp;&nbsp;New</span>
                            </a>
                        </div>

                    </div>
                    <span>
                        

                         
                        <a class="btn btn-sm btn-primary grid-refresh" title="Refresh"><i class="fa fa-refresh"></i><span class="hidden-xs"> Refresh</span></a> <div class="btn-group" style="margin-right: 10px" data-toggle="buttons">
                            <label class="btn btn-sm btn-dropbox 5bcf397a10de5-filter-btn " title="Filter">
                                <input type="checkbox"><i class="fa fa-filter"></i><span class="hidden-xs">&nbsp;&nbsp;Filter</span>
                            </label>

                        </div>
                    </span>
                </div>

                <div class="box-header with-border hide" id="filter-box">
                    <form action="{!! url('/api/admin_post/') !!}" class="form-horizontal" pjax-container method="get">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="fields-group">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> ID</label>
                                            <div class="col-sm-8">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-pencil"></i>
                                                    </div>

                                                    <input type="text" class="form-control id" placeholder="ID" name="id" value="">
                                                </div>    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="btn-group pull-left">
                                                <button class="btn btn-info submit btn-sm"><i
                                                    class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
                                                </div>
                                                <div class="btn-group pull-left " style="margin-left: 10px;">
                                                    <a href="{!! url('/api/admin_post/') !!}" class="btn btn-default btn-sm"><i
                                                        class="fa fa-undo"></i>&nbsp;&nbsp;Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>ID<a class="fa fa-fw fa-sort" href="{!! url('/api/admin_post') !!}?_sort%5Bcolumn%5D=id&_sort%5Btype%5D=desc"></a></th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Requirement</th>
                                            <th>Salary</th>
                                            <th>Amount of people</th>
                                            <th>Start day</th>
                                            <th>End day</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($Post as $posts)
                                        <tr >
                                            
                                            <td >
                                                {{ $posts-> id }}
                                            </td>
                                            <td >
                                                {{ $posts-> Title }}
                                            </td>
                                            <td >
                                                {{ $posts-> Description }}
                                            </td>
                                            <td >
                                                {{ $posts-> requirement }}
                                            </td>
                                            <td >
                                                {{ $posts-> Salary }}
                                            </td>
                                            <td >
                                                {{ $posts-> Amount_of_people }}
                                            </td>
                                            <td >
                                                {{ $posts-> Start_day }}
                                            </td>
                                            <td >
                                                {{ $posts-> End_day }}
                                            </td>
                                            <td >
                                                <a title="Show Customer detail" href="{!! url('/api/admin_post/edit',$posts['id']) !!}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{!! url('/api/admin_post/deletePost',$posts['id']) !!}"  >
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>



                            <div class="box-footer clearfix">
                                Showing <b>1</b> to <b>20</b> of <b>40</b> entries<ul class="pagination pagination-sm no-margin pull-right">
                                    <!-- Previous Page Link -->
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>

                                    <!-- Pagination viewAdmin.elements -->
                                    <!-- "Three Dots" Separator -->

                                    <!-- Array Of Links -->
                                    <li class="page-item active"><span class="page-link">1</span></li>
                                    <li class="page-item"><a class="page-link" href="{!! url('/api/admin_post/') !!}?page=2">2</a></li>

                                    <!-- Next Page Link -->
                                    <li class="page-item"><a class="page-link" href="{!! url('/api/admin_post/') !!}?page=2" rel="next">&raquo;</a></li>
                                </ul>

                                <label class="control-label pull-right" style="margin-right: 10px; font-weight: 100;">

                                    <small>Show</small>&nbsp;
                                    <select class="input-sm grid-per-pager" name="per-page">
                                        <option value="{!! url('/api/admin_post/') !!}?per_page=10" >10</option>
                                        <option value="{!! url('/api/admin_post/') !!}?per_page=20" selected>20</option>
                                        <option value="{!! url('/api/admin_post/') !!}?per_page=30" >30</option>
                                        <option value="{!! url('/api/admin_post/') !!}?per_page=50" >50</option>
                                        <option value="{!! url('/api/admin_post/') !!}?per_page=100" >100</option>
                                    </select>
                                    &nbsp;<small>entries</small>
                                </label>

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div></div>

                </section>
                <script data-exec-on-popstate>

                    $(function () {
                        
                        $('.grid-refresh').on('click', function() {
                            $.pjax.reload('#pjax-container');
                            toastr.success('Refresh succeeded !');
                        });

                        $('.5bcf397a10de5-filter-btn').click(function (e) {
                            if ($('#filter-box').is(':visible')) {
                                $('#filter-box').addClass('hide');
                            } else {
                                $('#filter-box').removeClass('hide');
                            }
                        });

                        $('.grid-per-pager').on("change", function(e) {
                            $.pjax({url: this.value, container: '#pjax-container'});
                        });

                    });
                </script>
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <strong>Version</strong>&nbsp;&nbsp; 2.0.4

                </div>
                <!-- Default to the left -->
                <strong><a href="https://s-cart.org">S-Cart</a></strong> Free Open Source eCommerce for Business
            </footer>

        </div>

        <script>
            function LA() {}
            LA.token = "2OSjS2rhXhGRhQYksSMBeGgbMZR5CO29pgYG2RLa";
        </script>

        @include("viewAdmin.elements.script")


    </body>
    </html>
