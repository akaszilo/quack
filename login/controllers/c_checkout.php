<?php

session_start();

require_once("database.php");

if (isset($_POST["submit"])) {
    if (isset($_SESSION["cart"])) {
        if (!empty($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];

            if (isset($_SESSION["username"])) {
                $query = "SELECT MAX(order_id) from orders;";
                $result = mysqli_query($conn, $query);

                $order_id = mysqli_fetch_row($result)[0];

                if ($order_id == null) {
                    $order_id = 1;
                } else {
                    $order_id++;
                }
                $userID = $_SESSION["userid"];

                foreach ($cart as $key => $value) {
                    $query = "INSERT INTO orders (order_id, user_id, product_id, quantity)
                    VALUES ($order_id, $userID, " . $value['id'] . "," . $value["qty"] . ");";

                    mysqli_query($conn, $query);

                }
                $_SESSION["cart"] = null;
                header("Location:../views/index.php?status=OrderComplete");



            } else {
                die("Please login to order!");
            }
        } else {
            die("empty cart");
        }
    } else {
        die("you dont have a cart");
    }
} else {
    die("dont cheat");
}