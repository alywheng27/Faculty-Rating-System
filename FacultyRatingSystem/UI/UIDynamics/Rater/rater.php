<?php
    class Rater extends QueryRepo{
        function displayRater($dbc1){
            $raters = $this->getRater($dbc1, NULL);

            foreach ($raters as $rater) {
                echo '
                    <tr>
                        <td>'.$rater['RaterIDNumber'].'</td>
                        <td>'.$rater['FirstName'].' '.$rater['Surname'].'</td>
                        <td>'.$rater['RaterType'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$rater['RaterID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$rater['RaterID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $r = new Rater();

    $r->displayRater($dbc1);
    


?>