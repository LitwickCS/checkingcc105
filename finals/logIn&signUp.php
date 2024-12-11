<?php
session_start();
require_once("function.php");

if (isset($_POST['save-info'])) {
  $studentNumber = $_POST['studentNumber'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $courses = $_POST['courses'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $success = insertStudentInfo($studentNumber, $firstName, $lastName, $courses, $email, $password);
  exit();
}

if (isset($_POST['login'])) {
    $studentNumber = $_POST['studentNumber'];
    $password = $_POST['password'];

    $signal = checkingUserInfo($studentNumber, $password);
    if ($signal) {
        header("Location: logIn&signUp.php");
        exit();
    }
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
    <link rel="stylesheet" href="logIn&signUp.css" />
    <title>Welcome to On_A.ment</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="login-signup">
          <!--Log In-->
          <form action="logIn&signUp.php" method="POST" class="log-in-form">
            <h2 class="title">Log In</h2>
            <div class="input-field">
              <i class="bx bxs-user"></i>
              <input
                type="text"
                placeholder="Student Number"
                name="studentNumber"
                required
              />
            </div>
            <div class="input-field">
              <i class="bx bxs-lock"></i>
              <input
                type="password"
                placeholder="Password"
                name="password"
                id="password"
                required
              />
              <img
                src="assets/hide.png"
                alt="Toggle Password Visibility"
                id="hide"
              />
            </div>
            <input
              type="submit"
              value="Log In"
              class="btn solid"
              name="login"
            />
          </form>
          <!--End of Log In-->

          <!--Sign Up-->
          <form action="logIn&signUp.php" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="bx bxs-user"></i>
              <input
                type="text"
                placeholder="Student Number"
                name="studentNumber"
                pattern="[0-4]{5}-[0-9]{2}-[0-9]{4}"
              />
            </div>
            <div class="input-field">
              <i class="bx bxs-user-detail"></i>
              <input
                type="text"
                placeholder="First Name"
                name="firstName"
                required
              />
            </div>
            <div class="input-field">
              <i class="bx bxs-user-detail"></i>
              <input
                type="text"
                placeholder="Last Name"
                name="lastName"
                required
              />
            </div>
            <div class="input-field">
              <i class="bx bxs-graduation"></i>
              <select
                type="text"
                placeholder="Course"
                id="courses"
                title="course"
                name="courses"
                required
              >
                <option value="" disabled selected>Course</option>
                <option value="BSCS">
                  Bachelor of Science in Computer Science (BSCS)
                </option>
                <option value="ACT">
                  Associate in Computer Technology(ACT)
                </option>
                <option value="BSBA">
                  Bachelor of Science in Business Administration (BSBA)
                </option>
                <option value="BACOMM">
                  Bachelor of Arts in Communication (BACOMM)
                </option>
                <option value="BSCRIM">
                  Bachelor of Science in Criminology (BSCRIM)
                </option>
                <option value="BSED">
                  Bachelor of Secondary Education (BSED)
                </option>
                <option value="BEED">
                  Bachelor of Elementary Education (BEED)
                </option>
                <option value="BPED">
                  Bachelor of Physical Education (BPED)
                </option>
                <option value="BSN">Bachelor of Science in Nursing(BSN)</option>
              </select>
            </div>
            <div class="input-field">
              <i class="bx bxs-envelope"></i>
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div class="input-field">
              <i class="bx bxs-lock"></i>
              <input
                type="password"
                placeholder="Password"
                id="passwordSignup"
                minlength="7"
                maxlength="14"
                name="password"
                required
              />
              <img
                src="assets/hide.png"
                alt="Toggle Password Visibility"
                id="hideSignup"
              />
            </div>
            <button type="submit" class="btn" id="signup" name="save-info">
              Sign up
            </button>
          </form>
        </div>
      </div>
      <!--End of Sign Up-->

      <!--Circle Panel from the Log-in Page to the Sign Up page and vice-versa-->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>On_<span>A.ment</span></h1>
            <p>Don't have an account yet? Join us!</p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h1>On_<span>A.ment</span></h1>
            <p>Already had an account? Log in now!</p>
            <button class="btn transparent" id="log-in-btn">Log in</button>
          </div>
        </div>
      </div>
    </div>
    <!--End of Circle Panel-->

    <script src="logIn&signUp.js"></script>
  </body>
</html>
