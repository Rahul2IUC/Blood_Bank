<?php
include __DIR__ . '/../app/application/core.php';
?>
<?php
view('_partials.head', ['title' => 'Home']);
?>

<body class="vh-100 d-flex-col">
    <?php include __DIR__ . '/_partials/navbar.php' ?>
    <div class="container d-flex-col mh-75 my-5">
        <h1 class="mb-4" style="color: #000">Available Blood Samples</h1>

        <div class="card-container d-flex flex-wrap h-100">
            <?php while ($sample = $samples->fetch_assoc()) { ?>
                <div class="card mx-2 my-3" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title text-uppercase"><?php echo $sample['name'] ?></h4>
                        <div class="d-flex justify-content-between w-100">
                            <h5 class="card-subtitle mb-2 text-muted"><i class="fa fa-tint text-danger" aria-hidden="true"></i><span class="ml-2"><?php echo $sample['blood_type'] ?></span></h5>
                            <h5 class="card-subtitle mb-2 text-muted"><?php echo $sample['unit'] ?> units</h5>
                        </div>
                        <p class="card-text mb-0 text-capitalize"><i class="fa fa-home" aria-hidden="true" ></i><span class="ml-2"><?php echo $sample['address'] ?></span></p>
                        <p class="card-text mb-0"><i class="fa fa-phone" aria-hidden="true"></i><span class="ml-2">+91 - <?php echo $sample['phone'] ?></span></p>
                    </div>
                    <div class="card-footer">
                        <form action="/receiver/requestsample" method="POST">
                            <input type="text" name="hospital_id" hidden value="<?= $sample['hospital_id'] ?>">
                            <input type="text" name="blood_type" hidden value="<?= $sample['blood_type'] ?>">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Enter number of units"
                                name="bloodunitrequest">
                            </div>
                            <button type="submit" class="btn btn-dark btn-md my-2 btn-block">Request Sample</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include __DIR__ . '/_partials/footer.php' ?>
</body>

</html>