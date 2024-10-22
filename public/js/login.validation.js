// import { validatePassword } from "./password.validation.util.js";

window.onload = function () {
  console.log("s");
  const form = document.getElementById("login-form");

  //   const password = document.getElementById("password");
  //   const username = document.getElementById("username");

  //   const passwordError = document.getElementById("password-error");
  //   const usernameError = document.getElementById("username-error");

  //   password.addEventListener("input", (event) => {
  //     validatePassword(password, (passwordError = passwordError));
  //   });

  form.onsubmit = function (event) {
    // validatePassword(password, (passwordError = passwordError));

    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.classList.add("was-validated");
  };
};
