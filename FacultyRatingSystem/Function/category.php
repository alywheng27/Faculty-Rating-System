<?php
    class Category{
        function addCategory($dbc1, $category, $order){
            try {
                $query = "INSERT INTO category (category.Category, category.Order)
                        VALUES (:category, :order) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':category', $category);
                $pdo->bindParam(':order', $order);
                $pdo->execute();

                $_SESSION['CategoryAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateCategory($dbc1, $category, $order, $updateID){
            try {
                $query = "UPDATE category SET category.Category = :category, category.Order = :order WHERE CategoryID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':category', $category);
                $pdo->bindParam(':order', $order);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['CategoryUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteCategory($dbc1, $deleteID){
            try {
                $query = "DELETE FROM category WHERE CategoryID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['CategoryDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $c = new Category();

    if(!isset($_GET['deleteID'])){
        $category = $_POST['category'];
        $order = $_POST['order'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $c->updateCategory($dbc1, $category, $order, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $c->deleteCategory($dbc1, $deleteID);
    }else{
        $c->addCategory($dbc1, $category, $order);
    }
    
    header('Location: ?category=true');
?>