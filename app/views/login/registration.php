<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo TITLE; ?></title>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/toastr/toastr.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>dist/css/adminlte.min.css">
    <link rel="shortcut icon" href="<?php echo ROOT . BOOTSTRAP; ?>img/tpc_logo.png">

    <style>
        body {
            background-image: url("<?php echo ROOT . BOOTSTRAP; ?>img/admin.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .acc-reg {
            color: black;
        }

        :hover.acc-reg {
            text-decoration: underline;
            color: green;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

</head>

<body class="d-md-flex justify-content-center align-items-center vh-100 vw-100">
    <!-- Main box -->
    <div class="row">
        <div class="col-12 p-0 m-0">
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="nav-icon far fa-user mr-2" style="font-size: 28px;"></i>
                        Registration
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo ROOT; ?>registration/store" id="frm" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="exampleInputLastname">Lastname</label>
                                    <input type="text" class="form-control" id="exampleInputLastname" name="lastname" placeholder="Enter Lastname" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="exampleInputFirstname">Firstname</label>
                                    <input type="text" class="form-control" id="exampleInputFirstname" name="firstname" placeholder="Enter Firstname" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="exampleInputMiddlename">Middlename</label>
                                    <input type="text" class="form-control" id="exampleInputMiddlename" name="middlename" placeholder="Enter Middlename" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="exampleInputProgramname">Program Name</label>
                                    <select class="form-control" id="exampleInputProgramname" name="program" required>
                                        <option value="" selected disabled>--- Program Name ---</option>
                                        <?php foreach ($data as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['program_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="exampleInputYearlevel">Year Level</label>
                                    <select class="form-control" id="exampleInputYearlevel" name="year_level" required>
                                        <option value="" selected disabled>--- Year Level ---</option>
                                        <?php foreach ($data2 as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['description']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="exampleInputStatus">Status</label>
                                    <select class="form-control" id="exampleInputStatus" name="status" required>
                                        <option value="" selected disabled>--- Status ---</option>
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
                                    <label for="exampleInputStudentidentification">Student Identification</label>
                                    <input type="number" class="form-control" id="exampleInputStudentidentification" name="student_identification" placeholder="Enter Student Identification" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Enter Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a class="text-lg acc-reg mr-2" href="<?php echo ROOT; ?>">
                            <i class="fa fa-arrow-circle-left" style="font-size: 20px;"></i>
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary mr-2 float-right" style="width: 200px;">
                            <i class="fa fa-paper-plane mr-1" style="font-size: 20px;"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

    <!-- jQuery -->
    <script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo ROOT . BOOTSTRAP; ?>dist/js/adminlte.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/toastr/toastr.min.js"></script>
    <!-- Page specific script -->

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500
        });

        $('#frm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                cache: false,
                url: $(this).attr('action'),
                data: $(this).serialize(),
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
                                window.location.href = '<?php echo ROOT; ?>';
                            }, 1500);
                            break;

                        default:
                            console.log('There has been an error please contact administrator.');
                            break;
                    }
                }
            });

        });
    </script>

</body>

</html>