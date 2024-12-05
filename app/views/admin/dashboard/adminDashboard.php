<!DOCTYPE html>
<html lang="en">
<?php require PATH_VIEW . 'components/head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php require PATH_VIEW . 'components/navbar.php'; ?>
        <?php require PATH_VIEW . 'components/adminSidebar.php'; ?>

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
                            <a href="<?php echo ROOT; ?>pendingAccount" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Student Pending Account</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <a href="<?php echo ROOT; ?>approvedAccount" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Student Approved Account</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">
                            <a href="<?php echo ROOT; ?>cancelledAccount" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Student Cancelled Account</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-12 col-12">
                            <a href="<?php echo ROOT; ?>teacherManagement" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Teacher</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <a href="<?php echo ROOT; ?>programManagement" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Program</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-clipboard-list"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <a href="<?php echo ROOT; ?>subjectManagement" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Subject</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-clipboard-list"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">
                            <a href="<?php echo ROOT; ?>categoryManagement" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Category</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-clipboard-list"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <a href="<?php echo ROOT; ?>faceToFaceQuestion" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Face to Face Question</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <a href="<?php echo ROOT; ?>onlineQuestion" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Online Question</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-12 col-12">
                            <a href="<?php echo ROOT; ?>evaluationResult" class="w-100 h-100">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Evaluation Result</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-chart-line"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
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