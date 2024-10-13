<header>
    <div class="strong-header">
        <a class="phone-hotline" href="#">
            <h3>Hotline: 113</h3>
        </a>
        <?php
        if(isset($_SESSION['user'])){
            echo '<a class="log" href="">
                        <span>Xin chào <strong>'.$_SESSION['user']['name'].'</h2></strong></span>
                    </a>
                    <a class="log" href="auth/logout">
                        <span>Đăng xuất</span>
                    </a>';
        } else {
            echo '<a class="log" href="auth/login">
                    <h3>Đăng nhập</h3>
                </a>
                <a class="log" href="auth/register">
                    <h3>Đăng kí</h3>
                </a>';
        }
        ?>
        <a href="./cart"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
</header>
<nav>
    <div class="strong-nav">
        <a href="#">
            <h2>Adam Store</h2>
        </a>
        <ul>
            <li>
                <a href="for-me.html">Giới thiệu</a>
            </li>
            <li>
                <a href="product">Danh mục sản phẩm</a>
                <ul>
                    <?php
                        foreach ($listCategories as $categoriesItem) {
                            echo '<div>
                                    <a href="">'.$categoriesItem['name'].'</a>
                                </div>';
                        }
                    ?>
                </ul>
                
            </li>
            <li>
                <a href="conect.html">Liên hệ</a>
            </li>
        </ul>
    </div>
</nav>
<div class="picture-header">
    <img src="./Public/img/header.webp" alt="">
    <div class="search">
        <input type="search" placeholder="Hôm nay mặc gì ?">
        <input type="submit">
    </div>
</div>