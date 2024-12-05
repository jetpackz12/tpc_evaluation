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
                            <h1 class="m-0">Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentDashboard">Dashboard</a></li>
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentEvaluation">Evaluation</a></li>
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentHistory">History</a></li>
                                <li class="breadcrumb-item text-md"><a href="<?php echo ROOT; ?>studentProfile">Profile</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main box -->
                    <div class="row">
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="nav-icon far fa-user mr-2" style="font-size: 28px;"></i>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="<?php echo ROOT; ?>studentProfile/update" method="POST" class="postForm">
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="text" class="form-control" id="e_id" name="id" hidden>
                                            <input type="text" class="form-control" id="e_old_password" name="old_password" hidden>
                                            <input type="text" class="form-control" id="e_old_student_identification" name="old_student_identification" hidden>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="e_lastname">Lastname</label>
                                                    <input type="text" class="form-control input-info" id="e_lastname" name="lastname" placeholder="Enter Lastname" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="e_firstname">Firstname</label>
                                                    <input type="text" class="form-control input-info" id="e_firstname" name="firstname" placeholder="Enter Firstname" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="e_middlename">Middlename</label>
                                                    <input type="text" class="form-control input-info" id="e_middlename" name="middlename" placeholder="Enter Middlename" disabled required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="e_program_name">Program Name</label>
                                                    <select class="form-control input-info" id="e_program_name" name="program" disabled required>
                                                        <?php foreach ($data as $result) { ?>
                                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['program_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="e_year_level">Year Level</label>
                                                    <select class="form-control input-info" id="e_year_level" name="year_level" disabled required>
                                                        <?php foreach ($data2 as $result) { ?>
                                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="e_status">Status</label>
                                                    <select class="form-control input-info" id="e_status" name="status" disabled required>
                                                        <?php foreach ($data3 as $result) { ?>
                                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="e_student_identification">Student Identification</label>
                                                    <input type="number" class="form-control input-info" id="e_student_identification" name="student_identification" placeholder="Enter Student Identification" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="e_password">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="e_password" name="password" placeholder="Enter Password" disabled required>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-warning btn-edit-password" disabled>
                                                                <i class="fa fa-edit" style="font-size: 20px;"></i>
                                                                <i class="fa fa-times-circle" style="font-size: 20px;" hidden></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-primary mr-2 edit d-none" style="width: 200px;" id="cancel">
                                            <i class="fa fa-ban mr-1" style="font-size: 20px;"></i>
                                            Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary mr-2 edit" style="width: 200px;" id="edit">
                                            <i class="fa fa-user-edit mr-1" style="font-size: 20px;"></i>
                                            Edit
                                        </button>
                                        <button type="submit" class="btn btn-warning d-none" style="width: 200px;" id="update">
                                            <i class="fa fa-paper-plane mr-1" style="font-size: 20px;"></i>
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
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

        let password = '';

        $("#profile").addClass("active");
        $(".edit").click(function() {
            if ($(".input-info").attr("disabled")) {
                $(".input-info").removeAttr("disabled");
                $("#edit").addClass("d-none");
                $("#cancel").removeClass("d-none");
                $("#update").removeClass("d-none");
                $('.btn-edit-password').removeAttr("disabled");
            } else {
                $(".input-info").attr("disabled", "disabled");
                $("#edit").removeClass("d-none");
                $("#cancel").addClass("d-none");
                $("#update").addClass("d-none");
                $('.btn-edit-password').attr("disabled", "disabled");
                $("#e_password").val(password);
                $("#e_password").attr("disabled", "disabled");
                $(".btn-edit-password .fa-edit").removeAttr("hidden");
                $(".btn-edit-password .fa-times-circle").attr("hidden", "hidden");
            }
        });
        $(".btn-edit-password").click(function() {
            if ($("#e_password").attr("disabled")) {
                $("#e_password").removeAttr("disabled");
                $("#e_password").val("");
                $(".btn-edit-password .fa-edit").attr("hidden", "hidden");
                $(".btn-edit-password .fa-times-circle").removeAttr("hidden");
            } else {
                $("#e_password").val(password);
                $("#e_password").attr("disabled", "disabled");
                $(".btn-edit-password .fa-edit").removeAttr("hidden");
                $(".btn-edit-password .fa-times-circle").attr("hidden", "hidden");
            }
        });


        $(document).ready(function() {
            const path = '<?php echo ROOT; ?>studentProfile/edit';
            const id = "<?php echo $_SESSION['id']; ?>";

            $.ajax({
                type: "POST",
                cache: false,
                url: path,
                data: {
                    id: id
                },
                success: function(data) {

                    const json = JSON.parse(data);
                    $('#e_id').val(json['id']);
                    $('#e_old_password').val(json['password']);
                    $('#e_old_student_identification').val(json['studentId']);
                    $('#e_lastname').val(json['lastname']);
                    $('#e_firstname').val(json['firstname']);
                    $('#e_middlename').val(json['middlename']);
                    $('#e_program_name').val(json['program_id']);
                    $('#e_year_level').val(json['year_level_id']);
                    $('#e_status').val(json['student_status_id']);
                    $('#e_student_identification').val(json['studentId']);
                    $('#e_password').val(json['password']);
                    password = json['password'];

                }
            });
        });
    </script>
</body>

</html>