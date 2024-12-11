<?php
    require_once("functionAdmin.php");
    $StudentInfo = getStudentInfo();

    if(isset($_POST['delete-button'])){
      $id = $_POST['id-delete'];
      deleteStudent($id);
      header("Location: students.php");
      exit();        
  }
?>  

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="students.css" />
    <title>Students</title>
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="" class="logo">
        <i class="bx bx-code-alt"></i>
        <div class="logo-name"><span>On_</span>A.ment</div>
      </a>
      <ul class="side-menu">
        <li>
          <a href="admindashboard.php"><i class="bx bxs-dashboard"></i>Dashboard</a>
        </li>
        <li class="active">
          <a href="students.php"><i class="bx bx-group"></i>Students</a>
        </li>
        <li>
          <a href="documents.php"><i class='bx bxs-folder'></i></i>Documents</a>
        </li>
        <li>
          <a href="appointments.php"><i class='bx bxs-phone'></i>Appointments</a>
        </li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="index.php" class="logout">
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
          <h1>Students</h1>
        </div>

        <div class="bottom-data">
          <div class="orders">
        
          <table>
              <thead>
                <tr>
                  <th>Student Number</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Course</th>
                  <th>Email</th>
                  <th>Password</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($StudentInfo as $student):?>
                <tr>
                    <td><?php echo $student['StudentNumber']; ?></td>
                    <td><?php echo $student['FirstName']; ?></td>
                    <td><?php echo $student['LastName']; ?></td>
                    <td><?php echo $student['Course']; ?></td>
                    <td><?php echo $student['Email']; ?></td>
                    <td><?php echo $student['Password']; ?></td>
                    <td>
                        <form action="students.php" method="post">
                            <input type="hidden" name="id-delete" value="<?php echo $student['ControlNumber'] ?>">
                            <button type="submit" name="delete-button" id="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>

      </main>
    </div>
    <script src="students.js"></script>
  </body>
</html>