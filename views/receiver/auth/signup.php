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
    <div class="form-container d-flex align-items-center h-100 w-100 p-3 mb-2 ">
        <div class="signup col-sm-10 col-md-8 col-lg-4 mx-auto">
            
            <div class="card p-4">
                <h2 class="font-title mb-3">Sign Up</h2>

                <?php if (isset($_SESSION['errors']) && sizeof($_SESSION['errors']) > 0) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($_SESSION['errors'] as $error) { ?>
                            <p class="mb-0"><?= $error ?></p>
                        <?php } ?>
                    </div>
                <?php
                    unset($_SESSION['errors']);
                } ?>
                <form action="/signup" method="POST">
                    <div class="d-flex">
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="fname" required placeholder="First Name">
                        </div>
                        <div class="form-group ml-2">
                            <input type="text" class="form-control" name="lname" required placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email_id" required placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" required placeholder="Enter phone number">
                    </div>

                    <div class="d-flex">
                        <div class="form-group mr-2">
                            <input type="password" class="form-control" name="password" required placeholder="Enter password">
                        </div>
                        <div class="form-group ml-2">
                            <input type="password" class="form-control" name="confirm password" required placeholder="Confirm password">
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<label for="inputState">State</label>-->
                        <select name="blood_group" id="inputState" class="form-control">
                            <option selected>Choose Blood Group...</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </div>
                    <div class="d-flex mt-3 justify-content-center">
                        <button type="submit" class="btn btn-danger" name="signup">Sign Up</button>
                    </div>
                </form>
                <div class="text-center py-2 text-dark">
                    <p>Already have an account?<span class="px-1"><a href="/login" class="font-ternary">Login</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <?php view('_partials.footer'); ?>
</body>

</html>