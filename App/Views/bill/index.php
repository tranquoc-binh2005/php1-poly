<form action="./bill/getBill" method="post">
    <div class="container-bill">
        <div class="left-panel">
            <nav>
                <a href="#">Cart</a> &gt;
                <a href="#">Information</a> &gt;
                <a href="#">Shipping</a> &gt;
                <a href="#">Payment</a>
            </nav>
            <section class="contact-info">
                <p>Liên hệ</p>
                <?php
                if(isset($_SESSION['user'])){
                    echo '<p>'.$_SESSION['user']['name'].' ('.$_SESSION['user']['email'].')</p>';
                } 
                ?>
            </section>
            <section class="shipping-address">
                <h2>Địa chỉ giao hàng</h2>
                    <div class="form-group">
                        <label for="lastname">Họ</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Tên</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="province_id">Thành phố/Tỉnh</label>
                        <select id="province_id" name="province" required>
                            <option value="">Chọn Thành phố/Tỉnh</option>
                            <?php
                                foreach ($listProvince as $key => $value) {
                                    echo '<option value="'.$value['province_id'].'">'.$value['name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district_id">Quận/Huyện</label>
                        <select id="district_id" name="district" required>
                            <option value="">Chọn quận/huyện</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ward_id">Phường/Xã</label>
                        <select id="ward_id" name="ward" required>
                            <option value="">Chọn Phường/Xã</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ nhà, Đường cụ thể</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="address">So dien thoai</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
            </section>
            <section class="gift-service">
                <h2>Hình thức thanh toán</h2>
                <select style="width:100%;" name="hinhthucthanhtoan" id="" required>
                    <option value="momo">Momo</option>
                    <option value="cod">COD</option>
                </select>
            </section>
            <button type="submit" style="margin-left: 530px;" class="btn">Tiếp tục tới trang thanh toán</button>
            <p style="margin-top: -30px;">Thoát</p>
        </div>
    <div class="right-panel">
    <section class="voucher">
        <h2>Voucher</h2>
        <?php
            foreach ($listVoucher as $key => $value) {
                echo '<div class="voucher-code mt-02">
                        <p>'.$value['name'].'</p>
                        <p>'.$value['deal'].'%</p>
                        <input type="radio" name="btnAddVoucher" class="apply-btn" data-deal="'.$value['deal'].'">
                    </div>';
            }
        ?>
        <br> <hr> <hr>
        <section class="featured-programs">
            <div class="order-summary">
                <h2>Đơn hàng chuẩn bị thanh toán</h2>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $total += $value['price'] * $value['soluong'];
                    echo '<div class="order-item">
                            <p>Tên sản phẩm: '.$value['name'].'</p>
                            <p>Giá: '.number_format($value['price'], 0 , ',', '.')." VND".'</p>
                            <p>Số lượng: '.$value['soluong'].'</p>
                        </div>';
                }
                ?>
                <p id="tongtienthanhtoan">Tổng tiền:
                    <?php
                    echo number_format($total, 0, ',', '.')." VND";
                    ?>
                </p>
                <input type="hidden" name="tongtien" id="tongtien" value="<?=$total?>"> 
            </div>
        </section>
    </section>
    </div>
</div>
</form>