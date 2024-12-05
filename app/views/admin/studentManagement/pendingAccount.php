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
                                    <h3 class="card-title"><span class="d-none d-sm-inline">List of </span>Pending
                                        Accounts</h3>
                                    <button class="btn btn-primary float-right" id="btn-approved-all" disabled>
                                        <i class="fa fa-spell-check"></i>
                                        Approved All
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableActionTools"
                                        class="table table-bordered table-striped text-center table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" id="checkboxSelectAll">
                                                        <label for="checkboxSelectAll">
                                                            Select All
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>Acount#</th>
                                                <th>Lastname</th>
                                                <th>Firstname</th>
                                                <th>Middlename</th>
                                                <th>StudentID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $result) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" class="cb-input" name="cbInputVal[]"
                                                                id="checkbox<?php echo $result['id']; ?>"
                                                                value="<?php echo $result['id']; ?>">
                                                            <label for="checkbox<?php echo $result['id']; ?>">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $result['id']; ?></td>
                                                    <td><?php echo $result['lastname']; ?></td>
                                                    <td><?php echo $result['firstname']; ?></td>
                                                    <td><?php echo $result['middlename']; ?></td>
                                                    <td><?php echo $result['studentId']; ?></td>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <form action="<?php echo ROOT; ?>pendingAccount/updateStatusToApproved" class="postForm">
                                                            <input type="text" class="form-control" name="id" value="<?php echo $result['id']; ?>" hidden>
                                                            <button type="submit"
                                                                class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                                                <i class="fa fa-check mr-1"></i>
                                                                Approved
                                                            </button>
                                                            <button type="button" class="btn btn-danger edit"
                                                                data-id="<?php echo $result['id']; ?>" data-toggle="modal"
                                                                data-target="#modal-cancel">
                                                                <i class="fa fa-times mr-1"></i>
                                                                Cancel
                                                            </button>
                                                        </form>
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

    <!-- Cancel Modal -->
    <div class="modal fade" id="modal-cancel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">
                        <i class="fa fa-exclamation-circle mr-1" style="font-size: 25px;"></i>
                        Cancel information
                    </h4>
                </div>
                <form action="<?php echo ROOT; ?>pendingAccount/updateStatusToCancelled" method="POST" class="postForm">
                    <div class="modal-body">
                        <p class="text-lg">Please provide the reason for canceling this student's account.</p>
                        <input type="text" class="form-control id" name="id" hidden>
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="reason" placeholder="Enter reason..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">
                            <i class="fa fa-arrow-circle-left mr-1"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-danger" style="width: 100px;">
                            <i class="fa fa-paper-plane mr-1"></i>
                            Submit
                        </button>
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
        $("#studentManagement").addClass("menu-open");
        $("#studentManagementLink").addClass("active");
        $("#pendingAccount").addClass("active");

        //This will be the title of the table when using the table tools like Excel, PDF, and Print.
        const tableTitle = "List of Student Pending Accounts";
        const pagination = false;
        const loadingStatus = false;
        const ACCOUNT_STATUS = 1;

        let inputCheckBoxCounter = 0;

        $(document).ready(function() {
            $('#checkboxSelectAll').change(function() {
                if ($('#checkboxSelectAll').is(':checked')) {
                    $('.cb-input').prop('checked', true);
                    inputCheckBoxCounter = $('.cb-input').length;
                    if (inputCheckBoxCounter > 0)
                        enabledButton();
                } else {
                    $('.cb-input').prop('checked', false);
                    $('#btn-approved-all').attr('disabled', 'disabled');
                    inputCheckBoxCounter = 0;
                    disabledButton();
                }
            });

            $('.cb-input').change(function() {
                if (this.checked) {
                    inputCheckBoxCounter++;
                    enabledButton();
                } else {
                    inputCheckBoxCounter--;
                    if (inputCheckBoxCounter === 0) {
                        $('#checkboxSelectAll').prop('checked', false);
                        disabledButton();
                    }
                }
            });

            function enabledButton() {
                $('#btn-approved-all').removeAttr('disabled');
            }

            function disabledButton() {
                $('#btn-approved-all').attr('disabled', 'disabled');
            }

            $('#btn-approved-all').click(function() {
                let selectedIds = [];

                $('.cb-input:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo ROOT; ?>pendingAccount/updateMultipleStatusToApproved",
                    data: {
                        selectedData: selectedIds,
                        status: ACCOUNT_STATUS
                    },
                    success: function(data) {

                        const jsonData = JSON.parse(data);

                        switch (jsonData['response']) {
                            case "0":
                                Toast.fire({
                                    icon: 'error',
                                    title: `<p class="text-center pt-2 text-black"> ${jsonData['message']} </p>`
                                });
                                break;

                            case "1":
                                Toast.fire({
                                    icon: 'success',
                                    title: `<p class="text-center pt-2 text-black"> ${jsonData['message']} </p>`
                                });
                                setTimeout(function() {
                                    inputCheckBoxCounter = 0;
                                    location.reload();
                                }, 1500);
                                break;

                            default:
                                console.log('There has been an error please contact administrator.');
                                break;
                        }
                    }
                });

            });
        });
    </script>
</body>

</html>