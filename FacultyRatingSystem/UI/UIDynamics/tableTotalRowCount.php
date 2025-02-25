<?php
    class TableTotalRowCount extends QueryRepo{
        function displayTableTotalRowCount($dbc1){
            $total = $this->getTableTotalRowCount($dbc1);

            foreach ($total as $count) {
                echo $count['RaterCount'].',';
                echo $count['RateeCount'].',';
                echo $count['SubjectCount'].',';
                echo $count['ClassCount'].',';
                echo $count['CategoryCount'].',';
                echo $count['QuestionCount'].',';
                echo $count['EnrollmentCount'].',';
                echo $count['UserCount'].',';
            }
            echo '0,';
        }
    }

    $ttrc = new TableTotalRowCount();

    $ttrc->displayTableTotalRowCount($dbc1);
?>