<?php
    require_once("functionAdmin.php");
    $docs = getDocInfo();

    if(isset($_POST['delete-button'])){
      $id = $_POST['id-delete'];
      deleteDoc($id);
      header("Location: documents.php");
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
    <link rel="stylesheet" href="documents.css" />
    <title>Documents</title>
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
        <li>
          <a href="students.php"><i class="bx bx-group"></i>Students</a>
        </li>
        <li class="active">
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
          <h1>Documents</h1>
        </div>

        <div class="bottom-data">
          <div class="orders">
          <div class="header">
              <i class="bx bx-receipt"></i>
              <h3>COR (Certificate of Registration)</h3>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Student Number</th>
                  <th>Preferred Date of Retrieval</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php foreach($docs as $doc):?>
                <tr>
                    <td><?php echo $doc['StudentName']; ?></td>
                    <td><?php echo $doc['StudentNumber']; ?></td>
                    <td><?php echo $doc['Date']; ?></td>
                    <td>
                        <form action="documents.php" method="post">
                            <input type="hidden" name="id-delete" value="<?php echo $doc['ControlNumber'] ?>">
                            <button type="submit"  name="delete-button" id="delete-btn">Delete</button>
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