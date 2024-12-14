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
                                    <h3 class="card-title"><span class="d-none d-sm-inline">List of </span>Instructors</h3>
                                    <div class="float-right d-flex justify-content-center align-items-center">
                                        <div class="mr-3">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="activeCheckBox" checked>
                                                <label for="activeCheckBox">
                                                    Active Status
                                                </label>
                                            </div>
                                            <div class="icheck-warning d-inline ml-1">
                                                <input type="checkbox" id="inactiveCheckBox" checked>
                                                <label for="inactiveCheckBox">
                                                    Inactive Status
                                                </label>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                                            <i class="fa fa-plus-square mr-1"></i>
                                            Add New Teacher
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableActionTools" class="table table-bordered table-striped text-center  table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Lastname</th>
                                                <th>Firstname</th>
                                                <th>Middlename</th>
                                                <th>Program</th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $result) { ?>
                                                <tr>
                                                    <td><?php echo $result['teacherId']; ?></td>
                                                    <td><?php echo $result['teacherLastname']; ?></td>
                                                    <td><?php echo $result['teacherFirstname']; ?></td>
                                                    <td><?php echo $result['teacherMiddlename']; ?></td>
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
                        Add new teacher
                    </h4>
                    <button type="button" class="close text-xl text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo ROOT; ?>teacherManagement/store" method="POST" class="postForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputTeacherIdentification">Teacher Identification</label>
                                    <input type="number" class="form-control" id="exampleInputTeacherIdentification" name="teacher_id" placeholder="Enter Teacher Identification" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputLastname">Lastname</label>
                                    <input type="text" class="form-control" id="exampleInputLastname" name="lastname" placeholder="Enter Lastname" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputFirstname">Firstname</label>
                                    <input type="text" class="form-control" id="exampleInputFirstname" name="firstname" placeholder="Enter Firstname" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputMiddlename">Middlename</label>
                                    <input type="text" class="form-control" id="exampleInputMiddlename" name="middlename" placeholder="Enter Middlename" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputProgram">Choose your Program</label>
                                    <select class="form-control" id="exampleInputProgram" name="program" required>
                                        <option value="" selected disabled>---Select Program---</option>
                                        <?php foreach ($data2 as $result) { ?>
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
                        Edit teacher
                    </h4>
                    <button type="button" class="close text-xl text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo ROOT; ?>teacherManagement/update" method="POST" class="postForm">
                    <div class="modal-body">
                        <div class="row">
                            <input type="text" class="form-control" id="e_id" name="id" hidden>
                            <input type="text" class="form-control" id="e_old_teacher_identification" name="old_teacher_identification" hidden>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_teacher_id">Teacher Identification</label>
                                    <input type="text" class="form-control" id="e_teacher_id" name="teacher_id" placeholder="Enter Teacher Identification" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_lastname">Lastname</label>
                                    <input type="text" class="form-control" id="e_lastname" name="lastname" placeholder="Enter Lastname" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_firstname">Firstname</label>
                                    <input type="text" class="form-control" id="e_firstname" name="firstname" placeholder="Enter Firstname" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_middlename">Middlename</label>
                                    <input type="text" class="form-control" id="e_middlename" name="middlename" placeholder="Enter Middlename" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="e_program">Choose your Program</label>
                                    <select class="form-control" id="e_program" name="program" required>
                                        <?php foreach ($data2 as $result) { ?>
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
                <form action="<?php echo ROOT; ?>teacherManagement/updateStatus" method="POST" class="postForm">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" hidden>
                        <input type="text" class="form-control status" name="status" hidden>
                        <p class="text-lg">Are your sure you want to update the status of this instructor ?</p>
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
        $("#teacherManagement").addClass("active");

        //This will be the title of the table when using the table tools like Excel, PDF, and Print.
        const tableTitle = "List of Instructors";
        const loadingStatus = false;

        $(document).ready(function() {
            $('.editWithData').on('click', function() {
                const path = '<?php echo ROOT; ?>teacherManagement/edit';
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
                        $('#e_old_teacher_identification').val(json['teacherId']);
                        $('#e_teacher_id').val(json['teacherId']);
                        $('#e_lastname').val(json['teacherLastname']);
                        $('#e_firstname').val(json['teacherFirstname']);
                        $('#e_middlename').val(json['teacherMiddlename']);
                        $('#e_program').val(json['program_id']);

                    }
                });
            });

            function filterTable() {
                const showActive = $('#activeCheckBox').is(':checked');
                const showInactive = $('#inactiveCheckBox').is(':checked');

                $('#tableActionTools tbody tr').each(function() {
                    const statusText = $(this).find('td:nth-child(6)').text().toLowerCase();

                    if (
                        (showActive && statusText === 'active') ||
                        (showInactive && statusText === 'inactive')
                    ) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            $('#activeCheckBox, #inactiveCheckBox').on('change', filterTable);

            filterTable();
        });
    </script>
</body>

</html>