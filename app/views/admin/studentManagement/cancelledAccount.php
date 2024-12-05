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
                                    <h3 class="card-title"><span class="d-none d-sm-inline">List of </span>Cancelled Accounts</h3>
                                    <div class="float-right">
                                        <button class="btn btn-primary" id="btn-approved-all" disabled>
                                            <i class="fa fa-spell-check"></i>
                                            Approved All
                                        </button>
                                        <button class="btn btn-info" id="btn-pending-all" disabled>
                                            <i class="fa fa-spell-check"></i>
                                            Pending All
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableActionTools" class="table table-bordered table-striped text-center table-responsive-sm">
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
                                                <th>Cancel Massage</th>
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
                                                    <td><?php echo $result['cancel_message']; ?></td>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <form action="<?php echo ROOT; ?>cancelledAccount/updateStatusToApproved" class="postForm">
                                                            <input type="text" class="form-control" name="id" value="<?php echo $result['id']; ?>" hidden>
                                                            <button type="submit" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0">
                                                                <i class="fa fa-check mr-1"></i>
                                                                Approved
                                                            </button>
                                                        </form>
                                                        <form action="<?php echo ROOT; ?>cancelledAccount/updateStatusToPending" class="postForm">
                                                            <input type="text" class="form-control" name="id" value="<?php echo $result['id']; ?>" hidden>
                                                            <button type="submit" class="btn btn-info">
                                                                <i class="fa fa-hourglass-half mr-1"></i>
                                                                Pending
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


    <?php require PATH_VIEW . 'components/scripts.php'; ?>
    <script>
        $("#studentManagement").addClass("menu-open");
        $("#studentManagementLink").addClass("active");
        $("#cancelledAccount").addClass("active");

        //This will be the title of the table when using the table tools like Excel, PDF, and Print.
        const tableTitle = "List of Student Cancelled Accounts";
        const pagination = false;

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
                    $('#btn-pending-all').attr('disabled', 'disabled');
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
                $('#btn-pending-all').removeAttr('disabled');
            }

            function disabledButton() {
                $('#btn-approved-all').attr('disabled', 'disabled');
                $('#btn-pending-all').attr('disabled', 'disabled');
            }

            function approvedAllAndPendingAll(post_url, account_status) {
                let selectedIds = [];

                $('.cb-input:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length === 0) {
                    Toast.fire({
                        icon: 'error',
                        title: `<p class="text-center pt-2 text-black"> No Data ! </p>`
                    });
                }

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: post_url,
                    data: {
                        selectedData: selectedIds,
                        status: account_status
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
            }

            $('#btn-approved-all').click(function() {
                const ACCOUNT_STATUS = 1;
                approvedAllAndPendingAll("<?php echo ROOT; ?>cancelledAccount/updateMultipleStatus", ACCOUNT_STATUS);
            });

            $('#btn-pending-all').click(function() {
                const ACCOUNT_STATUS = 2;
                approvedAllAndPendingAll("<?php echo ROOT; ?>cancelledAccount/updateMultipleStatus", ACCOUNT_STATUS);
            });
        });
    </script>
</body>

</html>