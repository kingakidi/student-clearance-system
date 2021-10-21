let username = _("username");
let password = _("password");
let loginForm = _("login-form");
let showError = _("show-error");
let btnRegister = _("register");
loginForm.onsubmit = function (event) {
  event.preventDefault();

  // CLEAN THE DATA
  // SEND DATA TO BACKEND
  if (clean(username) > 0 && clean(password) > 0) {
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        username: username.value,
        password: password.value,
        login: true,
      },
      success: function (data) {
        if (
          data.trim() ===
          "<span class='text-success'>  Successfully Login </span>"
        ) {
          window.location.reload();
        } else {
          showError.innerHTML = data;
        }
        console.log(data);
      },
    });
  } else {
    showError.innerHTML = error("All fields is required");
  }
};
