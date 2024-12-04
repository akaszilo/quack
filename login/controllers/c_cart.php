<?php

if (isset($_POST["toCart"])) {

    $productName = $_POST["productName"];
    $productID = $_POST["productID"];
    $qty = $_POST["qty"];
    $productPrice = $_POST["productPrice"];
    session_start();
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];

        $prodExists = false;
        foreach ($cart as $key => $cartItem) {
            if ($cartItem['id'] == $productID) {
                $cart[$key]['qty'] += $qty;
                $prodExists = true;
                break;
            }
        }
        if (!$prodExists) {
            $product = array('id' => $productID, 'name' => $productName, "qty" => $qty, "price" => $productPrice);
            array_push($cart, $product);
        }
        $_SESSION["cart"] = $cart;
        header('Location:../views/index.php?status=ItemAdded');

    } else {
        $product = array('id' => $productID, 'name' => $productName, "qty" => $qty, "price" => $productPrice);
        $_SESSION['cart'] = array($product);
        header('Location:../views/index.php?status=ItemAdded');
    }

} else if (isset($_POST['updateCart'])) {
    session_start();
    $qty = $_POST["qty"];
    $id = $_POST["id"];

    $cart = $_SESSION["cart"];

    $prodExists = false;
    foreach ($cart as $key => $cartItem) {
        if ($cartItem['id'] == $id) {
            $cart[$key]['qty'] = $qty;
            $prodExists = true;
            break;
        }
    }
    if (!$prodExists) {die("Cheater!");}
    $_SESSION["cart"] = $cart;
    header("Location:../views/index.php?status=cartUpdated");

}
else if(isset($_POST["deleteItem"])) {
    session_start();
     
    $id = $_POST["id"];

    $cart = $_SESSION["cart"];

    $prodExists = false;
    foreach ($cart as $key => $cartItem) {
        if ($cartItem['id'] == $id) {
            array_splice($cart, $key,1);
            $prodExists = true;
            break;
        }
    }
    if (!$prodExists) {die("Cheater!");}
    $_SESSION["cart"] = $cart;
    header("Location:../views/index.php?status=cartUpdated");
}