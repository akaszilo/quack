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
                                <h4>You already have an account? <a href="indexLogin.php">Click here</a></h4>

                                <?php
                                if (isset($_GET['status']) && $_GET['status'] == "success") {
                                    header('Location: mainPage.php');
                                }
                                ?>

                                <div class="myForm">
                                    <form action="../controllers/register.php" method="POST">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="form_username" id="username"
                                                placeholder="Your username" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">E-mail</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Your E-mail" />
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
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password confirm</label>
                                            <div class="password-container">
                                                <span class="passwordIcon">
                                                    <i class="fa-solid fa-eye text-primary"
                                                        onclick="toggleVisibility('passwordConfirm')"></i>
                                                </span>
                                                <input type="password" class="form-control" name="passwordConfirm"
                                                    id="passwordConfirm" placeholder="Your password again" />
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button class="btn btn-primary" name="submit"
                                                id="submit">Registration</button>
                                        </div>
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