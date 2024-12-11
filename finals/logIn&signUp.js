//Hiding and Showing Password in Log-In Page
let hide = document.getElementById("hide");
let password = document.getElementById("password");
hide.onclick = function () {
  if (password.type == "password") {
    password.type = "text";
    hide.src = "assets/show.png";
  } else {
    password.type = "password";
    hide.src = "assets/hide.png";
  }
};

//Hiding and Showing Password in Sign-Up Page
let hideSignup = document.getElementById("hideSignup");
let passwordSignup = document.getElementById("passwordSignup");
hideSignup.onclick = function () {
  if (passwordSignup.type == "password") {
    passwordSignup.type = "text";
    hideSignup.src = "assets/show.png";
  } else {
    passwordSignup.type = "password";
    hideSignup.src = "assets/hide.png";
  }
};

//Switching Between the LogIn and SignUp Page
const log_in_btn = document.querySelector("#log-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

log_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
