<?php
    class Supervisor extends QueryRepo{
        function addSupervisor($dbc1, $evaluations, $raterID, $rateeID){
            try {
                $questions = $this->getQuestion($dbc1, null, null);
                $count = 0;

                foreach ($questions as $question) {
                    $query = "INSERT INTO answersupervisor (Answer, QuestionID, RaterID, RateeID)
                            VALUES (:evaluation, :questionID, :raterID, :rateeID) ";
                    $pdo = $dbc1->prepare($query);
                    $pdo->bindParam(':evaluation', $evaluations[$count]['Supervisor']);
                    $pdo->bindParam(':questionID', $question['QuestionID']);
                    $pdo->bindParam(':raterID', $raterID);
                    $pdo->bindParam(':rateeID', $rateeID);
                    $pdo->execute();

                    $count++;
                }

                $query = "UPDATE enrollment SET HasRated = 1 WHERE RaterID = :raterID AND RateeID = :rateeID";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':raterID', $raterID);
                $pdo->bindParam(':rateeID', $rateeID);
                $pdo->execute();

                $_SESSION['SupervisorAdded'] = true;
                unset($_SESSION['EnrollmentID']);
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $e = new Supervisor();

    $raterID = $_SESSION['id'];
    $rateeID = $_SESSION['RateeID'];

    $categories = $e->getCategory($dbc1, null);
    $evaluations = [];
    $count = 0;
    foreach ($categories as $category) {
        $questions = $e->getQuestion($dbc1, $category['CategoryID'], NULL);
        foreach ($questions as $question) {
            $evaluations[$count] = array(
                'Supervisor' => $_POST['answer'.$category['CategoryID'].'-'.$question['QuestionID']],
            );

            $count++;
        }
    }

    $e->addSupervisor($dbc1, $evaluations, $raterID, $rateeID);
    
    header('Location: ?supervisor=true');
?>