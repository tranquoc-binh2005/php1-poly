<div class="container">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategories">them danh muc</button>

    <br> <hr><hr>
    <table class="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Slug</th>
            <th>Ngày Tạo</th>
            <th>Cập Nhật Cuối</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listCategories as $key => $categoriesItem) {
            echo '<tr>
                    <td>'.$categoriesItem['id'].'</td>
                    <td>'.$categoriesItem['name'].'</td>
                    <td>'.$categoriesItem['slug'].'</td>
                    <td>'.$categoriesItem['created_at'].'</td>
                    <td>
                        <a href="" title="Edit" class="text-primary editBtn" id="'.$categoriesItem['id'].'" data-bs-toggle="modal" data-bs-target="#updateCategories" id="">
                        <i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;

                        <a href="./admin/deleteCategories/'.$categoriesItem['id'].'" title="Delete" class="text-danger delBtn" id="">
                        <i class="fas fa-trash-alt fa-lg"></i>
                        </a>&nbsp;
                    </td>
                </tr>';
        }
        ?>
    </tbody>
</table> <br>
<hr> <hr>

<!-- The Add Users Modal -->
<div class="modal" id="addCategories">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh mục sản phẩm</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="admin/createCategories" method="post" id="form-data" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    </div> <br>
                    
                    <div class="form-group">
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" readonly>
                    </div> <br>

                    <div class="form-group">
                        <input type="submit" name="insert" id="insert" class="btn btn-danger btn-block form-control" value="Them">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Update Categories Modal -->
<div class="modal" id="updateCategories">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật danh mục sản phẩm</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="./admin/handleUpdateCategories" method="post" id="form-data" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nameCategoriesEdit" id="nameCategoriesEdit" class="form-control" placeholder="Name" required>
                        <input type="hidden" name="idCategoriesEdit" id="idCategoriesEdit" class="form-control" placeholder="Name" required>
                    </div> <br>
                    
                    <div class="form-group">
                        <input type="text" name="slugCategoriesEdit" id="slugCategoriesEdit" class="form-control" placeholder="Slug" readonly>
                    </div> <br>

                    <div class="form-group">
                        <input type="submit" name="" id="" class="btn btn-danger btn-block form-control" value="Sửa">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</div>