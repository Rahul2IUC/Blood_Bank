<?php
include __DIR__ . "/../../../app/application/core.php";
?>
<?php
$title = "signup";
include __DIR__ . "/../../_partials/head.php";
?>

<body class="signup-page vh-100">
<div class="w-100">
        <?php view('_partials.navbar'); ?>
    </div>
    <div class="form-container d-flex align-items-center  h-100 w-100">
        <div class="signup col-sm-10 col-md-8 col-lg-4 mx-auto">
            <div class="card p-4">
                <h2 class="font-title">Hospital Signup</h2>
                
                <?php if (isset($_SESSION['errors']) && sizeof($_SESSION['errors']) > 0) { ?>
                    <div class="alert alert-danger mb-0" role="alert">
                        <?php
                        foreach ($_SESSION['errors'] as $error) { ?>
                            <p class="m-0"><?= $error ?></p>
                        <?php } ?>
                    </div>
                <?php
                    unset($_SESSION['errors']);
                } ?>
                <form action="/hospital/signup" class="mt-3" method="POST">
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="text" class="form-control" name="name" placeholder="Hospital Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email_id" placeholder="Hospital Email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="password" class="form-control" name="password" placeholder="Create Password" required>
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Hospital Address" required>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button type="submit" class="btn btn-danger" name="signup">Signup</button>
                    </div>
                </form>
                <div class="text-center py-2">
                    <p>Already a partner?<span class="px-2"><a href="/hospital/login" class="font-ternary">Login</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <?php view('_partials.footer'); ?>
</body>

</html>