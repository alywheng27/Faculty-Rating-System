<?php
    class Subject extends QueryRepo{
        function displaySubject($dbc1){
            $subjects = $this->getSubject($dbc1, NULL);

            foreach ($subjects as $subject) {
                echo '
                    <tr>
                        <td>'.$subject['Subject'].'</td>
                        <td>'.$subject['SubjectDescription'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$subject['SubjectID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$subject['SubjectID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $r = new Subject();

    $r->displaySubject($dbc1);
    


?>