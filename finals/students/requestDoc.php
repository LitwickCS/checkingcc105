<?php
session_start();
require_once("functionStudent.php");

//For COR
if (isset($_POST['confirm'])) {
    $name = $_POST['name'];
    $student = $_POST['student'];
    $appointmentDate = $_POST['appointment-date'];
    $firstSem = $_FILES['first-semester']['name'];
    $secondSem = $_FILES['second-semester']['name'];

    // Upload the files
    $uploadDir = "uploads/";
    $firstSemPath = $uploadDir . basename($_FILES['first-semester']['name']);
    $secondSemPath = $uploadDir . basename($_FILES['second-semester']['name']);

    if (move_uploaded_file($_FILES['first-semester']['tmp_name'], $firstSemPath) &&
        move_uploaded_file($_FILES['second-semester']['tmp_name'], $secondSemPath)) {
        $signal = insertCOR($name, $student, $appointmentDate, $firstSemPath, $secondSemPath);
        if ($signal) {
            echo '<script>alert("COR Request Submitted Successfully!"); window.location.href = "requestDoc.php";</script>';
        } else {
            echo '<script>alert("Error Submitting COR Request.");</script>';
        }
    } else {
        echo '<script>alert("Error uploading files.");</script>';
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Request Appointment</title>
  <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
  <link rel="stylesheet" href="requestDoc.css" />

  <script>
     // Function to pre-select the document type based on URL parameter
     function preSelectDocument() {
      const urlParams = new URLSearchParams(window.location.search);
      const documentType = urlParams.get('document');
      if (documentType) {
        const selectElement = document.getElementById('document');
        selectElement.value = documentType;
        showFileInput(); // Call this to update the form based on the selected document
      }
    }

    // Call preSelectDocument when the page loads
    window.onload = preSelectDocument;
    // Function to dynamically show the form based on selected document
    function showFileInput() {
  const selectedDocument = document.getElementById('document').value;
  const fileInputDiv = document.getElementById('file-input-div');
  const fileInputLabel = document.getElementById('file-input-label');
  const formFields = document.getElementById('form-fields');
  const secondFileInputDiv = document.getElementById('second-file-input-div');
  const receiptDiv = document.getElementById('receipt');
  const totalCostDiv = document.getElementById('total-cost');

  let documentCost = 0;

  // Clear previous form fields
  formFields.innerHTML = '';
  secondFileInputDiv.style.display = 'none'; // Hide second file input by default
  receiptDiv.style.display = 'none'; // Hide receipt initially

  // Hide the file input div by default
  fileInputDiv.style.display = 'none';

  // Modify the form based on the selected document type
  if (selectedDocument === 'TOR') {
    // Show fields specific to TOR (Transcript of Records)
    formFields.innerHTML = `
      <div class="form-row">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="nameTOR" required>
        </div>
        <div class="form-group">
          <label for="year-graduate">Year Graduate:</label>
          <input type="text" id="year-graduate" name="year-graduate" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="section">Section:</label>
          <input type="text" id="section" name="section" required>
        </div>

        <div class="form-group">
          <label for="course">Course:</label>
          <select id="course" name="course" required>
            <option value="">-- Select Course --</option>
            <option value="ACT">Associative in Computer Technology</option>
            <option value="BACOMM">Bachelor of Arts in Communication</option>
            <option value="BSBA">Bachelor of Science in Business Administration</option>
            <option value="BSCRIM">Bachelor of Science in Criminology</option>
            <option value="BSCS">Bachelor of Science in Computer Science</option>
            <option value="BSED">Bachelor of Secondary Education</option>
            <option value="BPED">Bachelor in Primary Education</option>
            <option value="BSN">Bachelor of Science in Nursing</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="cellphone">Contact Number:</label>
          <input type="text" id="cellphone" name="contact" required>
        </div>

        <div class="form-group">
          <label for="gender">Sex:</label>
          <select id="gender" name="sex" required>
            <option value="">-- Select Gender --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="appointment-date">Preferred Appointment Date:</label>
          <input type="date" id="appointment-date" name="appointment-dateTOR" required>
        </div>
        <div class="form-group">
          <label for="appointment-time">Preferred Appointment Time:</label>
          <input type="time" id="appointment-time" name="appointment-timeTOR" required>
        </div>
      </div>
    `;
    // Show the file input for TOR
    fileInputDiv.style.display = 'block';
    fileInputDiv.innerHTML = `
    <div class="form-group">
        <label for="second-semester">Upload a valid ID:</label>
        <input type="file" id="second-semester" name="validID" required />
      </div>
      `;
    // Show the receipt for TOR
    receiptDiv.style.display = 'block';
    
    if (selectedDocument === 'TOR') {
      totalCostDiv.innerText = "150 PHP"; // Cost for TOR
      documentCost = 150;
    } 
  } else if (selectedDocument === 'COR') {
    // Show fields specific to COR (Certificate of Registration)
    formFields.innerHTML = `
    <form action="requestDoc.php" method="post">
      <div class="form-row">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="student">Student Number:</label>
          <input type="text" id="student" name="student" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="appointment-date">Preferred Appointment Date:</label>
          <input type="date" id="appointment-date" name="appointment-date" required>
        </div>
      </div>
      </form>
    `;
    // Show the file input for COR
    fileInputDiv.style.display = 'block';
    fileInputDiv.innerHTML = `
    <form action="requestDoc.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first-semester">Upload your 1st Semester Grades:</label>
        <input type="file" id="first-semester" name="first-semester" required />
      </div>
      </form>
      `;

    secondFileInputDiv.style.display = 'block';
    secondFileInputDiv.innerHTML = `
    <form action="requestDoc.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="second-semester">Upload your 2nd Semester Grades:</label>
        <input type="file" id="second-semester" name="second-semester" required />
      </div>
      </form>
    `;
    
    // Hide receipt for COR (no cost)
    receiptDiv.style.display = 'none';
    documentCost = 0; // No cost for COR
  } else if (selectedDocument === 'ID') {
    // Show fields for ID document
    formFields.innerHTML = `
      <div class="form-row">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="nameID" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="student">Student Number:</label>
          <input type="text" id="student" name="studentID" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="appointment-date">Preferred Appointment Date:</label>
          <input type="date" id="appointment-date" name="appointment-dateID" required>
        </div>
      </div>
      </form>
    `;
    // Show the file input for ID
    fileInputDiv.style.display = 'block';
    fileInputDiv.innerHTML = `
    <div class="form-group">
        <label for="second-semester">Upload your COR:</label>
        <input type="file" id="second-semester" name="cor" required />
      </div>
      `;
    
    // Hide the receipt for ID (no cost)
    receiptDiv.style.display = 'none';
    documentCost = 0; // No cost for ID
  } else {
    // If no document type is selected, hide the file input and receipt
    fileInputDiv.style.display = 'none';
    secondFileInputDiv.style.display = 'none';
    receiptDiv.style.display = 'none';
  }

  document.querySelector('.submit-btn').addEventListener('click', function(event) {
      event.preventDefault();  // Prevent the default form submission behavior

      const selectedDocument = document.getElementById('document').value;
      
      // Gather form data
      const formData = {
        name: document.getElementById('name').value,
        studentNumber: document.getElementById('student') ? document.getElementById('student').value : '',
        yearGraduate: document.getElementById('year-graduate') ? document.getElementById('year-graduate').value : '',
        section: document.getElementById('section') ? document.getElementById('section').value : '',
        course: document.getElementById('course') ? document.getElementById('course').value : '',
        cellphone: document.getElementById('cellphone') ? document.getElementById('cellphone').value : '',
        gender: document.getElementById('gender') ? document.getElementById('gender').value : '',
        firstSemesterGrades: document.getElementById('document-file') ? document.getElementById('document-file').files[0] : '',
        secondSemesterGrades: document.getElementById('second-semester') ? document.getElementById('second-semester').files[0] : '',
        appointmentDate: document.getElementById('appointment-date') ? document.getElementById('appointment-date').value : '',
        appointmentTime: document.getElementById('appointment-time') ? document.getElementById('appointment-time').value : ''
      };

      // Show the confirmation modal with the form data
      const confirmationDetails = document.getElementById('confirmation-details');
      let confirmationHTML = '';

      if (selectedDocument === 'TOR') {
        confirmationHTML = `
          <p><strong>Name:</strong> ${formData.name}</p>
          <p><strong>Year Graduate:</strong> ${formData.yearGraduate}</p>
          <p><strong>Section:</strong> ${formData.section}</p>
          <p><strong>Course:</strong> ${formData.course}</p>
          <p><strong>Cellphone:</strong> ${formData.cellphone}</p>
          <p><strong>Gender:</strong> ${formData.gender}</p>
          <p><strong>Total Cost:</strong> ${selectedDocument === 'TOR' ? '150 PHP' : '25 PHP'}</p>
          <p><strong>Preferred Appointment Date:</strong> ${formData.appointmentDate}</p>
          <p><strong>Preferred Appointment Time:</strong> ${formData.appointmentTime}</p>
        `;
      } else if (selectedDocument === 'COR' || selectedDocument === 'ID') {
        confirmationHTML = `
          <p><strong>Name:</strong> ${formData.name}</p>
          <p><strong>Student Number:</strong> ${formData.studentNumber}</p>
          <p><strong>Preferred Appointment Date:</strong> ${formData.appointmentDate}</p>
          <p><strong>Preferred Appointment Time:</strong> ${formData.appointmentTime}</p>
        `;
      }

      confirmationDetails.innerHTML = confirmationHTML;

      // Show the modal by changing its display to flex
      document.getElementById('confirmation-modal').style.display = 'flex';

    // Handle Edit action
    document.getElementById('edit-btn').addEventListener('click', function() {
      // Close the modal and let the user edit the form
      document.getElementById('confirmation-modal').style.display = 'none';
    });

    // Handle Submit action
    document.getElementById('submit-btn').addEventListener('click', function() {
      // Here you can handle form submission (e.g., send data to the server)
      alert('Form submitted!');
      document.getElementById('confirmation-modal').style.display = 'none';
    });
  });
}
  </script>
</head>


<body>
  <div class="sidebar">
    <a href="#" class="logo">
      <i class="bx bx-code-alt"></i>
      <div class="logo-name"><span>On_</span>A.ment</div>
    </a>
    <ul class="side-menu">
        <li>
          <a href="studentdashboard.php"><i class="bx bxs-dashboard"></i>Dashboard</a>
        </li>
        <li class="active">
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

  <div class="content">
    <nav>
      <i class="bx bx-menu"></i>
      <input type="checkbox" id="theme-toggle" hidden />
      <label for="theme-toggle" class="theme-toggle"></label>
    </nav>

    <main>
        <div class="header">
          <h1>Request Document </h1>
        </div>
        <div class="request-form">
          <form>
            <!-- Document Selection -->
            <div class="form-row">
              <div class="form-group">
                <label for="document">Select Document:</label>
                <select id="document" name="document" onchange="showFileInput()" required>
                  <option value="">-- Select Document --</option>
                  <option value="TOR">TOR (Transcript of Records)</option>
                  <option value="COR">COR (Certificate of Registration)</option>
                  <option value="ID">ID</option>
                </select>
              </div>
            </div>

            <!-- Dynamically generated form fields -->
            <div id="form-fields"></div>

            <!-- File Upload Input (Initially Hidden) -->
            <div id="file-input-div" class="form-row" style="display: none;">
              <div class="form-group">
                <label id="file-input-label" for="document-file"></label>
                <input type="file" id="document-file" name="document-file" required />
              </div>
            </div>

            <!-- Second File Upload Input (Initially Hidden for COR) -->
            <div id="second-file-input-div" class="form-row" style="display: none;"></div>
 
            <!-- Receipt Section (Initially Hidden) -->
            <div id="receipt" class="form-row" style="display: none;">
              <div class="form-group">
                <label>Total Cost:</label>
                <div id="total-cost" style="font-weight: bold; font-size: 18px;"></div>
              </div>
            </div>

            <button type="submit" class="submit-btn" >Request Appointment</button>

          </form>
        </div>
      </main>
    </div>
  </div>

  <!-- Confirmation Modal -->
<!-- Confirmation Modal with Form -->
<div id="confirmation-modal" class="modal" style="display: none;">
  <div class="modal-content">
    <h2>Confirm Your Details</h2>
    <form id="confirmation-form" action="requestDoc.php" method="post" >
      <div id="confirmation-details">
        <!-- Dynamically populated details will go here -->
      </div>
      <div class="form-row">
        <button id="edit-btn" type="button" class="submit-btn">Edit</button>
        <button id="submit-btn" type="submit" class="submit-btn" name="confirm">Confirm</button>
      </div>
    </form>
  </div>
</div>

    <script src="requestDoc.js"></script>
  </body>
</html>