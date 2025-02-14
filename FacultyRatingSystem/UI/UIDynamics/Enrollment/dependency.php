<?php
    class EnrollmentDependency extends QueryRepo{
        function installEnrollmentDependency($dbc1){
            $enrollments = $this->getEnrollment($dbc1);

            foreach ($enrollments as $enrollment) {
                echo '
                    $(".select2Rater'.$enrollment['EnrollmentID'].'").select2();
                    $(".select2Class'.$enrollment['EnrollmentID'].'").select2();
                ';
            }
        }
    }

    $rd = new EnrollmentDependency();

    $rd->installEnrollmentDependency($dbc1);
?>