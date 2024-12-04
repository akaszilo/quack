<?php require_once "../layouts/header.php"; ?>

<div class="row justify-content-center">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
        <h1>Exercises</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card exerciseContainer">
            <div class="card-body">
                <h4 class="card-title">Exercise form</h4>
                <p class="card-text">Exercise detail</p>
                <div class="mt-3">
                    <form method="GET">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="input1" id="input1" placeholder="Input">
                            <label for="input1">Input 1:</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-dark" name="submit">Solution</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "../layouts/footer.php"; ?>
