<?php
    class Evaluation extends QueryRepo{
        function addEvaluation($dbc1, $evaluations, $raterID, $classID){
            try {
                $questions = $this->getQuestion($dbc1, null, null);
                $count = 0;

                foreach ($questions as $question) {
                    $query = "INSERT INTO answer (Answer, QuestionID, RaterID, ClassID)
                            VALUES (:evaluation, :questionID, :raterID, :classID) ";
                    $pdo = $dbc1->prepare($query);
                    $pdo->bindParam(':evaluation', $evaluations[$count]['Evaluation']);
                    $pdo->bindParam(':questionID', $question['QuestionID']);
                    $pdo->bindParam(':raterID', $raterID);
                    $pdo->bindParam(':classID', $classID);
                    $pdo->execute();

                    $count++;
                }

                $query = "UPDATE enrollment SET HasRated = 1 WHERE RaterID = :raterID AND ClassID = :classID";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':raterID', $raterID);
                $pdo->bindParam(':classID', $classID);
                $pdo->execute();

                $_SESSION['EvaluationAdded'] = true;
                unset($_SESSION['EnrollmentID']);
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $e = new Evaluation();

    $raterID = $_SESSION['id'];
    $enrollments = $e->getEnrollment($dbc1, null, $_SESSION['EnrollmentID'], null, null);
    $classID = $enrollments[0]['ClassID'];

    $categories = $e->getCategory($dbc1, null);
    $evaluations = [];
    $count = 0;
    foreach ($categories as $category) {
        $questions = $e->getQuestion($dbc1, $category['CategoryID'], NULL);
        foreach ($questions as $question) {
            $evaluations[$count] = array(
                'Evaluation' => $_POST['answer'.$category['CategoryID'].'-'.$question['QuestionID']],
            );

            $count++;
        }
    }

    $e->addEvaluation($dbc1, $evaluations, $raterID, $classID);
    
    header('Location: ?evaluation=true');
?>