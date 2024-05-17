<link rel="stylesheet"  href="./assets/css/billDetail.css">
<link rel="stylesheet"  href="./assets/css/sweetalert2.min.css">
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <h1 id="text-billDetail"> Danh sách chi tiết các sản phẩm </h1>
    <div id="test">
    <div class="column_product">
                <ul>    
                    <?php foreach ($dataBillDetail['dataBillDetail'] as $billDetail): ?>
                        <li id="product_cart">
                            <img class="img_product_cart" style="background-image: url(./assets/product/<?php echo $billDetail->getImage();?>);  width: 120px; height: 120px; background-size: cover; margin-left: 40px;">
                                <div class="infor_product_cart">
                                    <div class="vertical_column">
                                        <h3 class="name_product_cart"><?php echo $billDetail->getNameProduct();?></h3>
                                        <div class="parallel">
                                            <h4 class="color_product_cart">Màu</h4>
                                            <div class="display_color_cart last"></div>
                                    </div>
                                    <div class="parallel">
                                        <h4 class="size_product_cart">Size</h4>
                                        <h4 class="last">XL</h4>
                                    </div>
                                    <div class="parallel">
                                        <h4 class="quantity_product_cart">Số lượng: <?php echo $billDetail->getQuanty();?></h4>
                                    </div>
                                </div>
                                <div id="infor_price_product_cart">
                                    <h3 class="total_price_product_cart">Tổng giá : <?php echo $billDetail->getTotalPrice();?></h3>
                                </div>
                                </div>
					    </li>
                        <?php endforeach; ?>      
            </ul>
    </div>
        <div id="status_bill">
            <a href="#" onclick="confirmAction('confirm', <?php echo $idBill?>)"><button type="button" class="confirm">Xác nhận</button></a>
            <a href="#" onclick="confirmAction('cancel', <?php echo $idBill?>)"><button type="button" class="cancel">Hủy</button></a>
        </div>
    </div>


    <script>
function confirmAction(action, idBill) {
    var actionText = (action === 'confirm') ? 'Xác nhận' : 'Hủy';
    var confirmation = confirm("Bạn có chắc chắn muốn " + actionText + " hóa đơn này không?");
    if (confirmation) {
        if (action === 'confirm') {
            window.location.href = "http://localhost:8008/PHP/index.php?controller=admin&action=confirmBill&idBill=" + idBill;
        } else {
            window.location.href = "http://localhost:8008/PHP/index.php?controller=admin&action=cancelBill&idBill=" + idBill;
        }
    }
}
</script>