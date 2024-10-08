<div class="system">
    <h1>Giỏ hàng</h1>
    <div class="system-row1">
        <section>
            <ul>
                <li>Sản phẩm</li>
                <li>Sl</li>
                <li>Gia</li>
                <li>Tổng tiền</li>
                <li></li>
            </ul>
        </section>
        <section>
            <?php
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo '<ul>
                        <li colspan="4" style="text-algin: center;">
                            Không có sản phẩm nào trong giỏ hàng
                        </li>
                      </ul>';
            } else {
                foreach ($_SESSION['cart'] as $cart) {
                    $total = (int)($cart['soluong'] * $cart['price']);
                    $totalPrice += $total;
                    echo '<ul>
                            <li>
                                <img src="./Public/uploads/'.$cart['img'].'" alt="">
                                <div>
                                    '.$cart['name'].'
                                </div>
                            </li>
                            <li>
                                '.number_format($cart['price'], 0, ',', '.'). " VND".'
                            </li>
                            <li>
                                <input style="width: 30px;" data-id="'.$cart["id"].'" data-price="'.$cart['price'].'" class="amountProductCart" type="number" value="'.$cart["soluong"].'" min="1">
                            </li>
                            <li id="totalPrice_'.$cart['id'].'">
                                '.number_format($total, 0, ',', '.'). " VND".'
                            </li>
                            <li>
                                <a href="./cart/deleteCart/'.$cart['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </li>
                        </ul>';
                }
            }
            ?>
        
        </section>
    </div>
    <div class="system-row2">
        <section>
            <ul>
                <li>Tổng</li>
                <li id="totalCartPrice">
                    <?php echo number_format($totalPrice, 0, ',', '.') . " VND"; ?>
                </li>
            </ul>
        </section>
        <section>
            <h2>
                <a href="./bill">Thanh toán</a>
            </h2>
        </section>
    </div>
    <div class="system-row3">
        <h2>
            <a href="./">Tiếp tục mua sắm</a>
        </h2>
    </div>
</div>
<div class="thank-you">
    “Cảm ơn vì đã chọn Thomas Nguyen để
    đồng hành trong nhiều khoảnh khắc đáng nhớ!”
</div>