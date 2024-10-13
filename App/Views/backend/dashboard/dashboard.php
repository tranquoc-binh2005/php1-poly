<div class="container">
    <div class="container-grid">
        <div class="box">Tổng khách hàng
            <p>
            <?php
            echo ($countUser['countUser'])
            ?>
            </p>
        </div>
        <div class="box">Tổng Sản phẩm
            <p>
            <?php
            echo ($countProduct['countProduct'])
            ?>
            </p>
        </div>
        <div class="box">Tổng Đơn hàng (<?=$countBill['countBill']?> Đơn hàng cần xác nhận)
            <p>
            <?php
            echo ($countBillTotal['countBill'])
            ?>
            </p>
        </div>
        <div class="box">Doanh thu tháng 
        <?php
        list($year, $month) = explode('-', $total_price[0]['month']);

        $formattedMonth = $month . '-' . $year;
        
        echo $formattedMonth;
        ?>
        <p>
            <?php
            echo number_format($total_price[0]['total_amount'], 0, ',', '.');
            ?>
            </p>
        </div>
    </div>
</div>