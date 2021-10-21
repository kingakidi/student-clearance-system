let username = _("username");
let password = _("password");
let usertype = _("usertype");
let regForm = _("registration-form");
let showError = _("show-error");
let btnRegister = _("register");
regForm.onsubmit = function (event) {
  event.preventDefault();

  // CLEAN THE DATA
  // SEND DATA TO BACKEND
  if (clean(username) > 0 && clean(password) > 0 && clean(usertype) > 0) {
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        username: username.value,
        password: password.value,
        usertype: usertype.value,
        register: true,
      },
      success: function (data) {
        showError.innerHTML = data;
        console.log(data);

        if (
          data === "<span class='text-success'> Registered Successfully </span>"
        ) {
          btnRegister.disabled = true;
          usertype.value = "";
          usertype.disabled = true;
          username.disabled = true;
          username.value = "";
          password.disabled = true;
          password.value = "";
        }
      },
    });
  } else {
    showError.innerHTML = error("All fields is required");
  }
};
