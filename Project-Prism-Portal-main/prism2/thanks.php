<?php
include("includes/header.php");
include("includes/navbar.php");
// include("includes/form.php");
// include("config.php");
?>

<div class="container text-center mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card p-5 shadow-lg border-0 rounded-3">
                <div class="card-body">
                    <div class="mb-4">
                    <i class="fa-solid fa-circle-envelope text-success" style="font-size: 60px;"></i>
                        <!-- <i class="fas fa-envelope-circle-check ></i> -->
                    </div>
                    <h1 class="card-title fw-bold text-primary mb-3">Thanks For Submitting!</h1>
                    <p class="card-text text-muted mb-4">Your message has been successfully sent. We'll get back to you soon.</p>
                    <a href="./index.php" class="btn btn-primary btn-lg btn-sm rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Go Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("includes/footer.php");
?>
