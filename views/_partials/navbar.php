<nav class="navbar navbar-expand-lg navbar-light border border-b">
  <a class="navbar-brand" href="/">
    <img src="<?php echo "/public/images/logo.png" ?>" alt="" srcset="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li>
        <?php if (isset($_SESSION['username'])) { ?>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $_SESSION['username'] ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <?php if (isset($_SESSION['Auth']) && $_SESSION['type'] == "receiver") { ?>
                <a class="dropdown-item" href="/receiver/dashboard">Dashboard</a>
              <?php } ?>
              <?php if (isset($_SESSION['Auth']) && $_SESSION['type'] == "hospital") { ?>
                <a class="dropdown-item" href="/hospital/dashboard">Dashboard</a>
                <a class="dropdown-item" href="/hospital/bloodsample/addbloodinfo">Add Sample</a>
                <a class="dropdown-item" href="/hospital/viewrequests">Blood Sample Requests</a>
              <?php } ?>
              <a class="dropdown-item" href="/logout">Logout</a>

            </div>
          </div>
        <?php } else { ?>
          <a class="btn btn-md btn-dark" href="/hospital/login">Hospital Login</a>
          <a class="btn btn-md btn-dark" href="/login">Receiver Login</a>
        <?php } ?>
      </li>
    </ul>
  </div>
</nav>