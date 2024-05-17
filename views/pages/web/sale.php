<link rel="stylesheet"  href="./assets/css/sale.css">
<link rel="stylesheet"  href="./assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        
    <script src="assets/JavaScript/xulyajax.js"></script>
    <script src="assets/JavaScript/xulyajax_find.js"></script>

    <div id="content">
            <div id="div_slider_sale"></div>
            <div id="logo_slider_sale"></div>
            
            <hr id="line_sale">

            <div id="div_sale">
                <h1 id="title_sale">#SINGEDsale</h1>
                <h2 id="sub_sale">Sale up to 50% </h2>
            </div>

            <div id="list_product_sale">
                <?php foreach ($dataSale['sale'] as $product): ?>
                <div class="product">
                    <a href="http://localhost:8008/PHP/index.php?controller=product&action=product&idProduct=<?php echo $product->getIdProduct(); ?>&idStyle=<?php echo $product->getIdStyle();?>">
                            <div class="img_product" style="background-image: url(./assets/product/<?php echo $product->getImage(); ?>" alt="<?php echo $product->getNameProduct(); ?>)"> </div>
                    </a>
                    <div class="infor_product">
                        <a class="name_product"><?php echo $product->getNameProduct(); ?></a>
                        <div class="div_price">
                            <a class="price"><?php echo number_format($product->getPrice()); ?>đ</a>
                            <a class="old_price"><?php echo number_format($product->getOldPrice()); ?>đ</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>  

            <div class="pagination">
                <a id="<?php echo ($currentPage > 1) ? ($currentPage - 1) : $currentPage; ?>" href="#">&laquo;</a>
                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    
                    <a id="<?php echo $i;?>" href="#" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
                <a id="<?php echo ($currentPage < $totalPage) ? ($currentPage + 1) : $currentPage; ?>" href="#">&raquo;</a>
            </div>


        </div>
        