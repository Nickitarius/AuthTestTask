import {
  validatePasswords,
  validateEmail,
} from "./password.validation.util.js";

window.onload = function () {
  const form = document.getElementById("signup-form");
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const repeatPassword = document.getElementById("repeat-password");
  // const username = document.getElementById("username");

  const passwordError = document.getElementById("password-error");
  const repeatPasswordError = document.getElementById("repeat-password-error");
  const emailError = document.getElementById("email-error");
  // const usernameError = document.getElementById("username-error");

  email.addEventListener("input", (event) => {
    validateEmail(email, emailError);
  });

  password.addEventListener("input", (event) => {
    validatePasswords(
      password,
      repeatPassword,
      passwordError,
      repeatPasswordError
    );
  });
  repeatPassword.addEventListener("input", (event) => {
    validatePasswords(
      password,
      repeatPassword,
      passwordError,
      repeatPasswordError
    );
  });

  form.onsubmit = function (event) {
    validateEmail(email, emailError);
    validatePasswords(
      password,
      repeatPassword,
      passwordError,
      repeatPasswordError
    );

    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.classList.add("was-validated");
  };
};
