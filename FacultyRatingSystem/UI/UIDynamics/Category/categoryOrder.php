<?php
    class CategoryOrder extends QueryRepo{
        function changeOrder($dbc1){
            $categories = $this->getCategory($dbc1, null);
            
            $categoryNames = [];
            $count = 0;
            foreach ($_POST['order'] as $order){
                $categoryName = $this->getCategory($dbc1, $order);
                $categoryNames[$count] = array(
                    'Category' => $categoryName[0]['Category'],
                );

                $count++;
            }            

            try {
                $count = 0;
                foreach ($categories as $category) {
                    $query = "UPDATE category SET category.Order = :order WHERE category.Category = :category ";
                    $pdo = $dbc1->prepare($query);
                    $pdo->bindParam(':order', $category['Order']);
                    $pdo->bindParam(':category', $categoryNames[$count]['Category']);
                    $pdo->execute();

                    $count++;
                }
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $co = new CategoryOrder();

    $co->changeOrder($dbc1);
?>
        