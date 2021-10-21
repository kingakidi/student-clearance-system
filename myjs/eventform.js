let regno = _("regno");
let fullname = _("fullname");
let title = _("title");
let message = _("message");
let action = _("action");
let btnEvent = _("btn-event-form");
let showStatus = _("show-status");
let eventForm = _("event-form");

eventForm.onsubmit = function (event) {
  event.preventDefault();
  //   CHECK FOR EMPTYs
  if (
    clean(regno) > 0 &&
    clean(fullname) > 0 &&
    clean(action) > 0 &&
    clean(title) > 0 &&
    clean(message) > 0
  ) {
    //   SEND
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        regno: regno.value,
        fullname: fullname.value,
        action: action.value,
        title: title.value,
        message: message.value,
        regEvent: true,
      },
      beforeSend: function () {
        showStatus.innerHTML = "";
      },
      success: function (data) {
        console.log(data);

        if (
          data ===
          "<span class='text-success'>  EVENT ADDED SUCCESSFULLY </span>"
        ) {
          fullname.disabled = true;
          regno.disabled = true;
          title.disabled = true;
          message.disabled = true;
          action.disabled = true;
          btnEvent.disabled = true;
          showStatus.innerHTML = data;
        } else {
          showStatus.innerHTML = data;
        }
      },
    });
  } else {
    showStatus.innerHTML = error("ALL FIELDS REQUIRED");
  }
};
