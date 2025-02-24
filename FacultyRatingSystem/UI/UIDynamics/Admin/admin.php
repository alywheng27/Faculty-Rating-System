<?php
    class Admin extends QueryRepo{
        function displayAdmin($dbc1){
            $admins = $this->getAdmin($dbc1, NULL);

            foreach ($admins as $admin) {
                echo '
                    <tr>
                        <td>'.$admin['FirstName'].' '.$admin['Surname'].'</td>
                        <td style="display: flex; column-gap: 5px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$admin['UserID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$admin['UserID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </td>
                    </tr>
                ';
            }
            
            
        }
    }

    $a = new Admin();

    $a->displayAdmin($dbc1);
    


?>