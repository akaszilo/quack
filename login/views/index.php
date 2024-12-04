<?php require_once("../layout/header.php"); ?>
<?php
require_once "../controllers/database.php";
$query = "Select * from products;";
$result = mysqli_query($conn, $query);

$product = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($product, $row);
}
?>

<div class="container">
    <h1>Hello <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : "idegen"; ?></h1>

    <div class="row">
        <?php foreach ($product as $key => $value) { ?>
            <div class="col-3">
                <div class="card productCard mt-5">
                    <img class="card-img-top p-1" src="../public/img/<?php echo $value["image"] ?>" alt="Title" />
                    <div class="card-body">
                        <h4 class="card-title text-truncate"><?php echo $value["name"] ?></h4>
                        <p class="card-text text-truncate"><?php echo $value["description"] ?></p>
                        <form action="../controllers/c_cart.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="qty" id="qty" placeholder="" value="1" />
                                <input type="hidden" name="productID" id="productID" value="<?php echo $value["id"] ?>">
                                <input type="hidden" name="productName" id="productName"
                                    value="<?php echo $value["name"] ?>">
                                <input type="hidden" name="productPrice" id="productPrice"
                                    value="<?php echo $value["price"] ?>">

                                <label for="qty">Quantity</label>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" name="toCart" id="toCart">
                                    <i class="bi bi-basket3"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price per Unit</th>
                            <th scope="col">Price Sum</th>
                            <th scope="col" colspan="2">Actions</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_sum = 0;
                        if (isset($_SESSION["cart"])) {
                            foreach ($_SESSION["cart"] as $key => $value) {
                                $total_sum += $value["price"] * $value["qty"]; ?>
                                <tr class="">
                                    <td scope="row"><?php echo $value["name"]; ?> </td>
                                    <td class="">
                                        <form action="../controllers/c_cart.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $value["id"]; ?>">
                                            <input type="number" class="fomr-control qty" name="qty"
                                                value="<?php echo $value["qty"]; ?>">
                                    </td>
                                    <td><?php echo $value["price"]; ?></td>
                                    <td><?php echo $value["price"] * $value["qty"]; ?></td>
                                    <td>
                                        <button class="btn btn-warning" name="updateCart">Refresh</button>

                                    </td>
                                    <td>

                                        <button class="btn btn-danger" name="deleteItem">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end fw-bolder">Sum</td>
                            <td colspan="1" class="tetx-start fw-bolder">$<?php echo $total_sum; ?> USD</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end fw-bolder"></td>
                            <td colspan="1" class="tetx-center fw-bolder">
                                <form action="../controllers/c_checkout.php" method="post">
                                    <button class="btn btn-success" name="submit">
                                        Order Items
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>

</div>



<?php require_once("../layout/footer.php"); ?>