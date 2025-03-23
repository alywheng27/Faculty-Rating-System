<?php
    class Evaluation extends QueryRepo{
        function displayEvaluation($dbc1){
            $categories = $this->getCategory($dbc1, null);
            
            foreach ($categories as $category) {
                echo '<div class="list-group-item bg-secondary">
                        <div class="row">
                            <div class="col-6">
                                '.$category['Category'].'
                            </div>
                            <div class="offset-md-2 col-md-4">
                                <div class="row text-center">
                                    <div class="offset-md-2 col-md-2">
                                        5
                                    </div>
                                    <div class="col-md-2">
                                        4
                                    </div>
                                    <div class="col-md-2">
                                        3
                                    </div>
                                    <div class="col-md-2">
                                        2
                                    </div>
                                    <div class="col-md-2">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

                echo '<div id="sortable'.$category['CategoryID'].'" class="list-group mb-5">';
                
                $questions = $this->getQuestion($dbc1, $category['CategoryID'], NULL);

                foreach ($questions as $question) {
                    echo '<div class="list-group-item" data-id="'.$category['CategoryID'].'-'.$question['Order'].'" draggable="false">
                            <div class="row">
                                <div class="col-6">
                                    '.$question['Question'].'
                                </div>
                                <div class="offset-md-2 col-md-4">
                                    <div class="row text-center">
                                        <div class="offset-md-2 col-md-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="5" required id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-1">
                                                <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-1">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="4" required id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-2">
                                                <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-2">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="3" required id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-3">
                                                <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-3">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="2" required id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-4">
                                                <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-4">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="1" required id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-5">
                                                <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-5">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>';
                }
                echo '</div>';
            }

            
        }
    }

    $r = new Evaluation();

    $r->displayEvaluation($dbc1);
    


?>