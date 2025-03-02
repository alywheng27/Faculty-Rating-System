<?php
    class Report extends QueryRepo{
        function displayReport($dbc1){
            $categories = $this->getCategory($dbc1, null);
            $count = 1;
            $total_score = [];
            foreach ($categories as $category) {
                echo '<table id="example'.$count.'" class="table table-bordered">';
                echo '<thead>
                        <tr>
                            <th width="75%">
                                '.$category['Category'].'
                            </th>
                            <th class="text-center">
                                5
                            </th>
                            <th class="text-center">
                                4
                            </th>
                            <th class="text-center">
                                3
                            </th>
                            <th class="text-center">
                                2
                            </th>
                            <th class="text-center">
                                1
                            </th>
                        </tr>
                    </thead>';

                echo '<tbody>';
                
                $questions = $this->getQuestion($dbc1, $category['CategoryID'], NULL);

                $score = 0;
                foreach ($questions as $question) {
                    $answers = $this->getAnswer($dbc1, $question['QuestionID'], $_SESSION['RaterID'], $_SESSION['ClassID']);
                    echo '
                            <tr>
                                <td>
                                    '.$question['Question'].'
                                </td>                           
                                <td class="text-center">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="5" id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-1" disabled="disabled"';
                                        if(!empty($answers)){
                                            if($answers[0]['Answer'] == 5){
                                                echo 'checked';
                                                $score += 5;
                                            }
                                        }
                                        echo '>
                                        <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-1">
                                        </label>
                                    </div>
                                </td>    
                                <td class="text-center">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="4" id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-2" disabled="disabled"';
                                        if(!empty($answers)){
                                            if($answers[0]['Answer'] == 4){
                                                echo 'checked';
                                                $score += 4;
                                            }
                                        }
                                        echo '>
                                        <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-2">
                                        </label>
                                    </div>
                                </td>    
                                <td class="text-center">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="3" id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-3" disabled="disabled"';
                                        if(!empty($answers)){
                                            if($answers[0]['Answer'] == 3){
                                                echo 'checked';
                                                $score += 3;
                                            }
                                        }
                                        echo '>
                                        <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-3">
                                        </label>
                                    </div>
                                </td>      
                                <td class="text-center">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="2" id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-4" disabled="disabled"';
                                        if(!empty($answers)){
                                            if($answers[0]['Answer'] == 2){
                                                echo 'checked';
                                                $score += 2;
                                            }
                                        }
                                        echo '>
                                        <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-4">
                                        </label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="answer'.$category['CategoryID'].'-'.$question['QuestionID'].'" value="1" id="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-5" disabled="disabled"';
                                        if(!empty($answers)){
                                            if($answers[0]['Answer'] == 1){
                                                echo 'checked';
                                                $score += 1;
                                            }
                                        }
                                        echo '>
                                        <label for="radioSuccess'.$category['CategoryID'].'-'.$question['QuestionID'].'-5">
                                        </label>
                                    </div>
                                </td>  
                            </tr>
                            
                        ';
                }
                echo '</tbody>';
                echo '<tfoot>';
                echo '<tr>
                        <th>
                            Score: 
                        </th>
                        <th class="text-center">
                        '.$score.'
                        </th>
                        <th class="text-center">
                        </th>
                        <th class="text-center">
                        </th>
                        <th class="text-center">
                        </th>
                        <th class="text-center">
                        </th>
                    </tr>';
                echo '</tfoot>';
                echo '</table>';

                $total_score[$count] = $score;
                $count++;
            }
            
            echo '<table class="table table-bordered mt-3">';
            echo '
                <thead>
                    <tr>
                        <th>
                            Areas of Evaluation
                        </th>
                        <th class="text-center">
                            Total Score
                        </th>
                        <th class="text-center">
                            Percentage (%)
                        </th>
                        <th class="text-center">
                            Formula (ts/hps * %)
                        </th>
                        <th class="text-center">
                            QCE Point
                        </th>
                    </tr>
                </thead>
            ';
            echo '<tbody>';
            $count = 1;
            $total_qce_point = 0;
            foreach ($categories as $category) {
                echo '
                    <tr>
                        <td>
                            '.$category['Category'].'
                        </td>
                        <td class="text-center">
                            '.$total_score[$count].'
                        </td>
                        <td class="text-center">
                            25%
                        </td>
                        <td class="text-center">
                            ('.$total_score[$count].' / 25) * 25
                        </td>
                        <td class="text-center">
                            '. ($total_score[$count] / 25) * 25 .'
                        </td>
                    </tr>
                ';

                $total_qce_point += ($total_score[$count] / 25) * 25;
                $count++;
            }
            echo '
                <tfoot>
                    <tr>
                        <th>
                            Total QCE Point
                        </th>
                        <th class="text-center">
                        </th>
                        <th class="text-center">
                        </th>
                        <th class="text-center">
                        </th>
                        <th class="text-center">
                            '.$total_qce_point.'
                        </th>
                    </tr>
                </tfoot>
            ';
            echo '</tbody>';
            echo '</table>';

            
        }
    }

    $r = new Report();

    $r->displayReport($dbc1);
    


?>