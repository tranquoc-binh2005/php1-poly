<div class="container-bill">
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
            } else if($billItem['status'] == 'danggh'){
                $billItem['status'] = 'Đang giao hàng';
            } else if ($billItem['status'] == 'dagh'){
                $billItem['status'] = 'Đã giao hàng';
            } else {
                $billItem['status'] = 'Đã huỷ';
            
            }
            $btnStt = '<a href="./bill/detail/'.$billItem['id'].'">Xem chi tiết</a>';
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
</div>