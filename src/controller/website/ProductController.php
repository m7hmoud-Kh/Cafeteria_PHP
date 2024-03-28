<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php

require "./src/model/Product.php";

$product = new Product();
$data = $product->getProducts();

if (isset($_POST['search'])) {

    $product = new Product();
    $data = $product->search($_POST['dataSearch']);

} else if (isset($_POST[''])) {

    $data = $product->getProducts();

}

session_start();
if (isset($_GET['id'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    } else {
        if (!in_array($_GET['id'], $_SESSION['cart'])) {
            $_SESSION['cart'][] = $_GET['id'];
        }
    }
}

function clear_cart()
{
    // session_destroy();
    $_SESSION['cart'] = array();
}
if (isset($_POST['confirm_order'])) {

    clear_cart();
    header("Location:index.php");
}


?>

