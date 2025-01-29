<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    include 'FacultyRatingSystem/UI/UIParts/head.php'
   ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include 'FacultyRatingSystem/UI/UIParts/navbar.php' ?>

  <?php include 'FacultyRatingSystem/UI/UIParts/sidebar.php' ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Class</h3>
            </div>
            
            <div class="card-body table-responsive">
              <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#class">Add Class</button>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Class</th>
                  <th>Subject</th>
                  <th>Faculty</th>
                  <th>Academic Year</th>
                  <th>Semester</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php include 'FacultyRatingSystem/UI/UIDynamics/Class/class.php'; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Class</th>
                  <th>Subject</th>
                  <th>Faculty</th>
                  <th>Academic Year</th>
                  <th>Semester</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              </div>
          </div>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <?php include 'FacultyRatingSystem/UI/UIParts/footer.php' ?>
</div>

<?php include 'FacultyRatingSystem/UI/UIParts/modal.php' ?>
<?php include 'FacultyRatingSystem/UI/UIDynamics/Class/modal.php'; ?>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="FacultyRatingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="FacultyRatingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="FacultyRatingSystem/Skin/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="FacultyRatingSystem/Skin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="FacultyRatingSystem/Skin/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="FacultyRatingSystem/Skin/plugins/datatables/jquery.dataTables.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Howler -->
<script src="FacultyRatingSystem/Skin/plugins/howler/howler.core.js"></script>
<!-- DataTables  & Plugins -->
<script src="FacultyRatingSystem/Skin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jszip/jszip.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- AdminLTE App -->
<script src="FacultyRatingSystem/Skin/dist/js/adminlte.min.js"></script>

<script>
  //Initialize Select2 Elements
  $('.select2Class').select2();
  $('.select2Subject').select2();
  $('.select2Faculty').select2();
  $('.select2AcademicYear').select2();
  $('.select2Semester').select2();

  <?php include 'FacultyRatingSystem/UI/UIDynamics/Class/dependency.php'; ?>

  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
</script>

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "buttons": [{
          extend: 'copyHtml5',
          exportOptions: {
              columns: ':not(:last-child)'
          }
        }, 
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: ':not(:last-child)'
            }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
              columns: ':not(:last-child)'
          }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: ':not(:last-child)'
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: ':not(:last-child)'
            }
        },
        // {
        //     extend: 'colvis',
        // },
      {
      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script type="text/javascript">
    $.ajax({
      type: "get",
      url: '?notification=true',
      success: function(data){
        if(data == 'ClassAdded'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Class Added.');
        }

        if(data == 'ClassUpdated'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.info('Class Updated.');
        }

        if(data == 'ClassDeleted'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.error('Class Deleted.');
        }

      }
    });
</script>

</body>
</html>
