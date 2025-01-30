<?php
    class QueryRepo {
        function getRater($dbc1){
            $query = "SELECT * FROM rater JOIN raterType ON rater.raterTypeID = raterType.raterTypeID";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $raters = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $raters[$count] = array(
                    'RaterID' => $row['RaterID'],
                    'RaterIDNumber' => $row['RaterIDNumber'],
                    'FirstName' => $row['FirstName'],
                    'MiddleName' => $row['MiddleName'],
                    'Surname' => $row['Surname'],
                    'RaterType' => $row['RaterType'],
                    'Password' => $row['Password'],
                );

                $count++;
            }

            return $raters;
        }

        function getRaterType($dbc1){
            $query = "SELECT * FROM raterType";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $raterTypes = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $raterTypes[$count] = array(
                    'RaterTypeID' => $row['RaterTypeID'],
                    'RaterType' => $row['RaterType'],
                );

                $count++;
            }

            return $raterTypes;
        }

        function getRatee($dbc1){
            $query = "SELECT * FROM ratee JOIN rateeType ON ratee.rateeTypeID = rateeType.rateeTypeID";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $ratees = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $ratees[$count] = array(
                    'RateeID' => $row['RateeID'],
                    'RateeIDNumber' => $row['RateeIDNumber'],
                    'FirstName' => $row['FirstName'],
                    'MiddleName' => $row['MiddleName'],
                    'Surname' => $row['Surname'],
                    'RateeType' => $row['RateeType'],
                    'Password' => $row['Password'],
                );

                $count++;
            }

            return $ratees;
        }

        function getRateeType($dbc1){
            $query = "SELECT * FROM rateeType";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $rateeTypes = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $rateeTypes[$count] = array(
                    'RateeTypeID' => $row['RateeTypeID'],
                    'RateeType' => $row['RateeType'],
                );

                $count++;
            }

            return $rateeTypes;
        }

        function getSubject($dbc1){
            $query = "SELECT * FROM subject ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $subjects = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $subjects[$count] = array(
                    'SubjectID' => $row['SubjectID'],
                    'Subject' => $row['Subject'],
                    'SubjectDescription' => $row['SubjectDescription'],
                );

                $count++;
            }

            return $subjects;
        }

        function getAcademicYear($dbc1, $active){
            $query = "SELECT * FROM AcademicYear";
            if($active == true){
                $query = $query . " WHERE IsActive = 1 ";
            }
            $query = $query . " ORDER BY AcademicYear DESC ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $academicYears = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $academicYears[$count] = array(
                    'AcademicYearID' => $row['AcademicYearID'],
                    'AcademicYear' => $row['AcademicYear'],
                );

                $count++;
            }

            return $academicYears;
        }

        function getSemester($dbc1, $active){
            $query = "SELECT * FROM Semester ";
            if($active == true){
                $query = $query . " WHERE IsActive = 1 ";
            }
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $semesters = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $semesters[$count] = array(
                    'SemesterID' => $row['SemesterID'],
                    'Semester' => $row['Semester'],
                );

                $count++;
            }

            return $semesters;
        }

        function getClass($dbc1){
            $query = "SELECT * FROM class 
                JOIN subject ON subject.SubjectID = class.SubjectID
                JOIN ratee ON ratee.RateeID = class.RateeID
                JOIN academicyear ON academicyear.AcademicYearID = class.AcademicYearID
                JOIN semester ON semester.SemesterID = class.SemesterID ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $classes = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $classes[$count] = array(
                    'ClassID' => $row['ClassID'],
                    'Class' => $row['Class'],
                    'SubjectID' => $row['SubjectID'],
                    'Subject' => $row['Subject'],
                    'RateeID' => $row['RateeID'],
                    'FirstName' => $row['FirstName'],
                    'Surname' => $row['Surname'],
                    'AcademicYearID' => $row['AcademicYearID'],
                    'AcademicYear' => $row['AcademicYear'],
                    'SemesterID' => $row['SemesterID'],
                    'Semester' => $row['Semester'],
                );

                $count++;
            }

            return $classes;
        }

        function getCategory($dbc1, $order){
            $query = "SELECT * FROM category ";
            if($order != null){
                $query = $query . " WHERE category.Order = :order ";
            }
            $query = $query . " ORDER BY category.Order ";
            
            $pdo = $dbc1->prepare($query);
            if($order != null){
                $pdo->bindParam(':order', $order);
            }
            $pdo->execute();
            
            $categories = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $categories[$count] = array(
                    'CategoryID' => $row['CategoryID'],
                    'Category' => $row['Category'],
                    'Order' => $row['Order'],
                );

                $count++;
            }

            return $categories;
        }


        function getVoter($dbc1){
            $query = "SELECT * FROM voter ORDER BY Name";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $voters = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $voters[$count] = array(
                    'ID' => $row['ID'],
                    'IDNumber' => $row['IDNumber'],
                    'Name' => $row['Name'],
                    'Password' => $row['Password'],
                    'HasVoted' => $row['HasVoted'],
                );

                $count++;
            }

            return $voters;
        }

        function getUser($dbc1){
            $query = "SELECT * FROM user ORDER BY FirstName";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $users = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $users[$count] = array(
                    'ID' => $row['ID'],
                    'FirstName' => $row['FirstName'],
                    'Surname' => $row['Surname'],
                    'Username' => $row['Username'],
                    'Password' => $row['Password'],
                );

                $count++;
            }

            return $users;
        }

        function getTableTotalRowCount($dbc1) {
            $query = "SELECT * FROM tablestotalrowcountview ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $total = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $total[$count] = array(
                    'PositionCount' => $row['PositionCount'],
                    'PartyCount' => $row['PartyCount'],
                    'CandidateCount' => $row['CandidateCount'],
                    'VoterCount' => $row['VoterCount'],
                );

                $count++;
            }

            return $total;
        }

        function getParticipant($dbc1) {
            $query = "SELECT * FROM participantview ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();
            
            $participants = [];
            $count = 0;
            while($row = $pdo->fetch(PDO::FETCH_ASSOC)){
                $participants[$count] = array(
                    'VoterCount' => $row['VoterCount'],
                    'NonVoterCount' => $row['NonVoterCount'],
                );

                $count++;
            }

            return $participants;
        }

        function key(){
            return "KLPR-P*OE-%LED-QA!R-JJFR";
        }

    }

    $queryRepoMain = new QueryRepo();



?>