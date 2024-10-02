<div class="container">
    <button data-bs-toggle="modal" class="btn btn-success" data-bs-target="#addProduct">them san pham</button>
    <a href="./admin/export?export=excel" class="btn btn-primary">xuat excel</a><br>

    <br> <hr><hr>
    <form method="GET" action="">
        <label for="entries">Chọn số lượng sản phẩm hiển thị:</label>
        <select name="entries" id="entries" onchange="this.form.submit()">
            <option value="5" <?php echo ($entries == 5) ? 'selected' : ''; ?>>5</option>
            <option value="10" <?php echo ($entries == 10) ? 'selected' : ''; ?>>10</option>
            <option value="20" <?php echo ($entries == 20) ? 'selected' : ''; ?>>20</option>
        </select>
        ---------------------------------------------------------------------------------------------
        <label for="search">Tìm kiếm sản phẩm</label>
        <input type="text" placeholder="Nhập từ khoá..." name="search">
    </form>

    <table class="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Hình</th>
            <th>Giá</th>
            <th>Mô Tả</th>
            <th>Số Lượng</th>
            <th>Trạng thái</th>
            <th>Lượt bán</th>
            <th>Ngày Tạo</th>
            <th>Cập Nhật Cuối</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(empty($listProduct)){
            echo '<tr>
                    <td colspan="10"  class="text-center">'.$popup.'</td>
                </tr>';
        }
        foreach ($listProduct as $key => $productItem) {
            echo '<tr>
                    <td>'.$productItem['id'].'</td>
                    <td>'.$productItem['name'].'</td>
                    <td><img src="./Public/uploads/'.$productItem['img'].'" alt="Sản phẩm A" /></td>
                    <td>'.number_format($productItem['price'], 0, ',', '.') . " VND".'</td>
                    <td>'.$productItem['description'].'</td>
                    <td>'.$productItem['amount'].'</td>
                    <td>'.$productItem['status'].'</td>
                    <td>'.$productItem['selled'].'</td>
                    <td>'.$productItem['created_at'].'</td>
                    <td>
                        <a href="" title="View Details" class="text-success infoBtn" id=""><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;

                        <a href="" title="Edit" class="text-primary editBtnProduct" data-bs-toggle="modal" data-bs-target="#editProduct" id="'.$productItem['id'].'">
                        <i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;

                        <a href="./admin/deleteProduct/'.$productItem['id'].'" title="Delete" class="text-danger delBtn" id="">
                        <i class="fas fa-trash-alt fa-lg"></i>
                        </a>&nbsp;
                    </td>
                </tr>';
        }
        ?>
    </tbody>
</table> <br>
<div class="pageNagive">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a 
            class = "btn btn-primary ms-1"
            href="admin/product?page=<?= $i ?>
                                &entries=<?= $entries ?>
                                &search=<?= htmlspecialchars($search) ?>"
        <?= $i == $currentPage ? 'style="font-weight:bold;"' : '' ?>>
        <?= $i ?>
        </a>
    <?php endfor; ?>
</div>
<hr> <hr>


<!-- The Add Users Modal -->
<div class="modal" id="addProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="admin/createProduct" method="post" id="form-data" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div> <br>
                    <div class="form-group">
                        <select name="category" id="category">
                            <option value="0">-----Chọn danh mục-----</option>
                            <?php
                            foreach ($listCategories as $categoryItem) {
                                echo '<option value="'.$categoryItem['id'].'">'.$categoryItem['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div> <br>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" required>
                    </div> <br>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" placeholder="price" required>
                    </div> <br>
                    <div class="form-group">
                        <textarea width="100%" name="description" id="description" class="form-control" placeholder="description" cols="30" rows="5"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <input type="number" name="amount" class="form-control" placeholder="amount" required>
                    </div> <br>
                    <div class="form-group">
                        <input type="submit" name="insert" id="insert" class="btn btn-danger btn-block form-control" value="Add User">
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



<!-- The Add Users Modal -->
<div class="modal" id="editProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="admin/handleUpdateProduct" method="post" id="form-data" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nameProductEdit" id="nameProductEdit" class="form-control" placeholder="Name" required>
                        <input type="hidden" name="idProductEdit" id="idProductEdit" class="form-control">
                    </div> <br>
                    <div class="form-group">
                        <select name="categoryProductEdit" id="categoryProductEdit">
                            <option value="0">-----Chọn danh mục-----</option>
                            <?php
                            foreach ($listCategories as $categoryItem) {
                                echo '<option value="'.$categoryItem['id'].'">'.$categoryItem['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div> <br>
                    <div class="form-group">
                        <div id="imagePreview"></div>
                        <input type="file" name="imgProductEdit" id="imgProductEdit" class="form-control">
                    </div> <br>
                    <div class="form-group">
                        <input type="number" name="priceProductEdit" id="priceProductEdit" class="form-control" placeholder="price" required>
                    </div> <br>
                    <div class="form-group">
                        <textarea width="100%" name="descriptionProductEdit" id="descriptionProductEdit" class="form-control" placeholder="description" cols="30" rows="5"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <input type="number" name="amountProductEdit" id="amountProductEdit" class="form-control" placeholder="amount" required>
                    </div> <br>
                    <div class="form-group">
                        <input type="submit" name="" id="" class="btn btn-danger btn-block form-control" value="Add User">
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