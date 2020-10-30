<?php view('_partials.head', ['title' => 'View Blood Requests']); ?>

<body class="dash vh-100 d-flex-col">
    <div class="w-100">
        <?php view('_partials.navbar'); ?>
    </div>
    <div class="card-container d-flex flex-wrap h-100">
        <?php while ($request = $requests->fetch_assoc()) { ?>
            <div class="card mx-2 my-3" style="width: 18rem; height: 150px">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $request['fname'] . " " . $request['lname'] ?></h4>
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="card-subtitle mb-2 text-muted"><?php echo $request['blood_group'] ?></h5>
                        <h5 class="card-subtitle mb-2 text-muted"><?php echo $request['blood_unit'] ?> units</h5>
                    </div>
                    <p class="card-link"><?php echo $request['phone'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php view('_partials.footer'); ?>
</body>