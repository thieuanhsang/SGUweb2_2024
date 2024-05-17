<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/cart.php');
require_once('models/product.php');
require_once('models/style.php');

class CartController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }
  
  public function cart()
  {

    $style = style::getStyleProduct(); // Lấy danh sách các style  
    $dataStyle = array('style' => $style);

    $data = array('dataStyle' => $dataStyle);
    $this->render('cart', $data , null); // Thay đổi tên view
  }

  public function addCart(){
    $idProduct = isset($_GET['idProduct']) ? $_GET['idProduct'] : null;
    $idStyle = isset($_GET['idStyle']) ? $_GET['idStyle'] : null ; 
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
    
    $cart = unserialize($_SESSION['cart']);
    $cart = cart::addCart($idProduct,$cart,$quantity);

    $totalCart = $cart['totalCart'];
    $totalCart->setTotalPrice(cart::getTotalPriceCart($cart));
    $totalCart->setQuantity(cart::getTotalQuantyCart($cart));
    $cart['totalCart'] = $totalCart;
    
    $_SESSION['cart'] = serialize($cart) ;
    header("Location: http://localhost:8008/PHP/index.php?controller=product&action=product&idProduct=$idProduct&idStyle=$idStyle&message=true");
  }

  public function editCart(){
    $idProduct = $_GET['idProduct'];
    $quantity = $_GET['quantity'];

    $cart = unserialize($_SESSION['cart']);
    $cart = cart::editCart($idProduct,$quantity,$cart);

    $totalCart = $cart['totalCart'];
    $totalCart->setTotalPrice(cart::getTotalPriceCart($cart));
    $totalCart->setQuantity(cart::getTotalQuantyCart($cart));
    $cart['totalCart'] = $totalCart;

    $_SESSION['cart'] = serialize($cart) ;

    header("Location: http://localhost:8008/PHP/index.php?controller=cart&action=cart");
  }

  public function deleteAllCart(){
    $pay = isset($_GET['pay'])  ? $_GET['pay'] : false;

    if (isset($_SESSION['cart'])) {
        $cart = unserialize($_SESSION['cart']);
        $totalCart = new cart();
        $totalCart->setTotalPrice(0);
        $totalCart->setQuantity(0);
        $cart['totalCart'] = $totalCart; 
        $cart['itemCart'] =[];
        $_SESSION['cart'] = serialize($cart);
    }

    header("Location: http://localhost:8008/PHP/index.php?controller=cart&action=cart&pay=$pay");
  }

  public function deleteCart(){
    $idProduct = $_GET['idProduct'];

    $cart = unserialize($_SESSION['cart']);
    $cart = cart::deleteCart($idProduct, $cart);

    $totalCart = $cart['totalCart'];
    $totalCart->setTotalPrice(cart::getTotalPriceCart($cart));

    $_SESSION['cart'] = serialize($cart);
    
    header("Location: http://localhost:8008/PHP/index.php?controller=cart&action=cart");
  }

  public function error()
  {
    $this->render('error', null , null);
  }

}
