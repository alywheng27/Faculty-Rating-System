<?php
    class Category extends QueryRepo{
        function displayCategory($dbc1){
            $categories = $this->getCategory($dbc1, null);

            foreach ($categories as $category) {
                echo '<div class="list-group-item" data-id="'.$category['Order'].'" draggable="false">
                        <span class="fa fa-arrows-alt"></span>&nbsp;&nbsp;&nbsp;'.$category['Category'].'
                        <div class="float-right">
                            <span class="badge badge-primary mr-5">'.$category['Order'].'</span>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$category['CategoryID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$category['CategoryID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                        </div>
                    </div>';
            }
        }
    }

    $r = new Category();

    $r->displayCategory($dbc1);
    


?>