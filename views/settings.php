<?php require("../layout/header.php");?>


<div class="container mt-3">
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile settings</h4>
                    <p class="card-text">Input fields marked with * must be filled</p>

                    <?php if(isset($_GET["error"])){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        <strong>Holy guacamole!</strong>';
                        
                        echo "Something went wrong. Error: &lt ".$_GET["error"]." &gt";
                        
                        
                        echo '</div>';

                    } ?>

                    <!-- Form start -->
                    <form action="../controllers/c_settings.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="" 
                            required value="<?php echo $_SESSION["userEmail"];?>" disabled/>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder=""
                                required value="<?php echo $_SESSION["username"]?>" />
                            <label for="username">Username</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-warning" name="submit" type="submit" id="submit">Update</button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>

        </div>
        <div class="col"></div>
    </div>
</div>




<?php require("../layout/footer.php") ?>