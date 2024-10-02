<div class="container-bill">
    <form action="./bill/getBill" method="post">
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
                <?php
                // print_r($_SESSION['cart'])
                ?>
                <h2>Hình thức thanh toán</h2>
                <select style="width:100%;" name="hinhthucthanhtoan" id="" required>
                    <option value="momo">Momo</option>
                    <option value="cod">COD</option>
                </select>
            </section>
            <button type="submit" style="margin-left: 530px;" class="btn">Tiếp tục tới trang thanh toán</button>
            <p style="margin-top: -30px;">Thoát</p>
        </div>
    </form>
    <div class="right-panel">
        <section class="voucher">
            <h2>Voucher</h2>
            <div class="voucher-code">
                <p>USER50K</p>
                <p>VOUCHER 50K CHO KHÁCH HÀNG ĐĂNG NHẬP TÀI KHOẢN</p>
                <button class="apply-btn">Đang áp dụng</button>
            </div>
        </section>
        <section class="featured-programs">
            <h2>Chương trình nổi bật</h2>
            <img src="https://thanhnien.mediacdn.vn/uploaded/dieutrang.qc/2021_08_27/levent/levents-4_MNTN.jpg?width=500"
                alt="">
        </section>
    </div>
</div>