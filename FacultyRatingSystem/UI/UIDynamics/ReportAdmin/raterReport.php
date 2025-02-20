<?php
    class RaterReport extends QueryRepo{
        function displayRaterReport($dbc1){
            $classID = $_POST['classID'];
            $enrollments = $this->getEnrollment($dbc1, null, null, null, $classID);

            echo '<option value="" disabled="disabled" selected>Select a Rater</option>';
            foreach ($enrollments as $enrollment) {
                echo "
                    <option value='".$enrollment['RaterID']."'>".$enrollment['RaterFirstName']." ".$enrollment['RaterSurname']."</option>
                ";
            }
            
        }
    }

    $cr = new RaterReport();

    $cr->displayRaterReport($dbc1);
?>