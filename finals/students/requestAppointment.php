<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="requestAppointment.css" />
    <title>Request Appointment</title>
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
        <li class="active">
          <a href="requestAppointment.php"><i class='bx bxs-phone'></i>Appointment</a>
        </li>
        <li>
          <a href="registrar.php"><i class="bx bx-group"></i>Registrar</a>
        </li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="logIn&signUp.php" class="logout">
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
      <!-- End of Dark Theme Toggle-->

      <main>
      <div class="header">
            <h1>Request Appointment</h1>
          </div>
        <div class="insights">
          
          <!-- TOR Card -->
          <div class="card" id="tor-card">
            <div class="card-front">
              <i class="bx bx-file"></i>
              <div class="info">
                <h3>TOR (Transcript of Records)</h3>
              </div>
            </div>
            <div class="card-back">
              <div class="requirements">
                <p>Requirements: Any valid ID</p>
              </div>
              <button class="appoint-now" onclick="appointNow('TOR')">Appoint Now</button>
            </div>
          </div>
  
  <script src="requestAppointment.js"></script>

  </body>
</html>
