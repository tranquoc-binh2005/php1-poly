<div class="container">
    <button data-bs-toggle="modal" data-bs-target="#addVoucher">them ma giam gia</button>

    <br> <hr><hr>
    <table class="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Slug</th>
            <th>%</th>
            <th>Ngày Tạo</th>
            <th>Ngày Het han</th>
            <th>Cập Nhật Cuối</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listVoucher as $key => $VoucherItem) {
            echo '<tr>
                    <td>'.$VoucherItem['id'].'</td>
                    <td>'.$VoucherItem['name'].'</td>
                    <td>'.$VoucherItem['slug'].'</td>
                    <td>'.$VoucherItem['deal'] ."%".'</td>
                    <td>'.$VoucherItem['created_at'].'</td>
                    <td>'.$VoucherItem['dated_at'].'</td>
                    <td>
                        <a href="" title="Edit" class="text-primary btnEditVoucher" id="'.$VoucherItem['id'].'" data-bs-toggle="modal" data-bs-target="#updateVoucher" id="">
                        <i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;

                        <a href="./admin/delVoucher/'.$VoucherItem['id'].'" title="Delete" class="text-danger delBtn" id="">
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
<div class="modal" id="addVoucher">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh mục sản phẩm</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="./admin/createVoucher" method="post" id="form-data" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    </div> <br>
                    
                    <div class="form-group">
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" readonly>
                    </div> <br>

                    <div class="form-group">
                        <input type="number" name="deal" id="deal" min="1" max="100" class="form-control" placeholder="% Giam gia" required>
                    </div> <br>

                    <div class="form-group">
                        <label for="">Ngay bat dau</label>
                        <input type="date" name="created" id="created" class="form-control" placeholder="date" required>
                    </div> <br>

                    <div class="form-group">
                        <label for="">Ngay ket thuc</label>
                        <input type="date" name="dated" id="dated" class="form-control" placeholder="date" required>
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

<!-- The Update Voucher Modal -->
<div class="modal" id="updateVoucher">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật danh mục sản phẩm</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="./admin/handleUpdateVoucher" method="post" id="form-data" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nameVoucherEdit" id="nameVoucherEdit" class="form-control" placeholder="Name" required>
                        <input type="hidden" name="idVoucherEdit" id="idVoucherEdit" class="form-control" placeholder="Name" required>
                    </div> <br>
                    
                    <div class="form-group">
                        <input type="text" name="slugVoucherEdit" id="slugVoucherEdit" class="form-control" placeholder="Slug" readonly>
                    </div> <br>

                    <div class="form-group">
                        <input type="number" name="dealVoucherEdit" id="dealVoucherEdit" class="form-control" placeholder="Deal" required>
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