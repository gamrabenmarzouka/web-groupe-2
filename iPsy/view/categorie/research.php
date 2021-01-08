<?php
session_start();
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../../assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../../assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../assets/css/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo"><b>E-PSY</b></a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../../assets/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                                <span class="hidden-xs"><?= $user['name'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../../assets/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                    <p>
                                        <?= $user['name'] ?> - <?= $user['type'] ?>
                                        <small>Member since <?= $user['created_at'] ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="../gestion profil.php" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../assets/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p><?= $user['name'] ?></p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..." />
                        <span class="input-group-btn">
                            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="C:\Users\Sarra\Desktop\templete\sarra\back\views\demande de consultation.php
"><i class="fa fa-circle-o"></i> Gestion des consultations </a></li>

                            <li><a href="../article/research.php">Liste des articles</a></li>
                            <li><a href="research.php">Liste des catégories</a></li>
                        </ul>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Version 1.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <?php
                include '../../config.php';
                include '../../model/categories.php';
                include '../../model/entities/article.php';
                include '../../model/article_category.php';
                include '../../model/article.php';
                $conn = new Config();
                $conn = $conn->getConnexion();

                $searching = isset($_POST['recherche']);
                $search_word = ($searching) ? $_POST['recherche'] : "";

                ?>

                <h1>Listes des Catégories</h1>

                <div class="my-4">
                    <div>
                        <form method="POST" class="form-inline" action="research.php">
                            <div>
                                <input type="hidden" name="module" value="categorie">
                                <input type="hidden" name="op" value="research">
                                <input type="search" name="recherche" id="recherche" class="form-control" placeholder="Recherche" value="<?= $search_word ?>">
                            </div>
                            <div>
                                <input type="submit" value="Chercher" class="btn btn-primary ml-2">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="my-4">
                    <a class="btn btn-success" href="create.php">Nouvelle Catégorie</a>
                </div>

                <?php
                if ($search_word != "") {
                    $categories = CrudCatgeories::searchByName($conn, $search_word);
                    echo "<p>Résultat du recherche par &quot;$search_word&quot;</p>";
                } else {
                    echo "<p>Toutes les catégories disponibles.</p>";
                    $categories = CrudCatgeories::fetchAll($conn);
                }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($categories) == 0) :
                        ?>
                            <td colspan="2">Aucun résultat trouvé</td>
                            <?php
                        else :
                            foreach ($categories as $row) :
                            ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td>
                                        <?php if ($user['type'] == 'psy') : ?>
                                            <a href="update.php?categorie_id=<?= $row["id"] ?>"><img src="../../assets/img/edit-button.png" alt="Mise à jour"></a>
                                            <a href="delete.php?categorie_id=<?= $row["id"] ?>"><img src="../../assets/img/trash-button.png" alt="Suppression"></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2020-2021 <a href="http://almsaeedstudio.com">Gamra And Cie</a>.</strong> All rights reserved.
        </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../../assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- daterangepicker -->
    <script src="../../assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../../assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
</body>

</html>