<?php require("../layout/header.php") ?>


<div class="container mt-3">
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Login</h4>
                    <p class="card-text">Welcome back!</p>
                    <!-- Form start -->
                    <form action="../controllers/c_login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="" required/>
                            <label for="email">Email address</label>
                        </div>
                        

                        <div class="passwordCointainer">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="" required/>
                                <label for="password">Password</label>
                                <i class="bi bi-eye password_eye" onclick="showPassword('password',this)"></i>
                            </div>
                        </div>


                        <div class="text-center">
                            <button class="btn btn-primary" name="submit" type="submit" id="submit">Login</button>
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