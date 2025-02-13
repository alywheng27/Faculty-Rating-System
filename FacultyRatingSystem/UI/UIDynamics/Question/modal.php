<?php
class QuestionModal extends QueryRepo{
        function displayQuestion($dbc1){
            $questions = $this->getQuestion($dbc1, NULL, NULL);
            echo '
            <div class="modal fade" id="question">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Question</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?questionFunction=true" method="post">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control" placeholder="Question" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control select2Category select2-success" id="category" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $categories = $this->getCategory($dbc1, null);
                                foreach ($categories as $category) {
                                    echo '<option value="'.$category['CategoryID'].'">'.$category['Category'].'</option>';
                                }
                            echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="order">Order</label>
                            <select name="order" class="form-control select2Order select2-success" id="order" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                for ($i=1; $i <= 20; $i++) { 
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            echo '</select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            ';

            foreach ($questions as $question) {
                echo '
                    <div class="modal fade" id="edit'.$question['QuestionID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Question</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?questionFunction=true&updateID='.$question['QuestionID'].'" method="post">
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <input type="text" name="question" id="question" class="form-control" placeholder="Question" value="'.$question['Question'].'" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="category'.$question['QuestionID'].'">Category</label>
                                        <select name="category" class="form-control select2Category'.$question['QuestionID'].' select2-success" id="category'.$question['QuestionID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $categories = $this->getCategory($dbc1, null);
                                            foreach ($categories as $category) {
                                                if($category['CategoryID'] == $question['CategoryID']) {
                                                    echo '<option value="'.$category['CategoryID'].'" selected>'.$category['Category'].'</option>';
                                                }else {
                                                    echo '<option value="'.$category['CategoryID'].'">'.$category['Category'].'</option>';
                                                }
                                                
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="order'.$question['QuestionID'].'">Order</label>
                                        <select name="order" class="form-control select2Order'.$question['QuestionID'].' select2-success" id="order'.$question['QuestionID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            for ($i=1; $i <= 20; $i++) { 
                                                if($i == $question['Order']) {
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                            }
                                        echo '</select>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
      
                    <div class="modal fade" id="delete'.$question['QuestionID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Question</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this question?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?questionFunction=true&deleteID='.$question['QuestionID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new QuestionModal();

    $rm->displayQuestion($dbc1);
    


?>