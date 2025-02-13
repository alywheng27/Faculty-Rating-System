<?php
    class QuestionDependency extends QueryRepo{
        function installQuestionDependency($dbc1){
            $categories = $this->getCategory($dbc1, NULL);

            foreach ($categories as $category) {
                echo '
                    $("#sortable'.$category['CategoryID'].'").sortable({
                        group: "list",
                        swap: true,
	                    swapClass: "highlight",
                        animation: 200,
                        ghostClass: "ghost",
                    })
                ';
            }

            echo '
                $("#setQuestion").click(function() {
                    let orderData = [];
                    ';
                    foreach ($categories as $category) {
                        echo 'orderData = orderData.concat($("#sortable'.$category['CategoryID'].'").sortable("toArray"));';
                    }

                    echo '
                        $.ajax({
                            type: "POST",
                            url: "?questionOrder=true",
                            data: {order: orderData},
                        });

                        $.ajax({
                            type: "get",
                            url: "?notification=true&QuestionSet=true",
                            success: function(data){
                                if(data == "QuestionSet"){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "center",
                                    showConfirmButton: false,
                                    timer: 3000
                                });

                                toastr.success("Question Set.");
                                }
                            }
                        });
                    ';
                    
                echo '})
            ';

            $questions = $this->getQuestion($dbc1, NULL, NULL);

            foreach ($questions as $question) {
                echo '
                    $(".select2Category'.$question['QuestionID'].'").select2();
                    $(".select2Order'.$question['QuestionID'].'").select2();
                ';
            }
        }
    }

    $rd = new QuestionDependency();

    $rd->installQuestionDependency($dbc1);
?>