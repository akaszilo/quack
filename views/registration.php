<?php require("../layout/header.php") ?>


<div class="container mt-3">
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Registration</h4>
                    <p class="card-text">Input fields marked with * must be filled</p>

                    <?php if(isset($_GET["error"])){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        <strong>Holy guacamole!</strong>';
                        
                        echo "Something went wrong. Error: &lt ".$_GET["error"]." &gt";
                        
                        
                        echo '</div>';

                    } ?>

                    <!-- Form start -->
                    <form action="../controllers/c_register.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="" required />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder=""
                                required />
                            <label for="username">Username</label>
                        </div>

                        <div class="passwordCointainer">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder=""
                                    required />
                                <label for="password">Password</label>
                                <i class="bi bi-eye password_eye" onclick="showPassword('password',this)"></i>
                            </div>
                        </div>

                        <div class="passwordCointainer">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password_confirm"
                                    id="password_confirm" placeholder="" required />
                                <label for="password_confirm">Password Confirm</label>
                                <i class="bi bi-eye password_eye" onclick="showPassword('password_confirm',this)"></i>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" name="submit" type="submit" id="submit">Register</button>
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