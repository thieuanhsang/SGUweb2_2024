<link rel="stylesheet" href="./assets/css/myorderDetail.css">
<link rel="stylesheet" href="./assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<div id="content_myorderDetail">
    <div class="col-12">
        <h2 class="h3 mb-3 mt-3 text-black">Mã đơn hàng: <?php echo $idBill;?></h2>
    </div>

    <div class="col-12">
        <h4 class="mt-3 mb-3">Chi tiết đơn hàng</h4>
        <table class="table" style="font-size:12px;">
            <tbody>
                <?php 
                $billDetails = $dataBillDetail['dataBillDetail'];
                for ($i = 0; $i < count($billDetails); $i++): 
                    $detail = $billDetails[$i];
                ?>
                <tr>
                    <td colspan="4">
                        <?php echo ($i + 1) . ". " . $detail->getNameProduct() . " / " . "Black" . " / " . $detail->getIdProduct(); ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">
                        x <?php echo $detail->getQuanty(); ?>
                    </td>
                    <td>
                        <b><?php echo $detail->getTotalPrice(); ?></b>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <div class="col-12">
        <h4 class="mt-3 mb-3">Hóa đơn</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td style="text-align:right;">Tổng hóa đơn:</td>
                    <td><b><?php echo $totalPrice?></b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <a id="back-btn" href="http://localhost:8008/PHP/index.php?controller=profile&action=myOrder"> <button> Quay lại </button> </a>
</div>
