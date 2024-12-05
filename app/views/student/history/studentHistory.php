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
                            <h1 class="m-0">History</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentDashboard">Dashboard</a></li>
                                <li class="breadcrumb-item text-md"><a class="nav-text" href="<?php echo ROOT; ?>studentEvaluation">Evaluation</a></li>
                                <li class="breadcrumb-item text-md"><a href="<?php echo ROOT; ?>studentHistory">History</a></li>
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
                                        <i class="fa fa-address-book" style="font-size: 28px;"></i>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="<?php echo ROOT; ?>studentHistory/edit" method="POST" id="filter">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Choose the Instructor Being Evaluated</label>
                                                    <select class="form-control" name="teacher_id" id="sel-teacher" required>
                                                        <option value="" disabled selected>---Select Instructor---</option>
                                                        <?php foreach ($data as $teachers) { ?>
                                                            <option value="<?php echo $teachers['id']; ?>"><?php echo $teachers['teacherLastname'] . ", " . $teachers['teacherFirstname'] . " " . $teachers['teacherMiddlename']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputAcademicyear">Academic Year</label>
                                                    <input type="text" class="form-control" id="exampleInputAcademicyear" name="academic_year" id="academic_year" data-inputmask='"mask": "9999-9999"' data-mask placeholder="YYYY-YYYY" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Semester</label>
                                                    <select class="form-control" name="semester" id="sel-semester" required>
                                                        <option value="" disabled selected>---Select Semester----</option>
                                                        <option value="1">First Semester</option>
                                                        <option value="2">Second Semester</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer d-flex justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-primary mr-2 filter" style="width: 200px;">
                                            <i class="fa fa-filter mr-1" style="font-size: 20px;"></i>
                                            Filter
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Main box -->
                    <div class="row d-none" id="display-history">
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <b>Face to Face Instruction</b>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php foreach ($data2 as $category) { ?>
                                                <table id="table" class="table table-bordered">
                                                    <thead>
                                                        <tr class="bg-success">
                                                            <th>
                                                                <?php echo $category['categoryName']; ?>
                                                            </th>
                                                            <th class="text-center">
                                                                Rating
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($data3 as $faceToFaceQuestion) {
                                                            if ($category['categoryName'] == $faceToFaceQuestion['categoryName']) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $faceToFaceQuestion['question']; ?></td>
                                                                    <td class="w-25">
                                                                        <input type="text" class="form-control text-center face" id="face<?php echo $faceToFaceQuestion['id']; ?>" disabled>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <b>Online Instruction</b>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php foreach ($data2 as $category) { ?>
                                                <table id="table" class="table table-bordered">
                                                    <thead>
                                                        <tr class="bg-success">
                                                            <th>
                                                                <?php echo $category['categoryName']; ?>
                                                            </th>
                                                            <th class="text-center">
                                                                Rating
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($data4 as $onlineQuestion) {
                                                            if ($category['categoryName'] == $onlineQuestion['categoryName']) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $onlineQuestion['question']; ?></td>
                                                                    <td class="w-25">
                                                                        <input type="text" class="form-control text-center online" id="online<?php echo $onlineQuestion['id']; ?>" disabled>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <b>Knowledge of the Subject Matter</b>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php $counter = 1;
                                    foreach ($data5 as $result) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Question <?php echo $counter++; ?>: <?php echo $result['question']; ?></label>
                                                    <div class="rounded p-3" style="background-color: #E9ECEF;">
                                                        <span class="matter" id="matter<?php echo $result['id']; ?>"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /.card-body -->
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
        $("#history").addClass("active");
        //Input Mask
        $('[data-mask]').inputmask()

        // Datable
        $('.table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        });

        $(document).ready(function() {

            $('#sel-teacher').change(function() {
                $('.face').val('No evaluation');
                $('.online').val('No evaluation');
                $('.matter').text('No evaluation');
                $('#display-history').removeClass("d-block");
                $('#display-history').addClass("d-none");
            });

            $('#filter').on('submit', function(e) {
                e.preventDefault();

                $('#display-history').removeClass("d-none");
                $('#display-history').addClass("d-block");

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {

                        const jsonData = JSON.parse(data);

                        console.log(jsonData);

                        for (let i = 0; i < jsonData.length; i++) {
                            const element = jsonData[i];
                            if (element.modality_id == 1 && element.rate != '') {
                                $(`#face${element.question_id}`).val(element.rate);
                            } else if (element.modality_id == 2 && element.rate != '') {
                                $(`#online${element.question_id}`).val(element.rate);
                            } else {
                                $(`#matter${element.subject_matter_question_id}`).text(element.response);

                            }
                        }

                    }
                });
            });
        });
    </script>
</body>

</html>