function flipCard(card) {
  // Toggle the 'flipped' class on the clicked card
  card.classList.toggle("flipped");
}

// Dark Theme Toggle
const toggler = document.getElementById("theme-toggle");

// Check if dark mode is enabled from localStorage
document.addEventListener("DOMContentLoaded", () => {
  const darkMode = localStorage.getItem("darkMode");

  // If dark mode is stored in localStorage, apply it
  if (darkMode === "enabled") {
    document.body.classList.add("dark");
    toggler.checked = true; // Ensure the checkbox reflects the state
  }
});

// Listen for changes to the theme toggle
toggler.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
    // Save the dark mode preference in localStorage
    localStorage.setItem("darkMode", "enabled");
  } else {
    document.body.classList.remove("dark");
    // Remove the dark mode preference from localStorage
    localStorage.setItem("darkMode", "disabled");
  }
});

// Sidebar Link Toggle (active state)
const sideLinks = document.querySelectorAll(
  ".sidebar .side-menu li a:not(.logout)"
);

sideLinks.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", () => {
    // Remove active class from all links
    sideLinks.forEach((i) => {
      i.parentElement.classList.remove("active");
    });

    // Add active class to the clicked link
    li.classList.add("active");

    // Toggle between Appointment, Request, and Dashboard content
    toggleContent(item);
  });
});

// Side Bar Toggle (for responsive menu)
const menuBar = document.querySelector(".content nav .bx.bx-menu");
const sideBar = document.querySelector(".sidebar");

menuBar.addEventListener("click", () => {
  sideBar.classList.toggle("close");
});

window.addEventListener("resize", () => {
  if (window.innerWidth < 768) {
    sideBar.classList.add("close");
  } else {
    sideBar.classList.remove("close");
  }
  if (window.innerWidth > 576) {
    searchBtnIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
  }
});

// Toggle content when switching between pages (Appointment, Request, Dashboard)
function toggleContent(item) {
  const appointmentContent = document.querySelector(".appointment-content");
  const requestContent = document.querySelector(".request-content");
  const dashboardContent = document.querySelector(".dashboard-content");

  // Hide all content sections initially
  appointmentContent.style.display = "none";
  requestContent.style.display = "none";
  dashboardContent.style.display = "none";

  // Show the appropriate content based on the clicked link
  if (item.textContent === "Appointment") {
    appointmentContent.style.display = "block";
    requestContent.style.display = "none"; // Hide Request content if Appointment is active
    dashboardContent.style.display = "none"; // Hide Dashboard content if Appointment is active
  } else if (item.textContent === "Request") {
    requestContent.style.display = "block";
    appointmentContent.style.display = "none"; // Hide Appointment content if Request is active
    dashboardContent.style.display = "none"; // Hide Dashboard content if Request is active
  } else if (item.textContent === "Dashboard") {
    dashboardContent.style.display = "block";
    appointmentContent.style.display = "none"; // Hide Appointment content if Dashboard is active
    requestContent.style.display = "none"; // Hide Request content if Dashboard is active
  }
}

// Initialize by hiding all content and showing default (e.g., "Appointment")
document.addEventListener("DOMContentLoaded", () => {
  const appointmentLink = document.querySelector("a[href='#appointment']");
  const requestLink = document.querySelector("a[href='#request']");
  const dashboardLink = document.querySelector("a[href='#dashboard']");

  // Ensure Appointment content is displayed by default
  if (appointmentLink.classList.contains("active")) {
    toggleContent(appointmentLink);
  } else if (requestLink.classList.contains("active")) {
    toggleContent(requestLink);
  } else if (dashboardLink.classList.contains("active")) {
    toggleContent(dashboardLink);
  }
});
