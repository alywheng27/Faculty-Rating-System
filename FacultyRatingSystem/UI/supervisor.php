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
            <h1 class="m-0 text-dark">Evaluation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Evaluation</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Evaluation</h3>
            </div>
            
            <div class="card-body table-responsive">
              <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?supervisorSelected=true" method="post">
                <div class="row">
                  <div class="col-md-4">
                    <select name="ratee" class="form-control select2Ratee select2-primary" id="ratee" data-dropdown-css-class="select2-primary" style="width: 100%;">';
                      <?php
                        $ratees = $queryRepoMain->getRatee($dbc1, null);
                        foreach ($ratees as $ratee) {
                            echo '<option value="'.$ratee['RateeID'].'">'.$ratee['FirstName'].' '.$ratee['Surname'].'</option>';
                        }
                        ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block mb-3 mr-2" id="setEvaluation">Select Faculty</button>
                  </div>
              </form>
                  <div class="col-md-6">
                    <?php
                      if(isset($_SESSION['RateeID'])){
                        $ratees = $queryRepoMain->getRatee($dbc1, $_SESSION['RateeID']);
                        foreach ($ratees as $ratee) {
                          echo '<h4 class="float-right">Faculty: <strong>'.$ratee['FirstName'].' '.$ratee['Surname'].'</strong></h4>';
                        }
                      }else {
                        echo '<h4 class="float-right">Faculty: <strong>None</strong></h4>';
                      }
                    ?>
                  </div>
                </div>
                <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?supervisorFunction=true" method="post">
                  <?php include 'FacultyRatingSystem/UI/UIDynamics/Supervisor/supervisor.php'; ?>
                  <?php
                    if(isset($_SESSION['RateeID'])){
                      echo '<button type="submit" class="btn btn-success mb-3 float-right mr-2" id="setEvaluation">Submit Evaluation</button>';
                    }
                  ?>
                </form>
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

<script src="FacultyRatingSystem/Skin/plugins/Sortable.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jquery-sortable.js"></script>



<!-- AdminLTE App -->
<script src="FacultyRatingSystem/Skin/dist/js/adminlte.min.js"></script>

<script>
  //Initialize Select2 Elements
  $('.select2Ratee').select2();

  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
</script>

<script type="text/javascript">
    $.ajax({
      type: "get",
      url: '?notification=true',
      success: function(data){
        if(data == 'EvaluationAdded'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Evaluation Added.');
        }

      }
    });
</script>

</body>
</html>
