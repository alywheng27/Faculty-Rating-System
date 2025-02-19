<?php
    class EvaluationSelected extends QueryRepo{
        function selectEvaluation($dbc1){
            try {
                $_SESSION['EnrollmentID'] = $_POST['class'];
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $co = new EvaluationSelected();

    $co->selectEvaluation($dbc1);

    header('Location: ?evaluation=true');
?>
        