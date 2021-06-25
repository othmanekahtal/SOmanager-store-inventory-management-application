var username = document.querySelector("#username");
var password = document.querySelector("#password");
var submitLogin = document.querySelector("#submitLogin");
var errorUsername = document.querySelector(".error.username");
var errorPassword = document.querySelector(".error.password");

// errorPassword.style.display = "none";
// errorUsername.style.display = "none";

let usernamev;
let passwordv;

username.addEventListener("input", function () {
  var usernameRegex = /^[A-Z]{4}\d{5}$/;

  if (usernameRegex.test(username.value)) {
    // errorUsername.style.display = "none";
    usernamev = true;
  } else {
    // errorUsername.style.display = "flex";
    usernamev = false;
  }
});

password.addEventListener("input", function () {
  var usernameRegex = /^[a-zA-Z0-9]{6,}$/;

  if (usernameRegex.test(password.value)) {
    // errorPassword.style.display = "none";
    passwordv = true;
  } else {
    // errorPassword.style.display = "block";
    passwordv = false;
  }
});

// /^[A-Z]{3}\d{4}$/

document.querySelector("#submitLogin").addEventListener("click", function () {
  event.preventDefault();
  if (usernamev == true && passwordv == true) {
    location.pathname =
      "SOmanager-store-inventory-management-application/dashboard.php";
  } else {
    if (!passwordv && !passwordv) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Enter Your Info!",
        footer: "<a href>Forgot Password ?</a>",
      });
    } else if (!passwordv) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Password has wrong!",
        footer: "<a href>Forgot Password ?</a>",
      });
    } else if (!usernamev) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "username went wrong!",
      });
    }
  }
});
