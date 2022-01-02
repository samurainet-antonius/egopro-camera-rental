<header>
    <nav class="navbar navbar-expand-lg navigation-wrap">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="https://egoprojogja.com/storage/app/public/img/logo20210520045455.png" width="300"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-stream navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="explore.php">Explore Egopro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rental.php">Rental</a>
            </li>
            <?php if(!isset($_SESSION['member']) || empty($_SESSION['member'])): ?>
                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <li><a href="login.php" class="main-btn">Login</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <li><a href="profil.php" class="main-btn"><i class="fa fa-user"></i> Profil</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>