<link rel="stylesheet" href="./assets/css/myorder.css">
<link rel="stylesheet" href="./assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<div id="content_order">
    <div class="col-12">
        <h2 class="h3 mb-3 text-black">Đơn hàng của tôi</h2>
        <div class="row">
            <?php if (isset($dataBill) && is_array($dataBill['bill'])): ?>
                <?php $i = 1; ?>
                <?php foreach ($dataBill['bill'] as $bill): ?>
                    <div class="alert alert-light col-12" role="alert">
                        <h5 class="alert-heading">
                            <?php echo $i; ?>.
                            <span> Mã đơn hàng : <?php echo $bill->getIdBill();?> / Ngày </span>
                            <?php echo $bill->getOrderDate(); ?>
                        </h5>
                        <p>
                            <span>Quần Dài Lưng Gài Ống Đứng Vải Denim Đứng Dáng Trơn Dáng Vừa Đơn Giản PREMIUM 58 / Xanh Rêu / 32 ... và 2 sản phẩm khác</span>
                        </p>
                        <hr>
                        <p class="mb-0">
                            Tổng hóa đơn: <b><?php echo $bill->getTotalQuanty(); ?></b> / Thành tiền: <b><?php echo $bill->getTotalPrice(); ?></b>
                        </p>
                        <p class="font-weight-light mb-2">Tình trạng đơn hàng: <mark><?php echo $bill->getStatus(); ?></mark></p>
                        <div class="alert alert-primary" role="alert">
                            <a href="http://localhost:8008/PHP/index.php?controller=profile&action=myorderDetail&idBill=<?php echo $bill->getIdBill();?>&totalPrice=<?php echo $bill->getTotalPrice();?>" class="alert-link">Xem chi tiết</a>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <h1>Bạn chưa đặt bất kì đơn hàng nào !</h1>
            <?php endif; ?>
        </div>
    </div>
</div>
