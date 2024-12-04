<?php include_once 'header.php'; ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Welcome the Cat Warrior page!!</a>
    </div>
</nav>
<div class="container">
    <div class="row grid-container">
        <div class="col grid-item" id="contentItem">
            <div class="container mt-2" id="contentDIV">
                <div class="row"> 
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">You need to register to start to play</h4>

                                <?php
                                if (isset($_GET['status']) && $_GET['status'] == "success") {
                                    header('Location: mainPage.php');
                                }
                                ?>

                                <div class="myForm">
                                    <form action="../controllers/login.php" method="POST">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="form_username" id="username"
                                                placeholder="Your username" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <div class="password-container">
                                                <span class="passwordIcon">
                                                    <i class="fa-solid fa-eye text-primary"
                                                        onclick="toggleVisibility('password')"></i>
                                                </span>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="Your password" />
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button class="btn btn-primary" name="submit"
                                                id="submit">Log in</button>
                                        </div>
                                        <?php
                                        require_once '../controllers/database.php';
                                        $query = 'SELECT * FROM users WHERE username = "' . $username . '";';
                                        $result = mysqli_query($connection, $query);
                    
                                        if (mysqli_num_rows($result) == 1) {
                                            header('Location: mainPage.php');
                                        }                    
                                        
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script>

    function toggleVisibility(inputName) {

        let input = document.getElementById(inputName);
        let attribute = input.getAttribute('type');

        if (attribute == 'password') {
            input.setAttribute('type', 'text');
        }
        else {
            input.setAttribute('type', 'password');
        }
    }

</script>

<?php include_once 'footer.php'; ?>