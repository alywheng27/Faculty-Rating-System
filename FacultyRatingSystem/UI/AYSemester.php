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
            <h1 class="m-0 text-dark">Academic Year & Semester</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Academic Year & Semester</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
              <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?AYSemesterFunction=true&type=set" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="year">Academic Year</label>
                      <select name="year" class="form-control select2AcademicYear select2-success" id="year" data-dropdown-css-class="select2-success" style="width: 100%;">
                        <?php
                          $academicYears = $queryRepoMain->getAcademicYear($dbc1, false);
                          foreach ($academicYears as $academicYear) {
                            echo '<option value="'.$academicYear['AcademicYearID'].'">'.$academicYear['AcademicYear'].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="sem">Semester</label>
                      <select name="sem" class="form-control select2Semester select2-success" id="sem" data-dropdown-css-class="select2-success" style="width: 100%;">
                        <?php
                          $semesters = $queryRepoMain->getSemester($dbc1, false);
                          foreach ($semesters as $semester) {
                            echo '<option value="'.$semester['SemesterID'].'">'.$semester['Semester'].'</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-success btn-block">Set A.Y. & Semester</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="offset-md-4 offset-sm-0 col-md-4 col-sm-12 text-right">
              <?php
                $academicYear = $queryRepoMain->getAcademicYear($dbc1, true);
                $semester = $queryRepoMain->getSemester($dbc1, true);

                echo '<h4>Academic Year: '.$academicYear[0]['AcademicYear'].'</h4>';
                echo '<h4>Semester: '.$semester[0]['Semester'].' </h4>';
              ?>
              
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Academic Year</h3>
                    </div>
                    
                    <div class="card-body table-responsive">
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#academicYear">Add Academic Year</button>
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Academic Year</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php include 'FacultyRatingSystem/UI/UIDynamics/AYSemester/academicYear/academicYear.php'; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Academic Year</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Semester</h3>
                    </div>
                    
                    <div class="card-body table-responsive">
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#semester">Add Semester</button>
                        <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php include 'FacultyRatingSystem/UI/UIDynamics/AYSemester/semester/semester.php'; ?>
                        </tbody>
                        <tfoot>
                        <tr>
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
<?php include 'FacultyRatingSystem/UI/UIDynamics/AYSemester/academicYear/modal.php'; ?>
<?php include 'FacultyRatingSystem/UI/UIDynamics/AYSemester/semester/modal.php'; ?>

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
  $('.select2AcademicYear').select2();
  $('.select2Semester').select2();

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

  $(function () {
    $('#example2').DataTable({
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
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>

<script type="text/javascript">
    $.ajax({
      type: "get",
      url: '?notification=true',
      success: function(data){
        if(data == 'AYSemesterSet'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('AcademicYear And Semester has been set.');
        }

      }
    });

    $.ajax({
      type: "get",
      url: '?notification=true',
      success: function(data){
        if(data == 'AcademicYearAdded'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Academic Year Added.');
        }

        if(data == 'AcademicYearUpdated'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.info('Academic Year Updated.');
        }

        if(data == 'AcademicYearDeleted'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.error('Academic Year Deleted.');
        }

      }
    });

    $.ajax({
      type: "get",
      url: '?notification=true',
      success: function(data){
        if(data == 'SemesterAdded'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Semester Added.');
        }

        if(data == 'SemesterUpdated'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.info('Semester Updated.');
        }

        if(data == 'SemesterDeleted'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.error('Semester Deleted.');
        }
      }
    });
</script>

</body>
</html>
