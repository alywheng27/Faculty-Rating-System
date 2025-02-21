<?php
    class ReportSelected extends QueryRepo{
        function selectReport($dbc1){
            try {
                $_SESSION['ClassID'] = $_POST['class'];
                $_SESSION['RaterID'] = $_POST['rater'];
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $rs = new ReportSelected();

    $rs->selectReport($dbc1);

    header('Location: ?reportFaculty=true');
?>
        