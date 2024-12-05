<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher Evaluation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/daterangepicker/daterangepicker.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/toastr/toastr.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/summernote/summernote-bs4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="shortcut icon" href="<?php echo ROOT . BOOTSTRAP; ?>img/tpc_logo.png">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <style>
    .content-wrapper {
      background-image: url("<?php echo ROOT . BOOTSTRAP; ?>img/tpc_logo.png");
      background-repeat: no-repeat;
      background-size: contain;
      background-position: center;
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

    .breadcrumb-item .nav-text {
      color: black;
    }

    .breadcrumb-item .nav-text:hover {
      text-decoration: underline;
      color: #28A745;
      font-style: italic;
    }

    .spinner {
      width: 88px;
      height: 88px;
      display: grid;
      border: 7px solid #0000;
      border-radius: 50%;
      border-color: #00be82 #0000;
      animation: spinner-e04l1k 1s infinite linear;
    }

    .spinner::before,
    .spinner::after {
      content: "";
      grid-area: 1/1;
      margin: 3.5px;
      border: inherit;
      border-radius: 50%;
    }

    .spinner::before {
      border-color: #00563b #0000;
      animation: inherit;
      animation-duration: 0.5s;
      animation-direction: reverse;
    }

    .spinner::after {
      margin: 14px;
    }

    @keyframes spinner-e04l1k {
      100% {
        transform: rotate(1turn);
      }
    }
  </style>

</head>

<!-- Loading Modal -->
<div class="modal fade" id="modal-loading">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">
          Loading...
        </h4>
      </div>
      <div class="modal-body d-flex justify-content-center align-items-center">
        <div class="spinner"></div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->