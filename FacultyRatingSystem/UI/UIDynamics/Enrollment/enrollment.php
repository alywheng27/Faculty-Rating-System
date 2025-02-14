<?php
    class Enrollment extends QueryRepo{
        function displayEnrollment($dbc1){
            $enrollments = $this->getEnrollment($dbc1, NULL);

            foreach ($enrollments as $enrollment) {
                echo '
                    <tr>
                        <td>'.$enrollment['FirstName'].' '.$enrollment['Surname'].'</td>
                        <td>'.$enrollment['Class'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$enrollment['EnrollmentID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$enrollment['EnrollmentID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $r = new Enrollment();

    $r->displayEnrollment($dbc1);
    


?>