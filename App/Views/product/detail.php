<div class="container-prd-adam">
    <div class="name-prd">
        <h1>
            VEST NHUNG XANH TĂM - TXVN28
        </h1>
    </div>
    <form action="./cart/addCart/<?=$product['id']?>" id="formAddCart" method="post">
        <div class="prd-adam">
            <section>
                <img src="./Public/uploads/<?=$product['img']?>" alt="">
            </section>
                <section class="price-prd">
                    <h2><?=$product['name']?></h2>
                    <div><?=$product['description']?></div> <br>
                    <div class="prd-size">
                        <p>Size</p>
                        <p>
                            <a href="#">Lên lịch đo may</a>
                        </p>
                    </div>
                    <div class="prd-size">
                        <p>Số lượng</p>
                        <p>
                            <input style="width: 30px" min="1" max="10" type="number" name="soluong" id="soluong">
                        </p>
                    </div>
                    <div class="prd-buy">
                        <p>
                            <a href="#" id="btnAddCart">Thêm vào giỏ hàng</a>
                        </p>
                        <p>
                            <a href="shop.html">Mua ngay</a>
                        </p>
                        <p>
                            <a href="">Chat ngay đặt hàng</a>
                        </p>
                    </div>
                    <div class="prd-customer">
                        <p>
                            Hãy để lại SĐT, chuyên viên tư vấn của chúng tôi sẽ gọi ngay cho bạn miễn phí!
                        </p> <br>
                        <input type="text" placeholder="Tên khách hàng">
                        <input type="number" placeholder="Số điện thoại liên hệ">
                        <input type="submit" placeholder="Gửi">
                    </div>
                </section>
        </div>
    </form>
    <div class="detaile-product">
        <h1>Mọi chi tiết by Designed Thomas Nguyen</h1>
        <div class="det-prd">
            <section>
                <img src="./Public/img/BANNER-ao-blazer-1.png" alt="">
            </section>
            <section>
                <img src="./Public/img/BANNER-ao-blazer-2.png" alt="">
            </section>
            <section class="det-abc">
                <div class="abc">
                    <img src="./Public/img/BANNER-ao-blazer-3.png" alt="">
                </div>
                <div>
                    <img src="./Public/img/BANNER-chu-ao-blazer.png" alt="">
                </div>
            </section>
        </div>
    </div>
    <div class="pr-product">
        <h1>
            MAY ĐO ÁO KHOÁC VEST & BLAZER
        </h1>
        <div class="pr-abc">
            <section>
                <p>
                    <img src="./Public/img/icon-VEST.png" alt="">
                </p>
                <span>
                    <h3>
                        Thiết kế theo yêu cầu của bạn
                    </h3>
                    <p>
                        Hãy nói về những kiểu dáng mà bạn yêu thích, Thomas Nguyen sẽ biến nó thành phong cách riêng của bạn.
                    </p>
                </span>
            </section>
            <section>
                <p>
                    <img src="./Public/img/icon-MaY-MAY.png" alt="">
                </p>
                <span>
                    <h3 style= "color: black;">
                        Đảm bảo sự vừa vặn hoàn hảo
                    </h3>
                    <p style= "color: black;">
                        Được fitting thủ công bởi những tailor lành nghề để bạn luôn cảm thấy tự tin và thoải mái.
                    </p>
                </span>
            </section>
            <section>
                <p>
                    <img src="./Public/img/NGOI-NHA.png" alt="">
                </p>
                <span>
                    <h3>
                        Tư vấn và lấy số đo tận nơi
                    </h3>
                    <p>
                        Chỉ cần đặt lịch hẹn, bạn sẽ được tư vấn chọn vải, kiểu dáng và lấy số đo trực tiếp tại nhà.
                    </p>
                </span>
            </section>
            <section>
                <p>
                    <img src="./Public/img/icon-VaI (1).png" alt="">
                </p>
                <span>
                    <h3>
                        Vải may bền đẹp và cao cấp
                    </h3>
                    <p>
                        Đây là chìa khóa giúp bạn sở hữu bộ vest hợp thời trang, form dáng chuẩn và bền đẹp theo thời gian.
                    </p>
                </span>
            </section>
        </div>
    </div>
    <div class="before-after">
        <div class="content-bf-at">
            <h2>
                VẺ ĐẸP CỦA SỰ PHÓNG KHOÁNG
            </h2>
            <span>
                Vốn được sinh ra bởi sự phá cách, blazer mang đậm vẻ đẹp nam tính và phóng khoáng. 
                Giúp các quý ông xây dựng hình ảnh hiện đại, mới mẻ. Đã đến lúc bạn cần thiết kế cho mình 
                một chiếc áo blazer may đo tinh tế. Khẳng định phong cách và chất riêng của mình.
            </span>
        </div>
        <div class="pic-bf-at">
            <img src="./Public/img/bf at.png" alt="">
        </div>
    </div>
    <div class="sew-product">
        <h1>Chi tiết tạo nên bộ vest đẹp</h1>
        <div class="sew-column-01">
            <div>
                <img src="./Public/img/CANH-TOC.png" alt="">
                <p>
                    <h4>
                        Canvas
                    </h4>
                    <span>
                        Canvas bằng phương pháp may zic zac tỉ mỉ và làm hoàn toàn thủ công giúp định hình form ngực chuẩn.
                    </span>
                </p>
            </div>
            <div>
                <img src="./Public/img/VAI-AO.png" alt="">
                <p>
                    <h4>
                        Vai áo vest
                    </h4>
                    <span>
                        Vai áo vest vừa vặn, mộng vai tròn đều, không nhăn nhúm, khi nhìn chính diện sẽ cảm thấy vai áo như xuôi nhẹ về hai bên
                    </span>
                </p>
            </div>
            <div>
                <img src="./Public/img/VE-AO.png" alt="">
                <p>
                    <h4>
                        Ve áo vest
                    </h4>
                    <span>
                        Ve vest phẳng, lượn nhẹ, không nhăn, ôm theo ngực áo, khi gài nút 2 ve áo tạo thành hình chữ V cân đối.
                    </span>
                </p>
            </div>
        </div>
        <div class="sew-column-02">
            <div>
                <img src="./Public/img/EO.png" alt="">
                <p>
                    <h4>
                        Phần eo
                    </h4>
                    <span>
                        Thân áo ôm theo sóng lưng tạo thắt eo tự nhiên, che khuyết điểm giúp tôn lên dáng người cân đối.
                    </span>
                </p>
            </div>
            <div>
                <img src="./Public/img/TAY-AO.png" alt="">
                <p>
                    <h4>
                        Tay áo vest
                    </h4>
                    <span>
                        Tay áo vest ôm theo dáng tay người mặc và để lộ từ 1 – 1.5cm tay áo sơ mi bên trong.
                    </span>
                </p>
            </div>
            <div>
                <img src="./Public/img/TUI-AO.png" alt="">
                <p>
                    <h4>
                        Túi áo vest
                    </h4>
                    <span>
                        Cơi túi êm, phẳng, vuông vức, che kín được miệng túi, viền túi đều, có tính thẩm mỹ cao.
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="history-product">
        <div class="his-row-1">
            <h1>
                Sản phẩm liên quan
            </h1>
        </div>
        <div class="his-row-2">
            <?php
            // print_r($getRelatedProducts);
            foreach ($getRelatedProducts as $value) {
                echo '<section>
                        <img src="./Public/uploads/'.$value['img'].'" alt="">
                        <div class="sale-off">
                            <a class="btn btn-primary" href="./product/detail/'.$value['id'].'">More</a>
                        </div>
                    </section>';
            }
            ?>
        </div>
    </div>
</div>
<div class="thank-you">
            “Cảm ơn vì đã chọn Thomas Nguyen để
    đồng hành trong nhiều khoảnh khắc đáng nhớ!”
</div>