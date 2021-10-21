// let sidebarLinks = document.querySelectorAll(".sidebar-action");
// let showMain = _("show-main");
// sidebarLinks.forEach((element) => {
//   element.onclick = function (event) {
//     event.preventDefault();

//     // SEND GET REQUREST FOR THE PAGE TO INCLUDE
//     // CLEAN THE PAGE FIRST
//     $.ajax({
//       url: "./control/showpage.php",
//       method: "POST",
//       data: {
//         loadPage: this.id,
//       },
//       beforeSend: function () {
//         showMain.innerHTML = "";
//       },
//       success: function (data) {
//         showMain.innerHTML = data;
//       },
//     });
//   };
// });
