<?php view('_partials.head', ['title' => 'Dashboard | Hospital']); ?>
<body class="dash vh-100 d-flex-col">
    <div class="w-100">
        <?php view('_partials.navbar'); ?>
    </div>
    <div class="col-md-7 mx-auto h-100">
        <div class="d-flex justify-content-between py-5">
            <h4>
                Available Samples
            </h4>
            <a href="/hospital/bloodsample/addbloodinfo" class="btn btn-md btn-primary">Add Sample</a>
        </div>
        <table class="table table-hover table-striped">
            <!-- On rows -->
            <thead>
                <tr class="table-primary">
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Blood Group</th>
                    <th class="text-center" scope="col">Units</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; while ($sample = $samples->fetch_assoc()) { ?>
                    <tr class="table-secondary">
                        <td class="text-center"><?= $i ?></td>
                        <td class="text-center">
                            <?php echo $sample['blood_type'] ?>
                        </td>
                        <td class="text-center"><?php echo $sample['unit'] ?></td>
                    </tr>
                    <p></p>
                <?php $i++;} ?>

            </tbody>
        </table>
    </div>
    <div class="w-100">
        <?php view('_partials.footer'); ?>
    </div>
</body>