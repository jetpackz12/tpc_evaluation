<!DOCTYPE html>
<html lang="en">
<?php require PATH_VIEW . 'components/head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php require PATH_VIEW . 'components/navbar.php'; ?>
        <?php require PATH_VIEW . 'components/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success d-flex justify-content-center align-items-center d-sm-block" style="height: 200px;">
                                <div class="d-flex d-sm-none justify-content-center align-items-center w-100 h-100">
                                    <a href="<?php echo ROOT; ?>studentEvaluation" class="d-flex justify-content-center align-items-center flex-column w-100 h-100 text-white">
                                        <h5 class="d-block d-sm-none text-center text-lg">Evaluation</h5>
                                        <i class="fa fa-chalkboard mx-2 d-block d-sm-none" style="font-size: 20px;"></i>
                                    </a>
                                </div>
                                <div class="inner h-50 d-none d-sm-flex justify-content-center align-items-center flex-column">
                                    <h3 class="d-none d-sm-block">Evaluation</h3>
                                </div>
                                <div class="icon d-none d-md-block">
                                    <i class="fa fa-chalkboard mx-2"></i>
                                </div>
                                <a href="<?php echo ROOT; ?>studentEvaluation" class="small-box-footer d-none d-sm-flex justify-content-center align-items-center h-50 text-xl">More info <i class="fas fa-arrow-circle-right ml-2"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success d-flex justify-content-center align-items-center d-sm-block" style="height: 200px;">
                                <div class="d-flex d-sm-none justify-content-center align-items-center w-100 h-100">
                                    <a href="<?php echo ROOT; ?>studentHistory" class="d-flex justify-content-center align-items-center flex-column w-100 h-100 text-white">
                                        <h5 class="d-block d-sm-none text-center text-lg">History</h5>
                                        <i class="fa fa-address-book mx-2 d-block d-sm-none" style="font-size: 25px;"></i>
                                    </a>
                                </div>
                                <div class="inner h-50 d-none d-sm-flex justify-content-center align-items-center flex-column">
                                    <h3 class="d-none d-sm-block">History</h3>
                                </div>
                                <div class="icon d-none d-md-block">
                                    <i class="fa fa-address-book mx-2"></i>
                                </div>
                                <a href="<?php echo ROOT; ?>studentHistory" class="small-box-footer d-none d-sm-flex justify-content-center align-items-center h-50 text-xl">More info <i class="fas fa-arrow-circle-right ml-2"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-success d-flex justify-content-center align-items-center d-sm-block" style="height: 200px;">
                                <div class="d-flex d-sm-none justify-content-center align-items-center w-100 h-100">
                                    <a href="<?php echo ROOT; ?>studentProfile" class="d-flex justify-content-center align-items-center flex-column w-100 h-100 text-white">
                                        <h5 class="d-block d-sm-none text-center text-lg">Profile</h5>
                                        <i class="fa fa-user mx-2 d-block d-sm-none" style="font-size: 25px;"></i>
                                    </a>
                                </div>
                                <div class="inner h-50 d-none d-sm-flex justify-content-center align-items-center flex-column">
                                    <h3 class="d-none d-sm-block">Profile</h3>
                                </div>
                                <div class="icon d-none d-md-block">
                                    <i class="fa fa-user mx-2"></i>
                                </div>
                                <a href="<?php echo ROOT; ?>studentProfile" class="small-box-footer d-none d-sm-flex justify-content-center align-items-center h-50 text-xl">More info <i class="fas fa-arrow-circle-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <?php require PATH_VIEW . 'components/scripts.php'; ?>
    <script>
        $("#dashboard").addClass("active");
    </script>
</body>

</html>