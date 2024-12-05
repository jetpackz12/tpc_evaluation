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
                            <h1 class="m-0">Evaluation</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentDashboard">Dashboard</a></li>
                                <li class="breadcrumb-item text-md"><a href="<?php echo ROOT; ?>studentEvaluation">Evaluation</a></li>
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentHistory">History</a></li>
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentProfile">Profile</a></li>
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
                                        <i class="fa fa-chalkboard" style="font-size: 28px;"></i>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="<?php echo ROOT; ?>studentEvaluation/store" method="POST" class="postForm">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <div class="form-group">
                                                    <label>Program</label>
                                                    <select class="form-control" id="sel-program" name="program" required>
                                                        <option value="" selected disabled>---Select Program---</option>
                                                        <?php foreach ($data as $result) { ?>
                                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['program_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group">
                                                    <label>Choose the Instructor Being Evaluated</label>
                                                    <select class="form-control" id="sel-instructor" name="instructor" disabled required>
                                                        <option value="" selected disabled>---Select Instructor---</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group">
                                                    <label>Semester</label>
                                                    <select class="form-control" id="sel-semester" name="semester" disabled required>
                                                        <option value="" selected disabled>---Select Semester----</option>
                                                        <?php foreach ($data2 as $result) { ?>
                                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group">
                                                    <label>Select a Subject for this Instructor</label>
                                                    <select class="select2bs4" id="sel-sub" name="subjects[]" multiple="multiple" data-placeholder="--Select Subject--"
                                                        style="width: 100%;" disabled required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputAcademicyear">Academic Year</label>
                                                    <input type="text" class="form-control" id="exampleInputAcademicyear" name="academic_year" data-inputmask='"mask": "9999-9999"' data-mask placeholder="YYYY-YYYY" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer d-flex justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-primary mr-2 edit" style="width: 200px;" id="edit">
                                            <i class="fa fa-dragon mr-1" style="font-size: 20px;"></i>
                                            Start
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
        $("#evaluation").addClass("active");
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        //Input Mask
        $('[data-mask]').inputmask()

        $('#sel-program').change(function() {
            if ($('#sel-program').val() !== '') {
                $('#sel-instructor').removeAttr('disabled');
                $('#sel-instructor').empty();
                $('#sel-semester').removeAttr('disabled');
                $('#sel-semester').val(null).trigger('change');
                $('#sel-sub').empty();

                const path = '<?php echo ROOT; ?>studentEvaluation/getInstructors';
                const id = $('#sel-program').val();

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: path,
                    data: {
                        id: id
                    },
                    success: function(data) {

                        const json = JSON.parse(data);

                        $('#sel-instructor').append('<option value="" selected disabled>---Select Instructor---</option>');

                        json.forEach(teacher => {
                            const fullName = `${teacher.teacherFirstname} ${teacher.teacherMiddlename}. ${teacher.teacherLastname}`;
                            $('#sel-instructor').append(`<option value="${teacher.id}">${fullName}</option>`);
                        });

                    }
                });

            } else {
                $('#sel-instructor').empty();
                $('#sel-instructor').val(null).trigger('change');
                $('#sel-instructor').attr('disabled', 'disabled');
            }
        });

        $('#sel-semester').change(function() {
            if ($('#sel-semester').val() !== '') {
                $('#sel-sub').removeAttr('disabled');
                $('#sel-sub').empty();

                const path = '<?php echo ROOT; ?>studentEvaluation/getSubjects';
                const id = $('#sel-semester').val();
                const program = $('#sel-program').val();

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: path,
                    data: {
                        id: id,
                        program: program
                    },
                    success: function(data) {

                        const json = JSON.parse(data);

                        json.forEach(subjects => {
                            const subject = `( ${subjects.subjectCode} ) - ${subjects.subjectName}`;
                            $('#sel-sub').append(`<option value="${subjects.id}">${subject}</option>`);
                        });

                    }
                });
            } else {
                $('#sel-sub').empty();
                $('#sel-sub').val(null).trigger('change');
                $('#sel-sub').attr('disabled', 'disabled');
            }
        });

    </script>
</body>

</html>