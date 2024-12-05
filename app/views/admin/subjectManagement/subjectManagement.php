<!DOCTYPE html>
<html lang="en">
<?php require PATH_VIEW . 'components/head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php require PATH_VIEW . 'components/navbar.php'; ?>
        <?php require PATH_VIEW . 'components/adminSidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content mt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><span class="d-none d-sm-inline">List of </span>Subjects</h3>
                                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#modal-add">
                                        <i class="fa fa-plus-square mr-1"></i>
                                        Add New Subject
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableActionTools" class="table table-bordered table-striped text-center table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>Semester</th>
                                                <th>Year Level</th>
                                                <th>Program Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $result) { ?>
                                                <tr>
                                                    <td><?php echo $result['subjectCode']; ?></td>
                                                    <td><?php echo $result['subjectName']; ?></td>
                                                    <td><?php echo $result['semester']; ?></td>
                                                    <td><?php echo $result['year_level']; ?></td>
                                                    <td><?php echo '( ' . $result['program_code'] . ' ) - ' . $result['program_name']; ?></td>
                                                    <td><?php echo $result['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-primary mr-1 editWithData" data-id="<?php echo $result['id']; ?>" data-toggle="modal" data-target="#modal-edit">
                                                            <i class="fa fa-edit mr-1"></i>
                                                            Edit
                                                        </button>
                                                        <?php if ($result['status'] == 1) { ?>
                                                            <button class="btn btn-danger editStatus" data-id="<?php echo $result['id']; ?>" data-status="<?php echo $result['status']; ?>" data-toggle="modal" data-target="#modal-delete">
                                                                <i class="fa fa-times-circle mr-1"></i>
                                                                Disabled
                                                            </button>
                                                        <?php } else { ?>
                                                            <button class="btn btn-warning editStatus" data-id="<?php echo $result['id']; ?>" data-status="<?php echo $result['status']; ?>" data-toggle="modal" data-target="#modal-delete">
                                                                <i class="fa fa-check-circle mr-1"></i>
                                                                Enabled
                                                            </button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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

    <!-- Add Modal -->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success d-flex justify-content-center align-items-center">
                    <h4 class="modal-title">
                        <i class="fa fa-plus-square mr-1" style="font-size: 25px;"></i>
                        Add new subject
                    </h4>
                    <button type="button" class="close text-xl text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo ROOT; ?>subjectManagement/store" method="POST" class="postForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputSubjectCode">Subject Code</label>
                                    <input type="text" class="form-control" id="exampleInputSubjectCode" name="subject_code" placeholder="Enter Subject Code" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputSubjectName">Subject Name</label>
                                    <input type="text" class="form-control" id="exampleInputSubjectName" name="subject_name" placeholder="Enter Subject Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputSemester">Semester</label>
                                    <select class="form-control" id="exampleInputSemester" name="semester" required>
                                        <option value="" selected disabled>---Select Semester---</option>
                                        <?php foreach ($data2 as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputYearLear">Year Level</label>
                                    <select class="form-control" id="exampleInputYearLear" name="year_level" required>
                                        <option value="" selected disabled>---Select Year Level---</option>
                                        <?php foreach ($data3 as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputProgram">Choose your Program</label>
                                    <select class="form-control" id="exampleInputProgram" name="program" required>
                                        <option value="" selected disabled>---Select Program---</option>
                                        <?php foreach ($data4 as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['program_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary" style="width: 100px;">
                            <i class="fa fa-paper-plane mr-1"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <!-- Edit Modal -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary d-flex justify-content-center align-items-center">
                    <h4 class="modal-title">
                        <i class="fa fa-edit mr-1" style="font-size: 25px;"></i>
                        Edit subject
                    </h4>
                    <button type="button" class="close text-xl text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo ROOT; ?>subjectManagement/update" method="POST" class="postForm">
                    <div class="modal-body">
                        <div class="row">
                        <input type="text" class="form-control" id="e_id" name="id" hidden>
                        <input type="text" class="form-control" id="e_old_subject_code" name="old_subject_code" hidden>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_subject_code">Subject Code</label>
                                    <input type="text" class="form-control" id="e_subject_code" name="subject_code" placeholder="Enter Subject Code" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_subject_name">Subject Name</label>
                                    <input type="text" class="form-control" id="e_subject_name" name="subject_name" placeholder="Enter Subject Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_semester">Semester</label>
                                    <select class="form-control" id="e_semester" name="semester" required>
                                        <?php foreach ($data2 as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_year_level">Year Level</label>
                                    <select class="form-control" id="e_year_level" name="year_level" required>
                                        <?php foreach ($data3 as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_program">Choose your Program</label>
                                    <select class="form-control" id="e_program" name="program" required>
                                        <?php foreach ($data4 as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['program_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary" style="width: 100px;">
                            <i class="fa fa-pen mr-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">
                        <i class="fa fa-pen mr-1" style="font-size: 25px;"></i>
                        Status
                    </h4>
                </div>
                <form action="<?php echo ROOT; ?>subjectManagement/updateStatus" method="POST" class="postForm">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" hidden>
                        <input type="text" class="form-control status" name="status" hidden>
                        <p class="text-lg">Are you sure you want to update the status of this subject ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">No</button>
                        <button type="submit" class="btn btn-danger" style="width: 100px;">Yes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <?php require PATH_VIEW . 'components/scripts.php'; ?>
    <script>
        $("#subjectManagement").addClass("active");

        //This will be the title of the table when using the table tools like Excel, PDF, and Print.
        const tableTitle = "List of Subjects";
        const loadingStatus = false;

        $('.editWithData').on('click', function() {
            const path = '<?php echo ROOT; ?>subjectManagement/edit';
            const id = $(this).attr('data-id');
            $('.id').val(id);
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
                    $('#e_old_subject_code').val(json['subjectCode']);
                    $('#e_subject_code').val(json['subjectCode']);
                    $('#e_subject_name').val(json['subjectName']);
                    $('#e_semester').val(json['semester_id']);
                    $('#e_year_level').val(json['year_level_id']);
                    $('#e_program').val(json['program_id']);

                }
            });
        });
    </script>
</body>

</html>