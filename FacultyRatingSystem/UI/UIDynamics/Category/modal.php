<?php
    class CategoryModal extends QueryRepo{
        function displayCategory($dbc1){
            $categories = $this->getCategory($dbc1, null);
            echo '
            <div class="modal fade" id="category">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?categoryFunction=true" method="post">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control" placeholder="Category" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="order">Order</label>
                            <select name="order" class="form-control select2Order select2-success" id="order" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                for ($i=1; $i <= 20; $i++) { 
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            echo '</select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            ';

            foreach ($categories as $category) {
                echo '
                    <div class="modal fade" id="edit'.$category['CategoryID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?categoryFunction=true&updateID='.$category['CategoryID'].'" method="post">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" name="category" id="category" class="form-control" placeholder="Category" value="'.$category['Category'].'" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="order'.$category['CategoryID'].'">Order</label>
                                        <select name="order" class="form-control select2Order'.$category['CategoryID'].' select2-success" id="order'.$category['CategoryID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            for ($i=1; $i <= 20; $i++) { 
                                                if($i == $category['Order']) {
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                            }
                                        echo '</select>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
      
                    <div class="modal fade" id="delete'.$category['CategoryID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this category?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?categoryFunction=true&deleteID='.$category['CategoryID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new CategoryModal();

    $rm->displayCategory($dbc1);
    


?>