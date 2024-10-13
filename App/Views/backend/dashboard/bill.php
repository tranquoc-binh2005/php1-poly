<div class="container">
    <form action="./admin/bill" method="get">
        <select name="selectBill" id="selectBill" onchange="this.form.submit()">
            <option value="chuaxn" <?php if($status == "chuaxn") { echo "selected"; } ?>>Đơn hàng cần xác nhận</option>
            <option value="danggh" <?php if($status == "danggh") { echo "selected"; } ?>>Đơn hàng đang xử lý</option>
            <option value="dagh" <?php if($status == "dagh") { echo "selected"; } ?>>Danh sách đơn hàng thành công</option>
            <option value="huygh" <?php if($status == "huygh") { echo "selected"; } ?>>Danh sách đơn hàng thất bại</option>
        </select>
    </form> <hr><hr>
    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên KH</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // print_r($listBill);
            foreach ($listBill as $key => $billItem) {
                if($billItem['status'] == 'chuaxn'){
                    $billItem['status'] = 'Chưa xác nhận';
                    $btnStt = '<a href="./admin/updateStatusBill/'.$billItem['id'].'">Xác nhận</a>';
                } else if($billItem['status'] == 'danggh'){
                    $billItem['status'] = 'Đang giao hàng';
                    $btnStt = '<a href="./admin/destroyBill/'.$billItem['id'].'">Huỷ giao hàng</a>';
                } else if ($billItem['status'] == 'dagh'){
                    $billItem['status'] = 'Đã giao hàng';
                    $btnStt = '<a href="./admin/detailBill/'.$billItem['id'].'">Xem chi tiết</a>';
                } else {
                    $billItem['status'] = 'Đã huỷ';
                    $btnStt = '<a href="./admin/detailBill/'.$billItem['id'].'">Xem chi tiết</a>';
                }
                echo '<tr>
                        <td>'.$billItem['id'].'</td>
                        <td>'.$billItem['name'].'</td>
                        <td>'.number_format($billItem['total'], 0, ',','.').' VND</td>
                        <td>'.$billItem['status'].'</td>
                        <td>'.$billItem['created_at'].'</td>
                        <td>
                            '.$btnStt.'
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
    <hr><hr>
</div>