<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="registrar.css" />
  <title>Registrar</title>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#" class="logo">
      <i class="bx bx-code-alt"></i>
      <div class="logo-name"><span>On_</span>A.ment</div>
    </a>
    <ul class="side-menu">
        <li>
          <a href="studentdashboard.php"><i class="bx bxs-dashboard"></i>Dashboard</a>
        </li>
        <li>
          <a href="requestDoc.php"><i class='bx bxs-folder'></i></i>Document</a>
        </li>
        <li>
          <a href="requestAppointment.php"><i class='bx bxs-phone'></i>Appointment</a>
        </li>
        <li class="active">
          <a href="registrar.php"><i class="bx bx-group"></i>Registrar</a>
        </li>
      </ul>
    <ul class="side-menu">
      <li>
        <a href="login.php" class="logout">
          <i class="bx bx-log-out-circle"></i>
          Logout
        </a>
      </li>
    </ul>
  </div>
  <!-- End of Sidebar -->

  <!-- Main Content -->
  <div class="content">
    <!-- Dark Theme Toggle -->
    <nav>
      <i class="bx bx-menu"></i>
      <input type="checkbox" id="theme-toggle" hidden />
      <label for="theme-toggle" class="theme-toggle"></label>
    </nav>
    <!-- End of Dark Theme Toggle -->

    <main>
      <div class="header">
        <h1>Registrar</h1>
      </div>

      <!-- Booking Options Section -->
      <div class="cards">
        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 1</div>
            <div class="card-back">Information for Name 1</div>
          </div>
        </div>
        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 2</div>
            <div class="card-back">Information for Name 2</div>
          </div>
        </div>
        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 3</div>
            <div class="card-back">Information for Name 3</div>
          </div>
        </div>
        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 4</div>
            <div class="card-back">Information for Name 4</div>
          </div>
        </div>

        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 5</div>
            <div class="card-back">Information for Name 5</div>
          </div>
        </div>
        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 6</div>
            <div class="card-back">Information for Name 6</div>
          </div>
        </div>
        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 7</div>
            <div class="card-back">Information for Name 7</div>
          </div>
        </div>
        <div class="card" onclick="flipCard(this)">
          <div class="card-inner">
            <div class="card-front">Name 8</div>
            <div class="card-back">Information for Name 8</div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="registrar.js"></script>

</body>
</html>
