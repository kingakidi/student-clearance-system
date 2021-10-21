let actions = document.querySelectorAll(".action");
let popup = document.getElementById("popup-page");
let popupContent = document.getElementById("popup-content");

actions.forEach((element) => {
  element.onclick = function (event) {
    popupContent.innerHTML = "";
    event.preventDefault();
    // SEND REQUEST FOR THE STUDENT DETAILS
    // SEND FOR EVENT DETAILS OF STUDENT IF AVAILABLE SHOW
    $.ajax({
      url: "./control/action.php",
      method: "POST",
      data: {
        regno: this.id,
        clearanceRequest: true,
      },
      beforeSend: function () {
        // DISPLAY THE MODAL
        popup.style.display = "block";
      },
      success: function (data) {
        popupContent.innerHTML = data;
        // closePopup.onclick = function () {
        //   popup.style.display = "none";
        // };

        // DECLEARE VARIABLES FOR THE CLEARANCE STATUS SUBMISSION
        let closePopup = _("close-popup");
        let clearanceForm = _("clearance-form");
        let comment = _("comment");
        let regno = _("regno");
        let status = _("status");
        let showStatus = _("show-status");
        closePopup.onclick = function () {
          popup.style.display = "none";
          window.location.reload();
        };
        clearanceForm.onsubmit = function (event) {
          event.preventDefault();
          //   CHECK FOR EMPTY IN THE FIELDS
          if (clean(comment) > 0 && clean(status) > 0 && clean(regno) > 0) {
            //   SEND REQUEST FOR CLEARANCE
            $.ajax({
              url: "./control/action.php",
              method: "POST",
              data: {
                regno: regno.value,
                comment: comment.value,
                status: status.value,
                clearing: true,
              },
              success: function (data) {
                showStatus.innerHTML = data;
              },
            });
          } else {
            showStatus.innerHTML = error("ALL FIELD(S) REQUIRED");
          }
        };
      },
    });
  };
});
