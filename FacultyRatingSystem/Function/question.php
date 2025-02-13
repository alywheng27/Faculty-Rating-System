<?php
    class Question{
        function addQuestion($dbc1, $question, $category, $order){
            try {
                $query = "INSERT INTO question (Question, CategoryID, question.Order)
                        VALUES (:question, :category, :order) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':question', $question);
                $pdo->bindParam(':category', $category);
                $pdo->bindParam(':order', $order);
                $pdo->execute();

                $_SESSION['QuestionAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateQuestion($dbc1, $question, $category, $order, $updateID){
            try {
                $query = "UPDATE question SET question.Question = :question, question.CategoryID = :category, question.Order = :order WHERE QuestionID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':question', $question);
                $pdo->bindParam(':category', $category);
                $pdo->bindParam(':order', $order);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['QuestionUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteQuestion($dbc1, $deleteID){
            try {
                $query = "DELETE FROM question WHERE QuestionID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['QuestionDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $q = new Question();

    if(!isset($_GET['deleteID'])){
        $question = $_POST['question'];
        $category = $_POST['category'];
        $order = $_POST['order'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $q->updateQuestion($dbc1, $question, $category, $order, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $q->deleteQuestion($dbc1, $deleteID);
    }else{
        $q->addQuestion($dbc1, $question, $category, $order);
    }
    
    header('Location: ?question=true');
?>