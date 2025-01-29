<?php
    class ClassRate extends QueryRepo{
        function displayClassRate($dbc1){
            $classes = $this->getClass($dbc1);

            foreach ($classes as $class) {
                echo '
                    <tr>
                        <td>'.$class['Class'].'</td>
                        <td>'.$class['Subject'].'</td>
                        <td>'.$class['FirstName'].' '.$class['Surname'].'</td>
                        <td>'.$class['AcademicYear'].'</td>
                        <td>'.$class['Semester'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$class['ClassID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$class['ClassID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $r = new ClassRate();

    $r->displayClassRate($dbc1);
    


?>