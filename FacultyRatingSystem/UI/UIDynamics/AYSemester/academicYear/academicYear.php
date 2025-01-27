<?php
    class AcademicYear extends QueryRepo{
        function displayAcademicYear($dbc1){
            $academicYears = $this->getAcademicYear($dbc1, false);

            foreach ($academicYears as $academicYear) {
                echo '
                    <tr>
                        <td>'.$academicYear['AcademicYear'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$academicYear['AcademicYearID'].'AcademicYear"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$academicYear['AcademicYearID'].'AcademicYear"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $r = new AcademicYear();

    $r->displayAcademicYear($dbc1);
    


?>