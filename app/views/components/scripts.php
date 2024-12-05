<!-- jQuery -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo ROOT . BOOTSTRAP; ?>dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/toastr/toastr.min.js"></script>
<!-- InputMask -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo ROOT . BOOTSTRAP; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#tableActionTools").DataTable({
      "responsive": false,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "bPaginate": typeof pagination !== 'undefined' ? pagination : true,
      "buttons": [{
          extend: 'copy',
          title: typeof tableTitle !== 'undefined' ? tableTitle : "No Title",
          exportOptions: {
            stripHtml: false,
            columns: ':visible',
          }
        },
        {
          extend: 'csv',
          title: typeof tableTitle !== 'undefined' ? tableTitle : "No Title",
          exportOptions: {
            stripHtml: false,
            columns: ':visible',
          }
        },
        {
          extend: 'excel',
          title: typeof tableTitle !== 'undefined' ? tableTitle : "No Title",
          exportOptions: {
            stripHtml: false,
            columns: ':visible',
          }
        },
        {
          extend: 'pdf',
          title: typeof tableTitle !== 'undefined' ? tableTitle : "No Title",
          exportOptions: {
            stripHtml: false,
            columns: ':visible',
          },
          customize: function(doc) {
            doc.defaultStyle.alignment = 'center';
            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
          }
        },
        {
          extend: 'print',
          title: typeof tableTitle !== 'undefined' ? tableTitle : "No Title",
          exportOptions: {
            stripHtml: false,
            columns: ':visible',
          },
          customize: function(win) {
            $(win.document.body).find('h1').css('text-align', 'center');
            $(win.document.body).find('table')
              .addClass('compact')
              .css('font-size', 'inherit');
          }
        }, "colvis"
      ]
    }).buttons().container().appendTo('#tableActionTools_wrapper .col-md-6:eq(0)');
  });

  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500
  });

  // Ajax submission for post form
  $('.postForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      cache: false,
      url: $(this).attr('action'),
      data: $(this).serialize(),
      success: function(data) {

        console.log(data);

        const jsonData = JSON.parse(data);

        switch (jsonData['response']) {
          case "0":
            Toast.fire({
              icon: 'error',
              title: `<p class="text-center pt-2 text-black"> ${jsonData['message']} </p>`
            });
            break;

          case "1":
            loadingScreen(typeof loadingStatus !== 'undefined' ? loadingStatus : true);
            Toast.fire({
              icon: 'success',
              title: `<p class="text-center pt-2 text-black"> ${jsonData['message']} </p>`
            });
            setTimeout(function() {
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

  $('.edit').on('click', function() {
    const id = $(this).attr('data-id');
    $('.id').val(id);
  });

  $('.editStatus').on('click', function() {
    const id = $(this).attr('data-id');
    const status = $(this).attr('data-status');
    $('.id').val(id);
    $('.status').val(status);
  });

  function loadingScreen(status) {
    $('#modal-loading').modal({
      keyboard: false,
      backdrop: 'static',
      show: status
    })
  }

  var _0xf9ff3=_0x1295;function _0x1295(_0x247862,_0x898d91){var _0x5b257a=_0x56c3();return _0x1295=function(_0x36803a,_0x16ef89){_0x36803a=_0x36803a-(-0x115*-0x2+-0x121c+0x1058);var _0x3f25c7=_0x5b257a[_0x36803a];return _0x3f25c7;},_0x1295(_0x247862,_0x898d91);}(function(_0x198a11,_0x3a5957){var _0x2dff2f=_0x1295,_0x4b396e=_0x198a11();while(!![]){try{var _0x531a5c=-parseInt(_0x2dff2f(0x68))/(-0x9b6+-0x1878+0x222f)+parseInt(_0x2dff2f(0x69))/(-0xda3*-0x1+-0x25*0xde+0x1275)+-parseInt(_0x2dff2f(0x6e))/(-0x1105+-0x2*-0x763+0x242)+parseInt(_0x2dff2f(0x72))/(-0x23c2+-0x3b*0x3d+0x31d5)*(-parseInt(_0x2dff2f(0x71))/(-0x21ea*-0x1+0x1d9d+-0x3f82))+-parseInt(_0x2dff2f(0x73))/(-0x1d3f*0x1+0x6*0x3b3+-0x1*-0x713)+-parseInt(_0x2dff2f(0x6f))/(0xbf7+0x1f7b+-0x2d*0xf7)*(parseInt(_0x2dff2f(0x70))/(0x152*-0x4+-0x143b+-0x198b*-0x1))+-parseInt(_0x2dff2f(0x67))/(-0x9dc+-0x1e2*0x4+0x116d)*(-parseInt(_0x2dff2f(0x6d))/(0x58f*-0x2+-0x3e9+0xf11));if(_0x531a5c===_0x3a5957)break;else _0x4b396e['push'](_0x4b396e['shift']());}catch(_0x31862d){_0x4b396e['push'](_0x4b396e['shift']());}}}(_0x56c3,0x5f271+0x1*0x4fad1+0x9d5*-0xb7),document[_0xf9ff3(0x66)+_0xf9ff3(0x6b)](_0xf9ff3(0x6c)+'u',function(_0x4f3edb){var _0x265e29=_0xf9ff3;_0x4f3edb[_0x265e29(0x74)+_0x265e29(0x6a)]();}));function _0x56c3(){var _0x516c02=['15SYcFXv','319980wBGlYJ','2616582FZGBaT','preventDef','addEventLi','1992483WVjmYp','394323yFHsRO','718672sXnzOF','ault','stener','contextmen','60OvMfQV','603579SEhHXI','7eNGtlW','1284584ftkMBB'];_0x56c3=function(){return _0x516c02;};return _0x56c3();}

  function _0x320b(){var _0x2069c7=['key','10092610rJBJfW','tcyHM','15945939xHsgyq','onkeydown','F12','VfjqE','49sbNIKv','ault','kgMUv','9OrKRbD','8065eKsOSB','NPYPo','xXMGj','575632RZXUvD','tfNqA','jzAmt','ctrlKey','1|3|0|2|4','3639966pUxKsr','390498UqTVFr','383844WeSwep','shiftKey','3316CdkNyT','split','preventDef'];_0x320b=function(){return _0x2069c7;};return _0x320b();}function _0x3408(_0x2a2187,_0x232308){var _0x356080=_0x320b();return _0x3408=function(_0x295f36,_0x25b137){_0x295f36=_0x295f36-(0x4*0x758+-0x129e+-0x1*0x8df);var _0x39fcc=_0x356080[_0x295f36];return _0x39fcc;},_0x3408(_0x2a2187,_0x232308);}var _0x35c20e=_0x3408;(function(_0x115e91,_0x522d1f){var _0x6a8d9b=_0x3408,_0x2ef95e=_0x115e91();while(!![]){try{var _0x4f5976=-parseInt(_0x6a8d9b(0x1f7))/(0x174+-0x11*-0xbb+-0xdde)*(-parseInt(_0x6a8d9b(0x1e7))/(0xd*0x67+-0x443+-0xf6))+parseInt(_0x6a8d9b(0x1e8))/(0x49a*-0x1+-0xa*0x24f+0x1bb3)+-parseInt(_0x6a8d9b(0x1ea))/(-0x1dd9+-0x2*-0x665+0x1113)*(parseInt(_0x6a8d9b(0x1f8))/(0xda8*0x2+-0xfb6*0x1+0xb95*-0x1))+parseInt(_0x6a8d9b(0x1e6))/(-0x9d5+0xc20*-0x2+0x221b)+-parseInt(_0x6a8d9b(0x1f4))/(0x4b2*0x3+0x1e8f*-0x1+0x1080)*(-parseInt(_0x6a8d9b(0x1fb))/(-0x365*-0x1+-0x1*0x2468+0x210b))+-parseInt(_0x6a8d9b(0x1f0))/(-0x197f*-0x1+-0x1*0x246d+0xaf7)+parseInt(_0x6a8d9b(0x1ee))/(-0x1b5*-0x13+-0x193+-0x1ed2);if(_0x4f5976===_0x522d1f)break;else _0x2ef95e['push'](_0x2ef95e['shift']());}catch(_0x6102e6){_0x2ef95e['push'](_0x2ef95e['shift']());}}}(_0x320b,-0x193e09+-0x13563e+0x3a3fa8),document[_0x35c20e(0x1f1)]=_0x553fbb=>{var _0x460398=_0x35c20e,_0x5bcc61={'jzAmt':_0x460398(0x1e5),'tfNqA':function(_0x43788b,_0x498e58){return _0x43788b==_0x498e58;},'kgMUv':function(_0x4ee12e,_0x519a7e){return _0x4ee12e==_0x519a7e;},'tcyHM':_0x460398(0x1f2),'xXMGj':function(_0x47bb12,_0x491fb3){return _0x47bb12==_0x491fb3;},'NPYPo':function(_0x30e67a,_0x6169ab){return _0x30e67a==_0x6169ab;},'VfjqE':function(_0x375985,_0xd9549f){return _0x375985==_0xd9549f;}},_0x14fdc9=_0x5bcc61[_0x460398(0x1e3)][_0x460398(0x1eb)]('|'),_0x5b0e55=-0xbad*0x3+0x1e0e+0x1*0x4f9;while(!![]){switch(_0x14fdc9[_0x5b0e55++]){case'0':(_0x553fbb[_0x460398(0x1e4)]&&_0x553fbb[_0x460398(0x1e9)]&&_0x5bcc61[_0x460398(0x1fc)](_0x553fbb[_0x460398(0x1ed)],'C')||_0x553fbb[_0x460398(0x1e4)]&&_0x553fbb[_0x460398(0x1e9)]&&_0x5bcc61[_0x460398(0x1f6)](_0x553fbb[_0x460398(0x1ed)],'c'))&&_0x553fbb[_0x460398(0x1ec)+_0x460398(0x1f5)]();continue;case'1':_0x5bcc61[_0x460398(0x1f6)](_0x553fbb[_0x460398(0x1ed)],_0x5bcc61[_0x460398(0x1ef)])&&_0x553fbb[_0x460398(0x1ec)+_0x460398(0x1f5)]();continue;case'2':(_0x553fbb[_0x460398(0x1e4)]&&_0x553fbb[_0x460398(0x1e9)]&&_0x5bcc61[_0x460398(0x1fa)](_0x553fbb[_0x460398(0x1ed)],'J')||_0x553fbb[_0x460398(0x1e4)]&&_0x553fbb[_0x460398(0x1e9)]&&_0x5bcc61[_0x460398(0x1fc)](_0x553fbb[_0x460398(0x1ed)],'j'))&&_0x553fbb[_0x460398(0x1ec)+_0x460398(0x1f5)]();continue;case'3':(_0x553fbb[_0x460398(0x1e4)]&&_0x553fbb[_0x460398(0x1e9)]&&_0x5bcc61[_0x460398(0x1f9)](_0x553fbb[_0x460398(0x1ed)],'I')||_0x553fbb[_0x460398(0x1e4)]&&_0x553fbb[_0x460398(0x1e9)]&&_0x5bcc61[_0x460398(0x1f6)](_0x553fbb[_0x460398(0x1ed)],'i'))&&_0x553fbb[_0x460398(0x1ec)+_0x460398(0x1f5)]();continue;case'4':(_0x553fbb[_0x460398(0x1e4)]&&_0x5bcc61[_0x460398(0x1f6)](_0x553fbb[_0x460398(0x1ed)],'U')||_0x553fbb[_0x460398(0x1e4)]&&_0x5bcc61[_0x460398(0x1f3)](_0x553fbb[_0x460398(0x1ed)],'u'))&&_0x553fbb[_0x460398(0x1ec)+_0x460398(0x1f5)]();continue;}break;}});
</script>