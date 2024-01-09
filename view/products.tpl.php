<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <base href="/cabinet/products">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageData['title']; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="/css/admin/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/admin/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="/css/admin/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Кабинет</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Профиль</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/cabinet/logout"><i class="fa fa-sign-out fa-fw"></i> Выйти</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/cabinet"><i class="fa fa-area-chart"></i> Статистика</a>
                        </li>
                        <li>
                            <a href="/cabinet/products"><i class="fa fa-cart-plus"></i> Товары</a>
                        </li>
                        <li>
                            <a href="/cabinet/users"><i class="fa fa-user-o"></i> Пользователи</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper" data-ng-app="products" data-ng-controller="ProductsController">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Товары</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" data-ng-view></div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Товары
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID товара</th>
                                                    <th>Наимнование товара</th>
                                                    <th>Цена</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($pageData['products'] as $key => $value) { ?>
                                                    <tr>
                                                        <td><?php echo $value['id_product']; ?></td>
                                                        <td><a data-ng-click="getInfoByProductId(<?php echo $value['id_product']; ?>)" href="/cabinet/products<?php echo $value['id_product']; ?>"><?php echo $value['name_pr']; ?></a></td>
                                                        <td><?php echo $value['price']; ?></td>
                                                    </tr>        
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <h2>Загрузить CSV файл с товарами</h2>
                    <form method="post" action= "/cabinet/products" class ="form-horizontal" enctype="multipart/form-data">
                        <label for="file">Загрузите CSV файл</label>
                        <input id="file" type="file" name="csv">
                        <button class="btn btn-default">Загрузить</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
	<!-- Angular framework -->
    <script src="/js/angular.min.js"></script>  
    <script src="/js/angular-route.js"></script>  
    <script src="/js/admin/products.js"></script>  
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/js/admin/metisMenu.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/js/admin/sb-admin-2.js"></script>
</body>
</html>