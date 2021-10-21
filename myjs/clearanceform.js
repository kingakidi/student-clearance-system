let clearanceForm = _("clearance-form");
let btnClearance = _("btn-clearance-form");
let regno = _("regno");
let surname = _("surname");
let firstname = _("firstname");
let othernames = _("othernames");
let gender = _("gender");
let showStatus = _("show-status");
// console.log(regno, surname, firstname, othernames, gender);

clearanceForm.onsubmit = function (event) {
  event.preventDefault();
  // console.log(event);
  // console.log(showStatus);
  if (
    clean(regno) > 0 &&
    clean(surname) > 0 &&
    clean(firstname) > 0 &&
    clean(gender) > 0
  ) {
    // SEND DATA BACK
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        regno: regno.value,
        surname: surname.value,
        firstname: firstname.value,
        othernames: othernames.value,
        gender: gender.value,
        regClearanceForm: true,
      },
      beforeSend: function () {
        btnClearance.disabled = true;
        showStatus.innerHTML = "";
      },
      success: function (data) {
        if (
          data ===
          "<span class='text-success'>  Clearance Request Submitted Successfully </span>"
        ) {
          btnClearance.disabled = true;
          showStatus.innerHTML = data;
          regno.disabled = true;
          surname.disabled = true;
          firstname.disabled = true;
          othernames.disabled = true;
          gender.disabled = true;
        } else {
          btnClearance.disabled = false;
          showStatus.innerHTML = data;
        }
      },
    });
  } else {
    showStatus.innerHTML = error("ALL (*) FIELD(S) REQUIRED");
  }
};
