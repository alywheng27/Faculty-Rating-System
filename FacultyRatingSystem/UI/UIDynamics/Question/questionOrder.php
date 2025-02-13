<?php
    class QuestionOrder extends QueryRepo{
        function changeOrder($dbc1){
            $questions = $this->getQuestion($dbc1, null, null);
            $categories = $this->getCategory($dbc1, null);
            
            $questionIDs = [];
            $questionOrders = [];
            $questionIDs = [];
            $count = 0;
            foreach ($_POST['order'] as $order){
                $pos = strpos($order, '-');

                $categoryID = substr($order, 0, $pos);
                $questionIDs[$count] = $categoryID;

                $questionOrder = substr($order, $pos + 1);
                $questionOrders[$count] = $questionOrder;

                $questionID = $this->getQuestion($dbc1, $categoryID, $questionOrder);
                $questionIDs[$count] = array(
                    'QuestionID' => $questionID[0]['QuestionID'],
                );

                $count++;
            }            

            try {
                $count = 0;

                foreach ($questions as $question) {
                    $query = "UPDATE question SET CategoryID = :categoryID, question.Order = :order WHERE question.QuestionID = :questionID ";
                    $pdo = $dbc1->prepare($query);
                    $pdo->bindParam(':categoryID', $question['CategoryID']);
                    $pdo->bindParam(':order', $question['Order']);
                    $pdo->bindParam(':questionID', $questionIDs[$count]['QuestionID']);
                    $pdo->execute();

                    $count++;
                }
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $co = new QuestionOrder();

    $co->changeOrder($dbc1);
?>
        