<link rel="stylesheet"  href="./assets/css/pay.css">
<link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<div id="content_pay">
    <?php $cart = unserialize($_SESSION['cart']); $totalCart =  $cart['totalCart'];?>
    <?php $user = unserialize($_SESSION['user']); ?>

    <?php if (!empty($errorMessage)): ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <i class="fa-solid fa-money-check-dollar"></i>
    <h1 class="title_pay">Thanh toán</h1>
    <h4 class="title_check_pay"> Vui lòng kiểm tra thông Khách hàng, thông tin Hàng trước khi đặt. </h4>
    <div id="content_infor">

    <form action="http://localhost:8008/PHP/index.php?controller=pay&action=pay" method="POST" id="pay-form">
        <div id="content_infor_customer">
            <h4 class="title_infor_customer">Thông tin khách hàng</h4>
            <a class="text">Họ tên</a> <input class="input" name="name" value="<?php echo $user->getName();?>" required> 
            <a class="text">Địa chỉ</a> <input class="input" name="address" value="<?php echo $user->getAddress();?>"  required> 
            <a class="text">Số điện thoại</a> <input type="number" class="input" name="phone" value="<?php echo $user->getPhone();?>"  required> 
            <a class="text">Email</a> <input class="input" name="email" value="<?php echo $user->getEmail();?>" required> 
            <div id="check_box_pay">
                <h4 id="title_payment">Hình thức thanh toán</h4>
                <div>
                    <input type="radio" id="cash" name="paymentMethod" value="tienmat" required>
                    <label for="cash">Tiền mặt</label>
                </div>
                <div>
                    <input type="radio" id="transfer" name="paymentMethod" value="chuyenkhoan" required>
                    <label for="transfer">Chuyển khoản</label>
                </div>
            </div>
            <hr>
            <button type="submit" id="btn_order">Đặt hàng</button>
        </div>
    </form>

    <div id="content_infor_product">
    <div id="title_product">
        <h3>Sản phẩm</h3>
        <label><?php echo $totalCart->getQuantity(); ?></label>
    </div>
    <div id="infor_product">
        <ul>
            <?php foreach ($cart['itemCart'] as $item): ?>
                <div id="product_to_order">
                    <div id="name_price">
                        <h4 id="name_product"><?php echo $item->getProduct()->getNameProduct();?></h4>
                        <h4 id="price_product"><?php echo $item->getProduct()->getPrice();?></h4>
                        <h4 id="quantity_product">Số lượng : <?php echo $item->getQuantity(); ?></h4> <!-- Thêm dòng này để hiển thị số lượng sản phẩm -->
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </ul>									
    </div>
    <div id="total_price">Tổng thành tiền : <?php echo $totalCart->getTotalPrice(); ?></div>
    <div id="sale">
        <input class="code_sale" value="Mã khuyễn mãi">
        <button class="btn_code_sale">Xác nhận</button>
    </div>
</div>

    </div>
</div>
