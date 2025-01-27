<?php
    class Semester extends QueryRepo{
        function displaySemester($dbc1){
            $semesters = $this->getSemester($dbc1, false);

            foreach ($semesters as $semester) {
                echo '
                    <tr>
                        <td>'.$semester['Semester'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$semester['SemesterID'].'Semester"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$semester['SemesterID'].'Semester"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $r = new Semester();

    $r->displaySemester($dbc1);
    


?>