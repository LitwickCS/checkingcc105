//Each Elements in the Side Bar Toggle
const sideLinks = document.querySelectorAll(
  ".sidebar .side-menu li a:not(.logout)"
);

sideLinks.forEach((item) => {
  const li = item.parentElement;
  item.addEventListener("click", () => {
    sideLinks.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

//Side Bar Toggle
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
}); // Dark Theme Toggle
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
