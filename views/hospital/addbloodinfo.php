<?php view('_partials.head', ['title' => 'Add Blood Sample']); ?>

<body class="dash vh-100 d-flex-col">
    <div class="w-100">
        <?php view('_partials.navbar'); ?>
    </div>
    <div class="container h-100">
        <div class="col-md-6 col-sm-10 mx-auto my-4">
            <center>
                <h2 class="my-2">Add Blood Sample</h2>
            </center>
            <form action="/hospital/addbloodsample" method="POST">
                <div class="form-group">
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
                <div class="form-group">
                    <input type="number" class="form-control" name="blood_unit" required placeholder="Enter Unit">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger">Add Sample</button>
                </div>
            </form>
        </div>

    </div>
    <?php view('_partials.footer'); ?>
</body>