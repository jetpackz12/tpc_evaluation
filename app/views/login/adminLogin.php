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
  </style>

</head>

<body class="hold-transition login-page">
  <!-- login-box -->
  <div class="login-box">
    <div class="card">
      <div class="card-header d-flex justify-content-center align-items-center" style="background-color: #009900;">
        <h3 class="card-title text-white text-center">
          <b>Teacher's Performance Evaluation</b>
        </h3>
      </div>

      <div class="card-body login-card-body rounded-lg">
        <h4 class="login-box-msg">Admin Login</h4>
        <form action="<?php echo ROOT; ?>adminLogin" id="frm" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text bg-light">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text bg-light">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-block btn-outline-primary">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.login-box -->

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
                  window.location.href = '<?php echo ROOT; ?>adminDashboard';
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