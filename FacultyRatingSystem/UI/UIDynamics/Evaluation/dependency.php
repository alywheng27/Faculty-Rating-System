<?php
    class QuestionDependency extends QueryRepo{
        function installQuestionDependency($dbc1){
            $categories = $this->getCategory($dbc1, NULL);

            

            $questions = $this->getQuestion($dbc1, NULL, NULL);

            
        }
    }

    $rd = new QuestionDependency();

    $rd->installQuestionDependency($dbc1);
?>