<?php
    class Ratee extends QueryRepo{
        function displayRatee($dbc1){
            $ratees = $this->getRatee($dbc1, NULL);

            foreach ($ratees as $ratee) {
                echo '
                    <tr>
                        <td>'.$ratee['RateeIDNumber'].'</td>
                        <td>'.$ratee['FirstName'].' '.$ratee['Surname'].'</td>
                        <td>'.$ratee['RateeType'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$ratee['RateeID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$ratee['RateeID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $r = new Ratee();

    $r->displayRatee($dbc1);
    


?>