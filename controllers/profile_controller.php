<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/style.php');
require_once('models/login.php');
require_once('models/bill.php');
require_once('models/billDetail.php');

class ProfileController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }
  
  public function profile(){   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    $data = array(
        'dataStyle' => $dataStyle // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
    );
     $this->render('profile', $data,null);
  }

  public function updateProfile(){   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }
    if(isset($_POST["post"])){
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];

      login::updateProfile($email,$phone,$address,$age,$gender);

      $user = login::getAccountUser($phone );
      $_SESSION['user'] = serialize($user);

      $response = "success";
      exit(json_encode($response));
    }
  }

  public function myOrder(){   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }
    
  $style = style::getStyleProduct(); // Lấy danh sách các style  
  $dataStyle = array('style' => $style);

  //$_SESSION['user'] = serialize($user);
  $user = unserialize($_SESSION['user']);

  $bill = bill::getBillsByPhone($user->getPhone());
  $dataBill = array('bill' => $bill);

  $data = array(
      'dataStyle' => $dataStyle, // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
      'dataBill' => $dataBill
  );
   $this->render('myorder', $data,null);
  }

  public function myOrderDetail(){   
    if (!isset($_SESSION['user_id'])) {
      header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
      exit; // Kết thúc chương trình sau khi chuyển hướng
  }
    
  $style = style::getStyleProduct(); // Lấy danh sách các style  
  $dataStyle = array('style' => $style);

  $idBill = isset($_GET['idBill']) ? $_GET['idBill'] : null;
  $totalPrice = isset($_GET['totalPrice']) ? $_GET['totalPrice'] : null;
  $billDetail = billDetail::getBillDetail($idBill);
  $dataBillDetail = array('dataBillDetail' => $billDetail);

  $data = array(
      'dataStyle' => $dataStyle, // Truyền danh sách tên style vào dữ liệu để sử dụng trong view
      'dataBillDetail'=>$dataBillDetail,
      'idBill' => $idBill,
      'totalPrice' => $totalPrice
  );

   $this->render('myorderDetail', $data,null);
  }

  public function error()
  {
    $this->render('error', null , null);
  }

}
