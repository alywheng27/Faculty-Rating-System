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
            <h1 class="m-0 text-dark">Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Report</h3>
            </div>
            
            <div class="card-body table-responsive">
              <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?reportSelectedFaculty=true" method="post">
                <div class="row">
                  <div class="col-md-2">
                    <select name="class" class="form-control select2Class select2-primary" id="class" data-dropdown-css-class="select2-primary" style="width: 100%;">';
                      <option value="" disabled="disabled" selected>Select a Class</option>
                      <?php
                        $rateeID = $_SESSION['id'];
                        $classes = $queryRepoMain->getClass($dbc1, true, $rateeID);
                        foreach ($classes as $class) {
                          echo '<option value="'.$class['ClassID'].'">'.$class['Class'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <select name="rater" class="form-control select2Rater select2-primary" id="rater" data-dropdown-css-class="select2-primary" style="width: 100%;">';
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block mb-3 mr-2" id="setReport">Generate Report</button>
                  </div>
              </form>
                  <div class="col-md-6">
                    <?php
                      if(isset($_SESSION['RaterID'])){
                        $enrollments = $queryRepoMain->getEnrollment($dbc1, $_SESSION['RaterID'], null, null, null);
                        echo '<h4 class="float-right">Student: <strong>'.$enrollments[0]['RaterFirstName'].' '.$enrollments[0]['RaterSurname'].'</strong></h4>';
                      }else {
                        echo '<h4 class="float-right">Student: <strong>None</strong></h4>';
                      }
                    ?>
                  </div>
                </div>
                <div id="printable">
                  <?php
                    if(isset($_SESSION['RaterID'])){
                      echo '<h2 class="text-center mt-3">Evaluation Report</h2>';
                      echo '<hr>';
                    }
                  ?>
                  <table>
                    <?php
                      if(isset($_SESSION['RaterID'])){
                        $academicYear = $queryRepoMain->getAcademicYear($dbc1, true);
                        $semester = $queryRepoMain->getSemester($dbc1, true);
                        
                        $enrollments = $queryRepoMain->getEnrollment($dbc1, $_SESSION['RaterID'], null, null, null);
                        $ratingPeriod = $queryRepoMain->getRatingPeriod($dbc1);
                        
                        echo '<tr>';
                        echo '<td class="">Rating Period From: <strong>'.str_replace("T"," ",$ratingPeriod[0]['FromRatingPeriod']).'</strong></td>';
                        echo '<td class="">To: <strong>'.str_replace("T"," ",$ratingPeriod[0]['ToRatingPeriod']).'</strong></td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td width="80%" class="">Student: <strong>'.$enrollments[0]['RaterFirstName'].' '.$enrollments[0]['RaterSurname'].'</strong></td>';
                        if(!empty($academicYear)){
                          echo '<td>Academic Year: <strong>'.$academicYear[0]['AcademicYear'].'</strong></td>';
                        }
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td class="">Faculty: <strong>'.$enrollments[0]['RateeFirstName'].' '.$enrollments[0]['RateeSurname'].'</strong></td>';
                        if(!empty($semester)){
                          echo '<td>Semester: <strong>'.$semester[0]['Semester'].'</strong></td>';
                        }
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td class="">Class: <strong>'.$enrollments[0]['Class'].'</strong></td>';
                        echo '<td class="">Academic Rank: <strong>'.$enrollments[0]['AcademicRank'].'</strong></td>';
                        echo '</tr>';
                      }                 
                    ?>
                  </table>
                  <?php
                      if(isset($_SESSION['RaterID'])){
                        echo '
                          <fieldset class="border border-info p-2 w-100 mt-3">
                            <legend  class="w-auto">Rating Legend</legend>
                            <p>5 = Strongly Agree, 4 = Agree, 3 = Uncertain, 2 = Disagree, 1 = Strongly Disagree</p>
                          </fieldset>
                        ';
                      }
                  ?> 
                  <?php 
                    if(isset($_SESSION['RaterID'])){
                      include 'FacultyRatingSystem/UI/UIDynamics/ReportFaculty/report.php'; 
                    }
                  ?>
                </div>
                <?php
                  if(isset($_SESSION['RaterID'])){
                    echo '<button type="button" class="btn btn-success mr-2 float-right mt-3" id="print-btn">&nbsp;&nbsp;Print&nbsp;&nbsp;</button>';
                  }
                ?>
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
  $('.select2Class').select2();
  $('.select2Rater').select2();

  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
</script>

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  $(function () {
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  $(function () {
    $('#example3').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  $(function () {
    $('#example4').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $("#class").change(function(){
    var classID = $(this).val();
    $.ajax({
      type: "post",
      url: '?raterReportFaculty=true',
      data: {classID: classID},
      success: function(data){
        document.getElementById("rater").innerHTML = data;
      }
    });
  })
</script>

<noscript>
	<style>
		table{
			width:100%;
			border-collapse: collapse;
		}
		table tr,table td,table th{
			border:1px solid gray;
			padding: 3px
		}

    .float-right {
      float: right;
    }
		table thead tr{
			background: #6c757d linear-gradient(180deg,#828a91,#6c757d) repeat-x!important;
    		color: #fff;
		}
		.text-center{
			text-align:center;
		} 
		.text-right{
			text-align:right;
		} 
		.text-left{
			text-align:left;
		}

    .mt-3 {
      margin-top: 1.5rem;
    }
	</style>
</noscript>

<script>
  $('#print-btn').click(function(){
		var ns =$('noscript').clone()
		var content = $('#printable').html()
		ns.append(content)
		var nw = window.open("Report","_blank","width=900,height=700")
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
	})
</script>

</body>
</html>
