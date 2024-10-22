/**Checks if two passwords are valid and the same.
 *  Writes appropriate error messages into provided error elements, if they are specified. */
export function checkPasswords(
  password,
  repeatPassword,
  passwordError = null,
  repeatPasswordError = null
) {
  // const passwordValidationregex = /^[A-Za-z0-9]{8,20}/;
  let errorMessage = "";
  if (password.value === repeatPassword.value) {
    if (password.value.length >= 8) {
      if (/^[A-Za-z0-9]*$/.test(password.value)) {
        password.setCustomValidity("");
        repeatPassword.setCustomValidity("");
      } else {
        password.setCustomValidity("invalid");
        repeatPassword.setCustomValidity("invalid");
        errorMessage =
          "Пароль должен содержать только латинские символы и цифры!";
      }
    } else {
      password.setCustomValidity("invalid");
      repeatPassword.setCustomValidity("invalid");
      errorMessage = "Пароль должен быть не менее 8 символов!";
    }
  } else {
    password.setCustomValidity("invalid");
    repeatPassword.setCustomValidity("invalid");
    errorMessage = "Пароли не совпадают!";
  }
  if (passwordError && repeatPasswordError) {
    passwordError.innerHTML = errorMessage;
    repeatPasswordError.innerHTML = errorMessage;
  }
}
