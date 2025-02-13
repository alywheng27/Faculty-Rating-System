<?php
    class Question extends QueryRepo{
        function displayQuestion($dbc1){
            $categories = $this->getCategory($dbc1, null);
            

            foreach ($categories as $category) {
                echo '<div class="list-group-item bg-secondary">
                        '.$category['Category'].'
                    </div>';

                echo '<div id="sortable'.$category['CategoryID'].'" class="list-group mb-5">';
                
                $questions = $this->getQuestion($dbc1, $category['CategoryID'], NULL);

                foreach ($questions as $question) {
                    echo '<div class="list-group-item" data-id="'.$category['CategoryID'].'-'.$question['Order'].'" draggable="false">
                            <span class="fa fa-arrows-alt"></span>&nbsp;&nbsp;&nbsp;'.$question['Question'].'
                            <div class="float-right">
                                <span class="badge badge-primary mr-5">'.$question['Order'].'</span>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit'.$question['QuestionID'].'"><i class="fas fa-edit nav-icon"></i><span class="ml-2 editButton">Edit</span></button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$question['QuestionID'].'"><i class="fas fa-trash nav-icon"></i><span class="ml-2 deleteButton"> Delete</span></button>
                            </div>
                        </div>';
                }
                echo '</div>';
            }

            
        }
    }

    $r = new Question();

    $r->displayQuestion($dbc1);
    


?>