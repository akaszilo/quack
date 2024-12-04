<?php require_once "../layouts/header.php" ?>

<div class="row justify-content-center">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
        <h1>Registration Form</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card exerciseContainer">
            <div class="card-body">
                <h4 class="card-title">Register User</h4>
                <p class="card-text text-danger">Input fields marked with * must be filled.</p>

                <?php
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "regcomplete") {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '<strong>Registration success!</strong> Please proceed to login.';
                        echo '</div>';
                    }
                } ?>

<?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "empty") {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '<strong>Registration incomplete!</strong> Fill every input.';
                        echo '</div>';
                    }
                } ?>

                <div class="mt-3">
                    <form action="../controllers/register.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Input">
                            <label for="username">Username<sup>*</sup>:</label>
                        </div>
                        <div class="passwordContainer mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Input">
                                <label for="password">Password<sup>*</sup>:</label>
                            </div>
                            <i class="bi bi-eye passwordIcon" onclick="passwordToggle(this, 'password')"></i>
                        </div>
                        <div class="passwordContainer mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password_confirm"
                                    id="password_confirm" placeholder="Input">
                                <label for="password_confirm">Password confirm<sup>*</sup>:</label>
                            </div>
                            <i class="bi bi-eye passwordIcon" onclick="passwordToggle(this, 'password_confirm')"></i>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Input">
                            <label for="email">E-mail<sup>*</sup>:</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-dark" name="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let passwordToggle = (icon, input) => {
        let eyeIcon = icon;
        let passwordInput = document.getElementById(input);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");

        }
        else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    };
</script>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>


<?php require_once "../layouts/footer.php" ?>