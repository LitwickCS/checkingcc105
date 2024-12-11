
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="studentdashboard.css" />
  <title>Dashboard</title>
</head>

<body>
  <!-- Sidebar and Content Wrapper -->
  <div class="dashboard-page">
    <!-- Sidebar (unchanged) -->
    <div class="sidebar">
      <a href="#" class="logo">
        <i class="bx bx-code-alt"></i>
        <div class="logo-name"><span>On_</span>A.ment</div>
      </a>
      <ul class="side-menu">
        <li class="active">
          <a href="studentdashboard.php"><i class="bx bxs-dashboard"></i>Dashboard</a>
        </li>
        <li>
          <a href="requestDoc.php"><i class='bx bxs-folder'></i></i>Document</a>
        </li>
        <li>
          <a href="requestAppointment.php"><i class='bx bxs-phone'></i>Appointment</a>
        </li>
        <li>
          <a href="registrar.php"><i class="bx bx-group"></i>Registrar</a>
        </li>
      </ul>
    <ul class="side-menu">
      <li><a href="#" class="logout"><i class="bx bx-log-out-circle"></i>Logout</a></li>
    </ul>
    </div>

    <!-- Content Section -->
    <div class="content">
      <nav>
        <i class="bx bx-menu"></i>
        <input type="checkbox" id="theme-toggle" hidden />
        <label for="theme-toggle" class="theme-toggle"></label>
      </nav>

      <!-- Dashboard Main Content -->
      <main>
        <!-- Header Section -->
        <div class="header">
          <h1>Welcome to On_A.ment, </h1>
        </div>

       
        <!-- Key Stats Section -->
        <section class="stats">
          <div class="stat-card">
            <h4>Total Requested Documents</h4>
            <p>0</p>
          </div>
          <div class="stat-card">
            <h4>Total Appointments</h4>
            <p>0</p>
          </div>
        </section>        
      </main>
    </div>
  </div>
 

  <script src="studentdashboard.js"></script>
</body>

</html>