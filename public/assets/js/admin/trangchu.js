let dateStart = document.querySelector(".js_date_start");
let dateEnd = document.querySelector(".js_date_end");
// Tạo một đối tượng Date để lấy ngày hiện tại
var currentDate = new Date();
var year = currentDate.getFullYear();// Lấy thông tin về ngày, tháng và năm
var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Chuyển tháng thành chuỗi và thêm số 0 ở đầu nếu cần
var day = String(currentDate.getDate()).padStart(2, '0'); // Chuyển ngày thành chuỗi và thêm số 0 ở đầu nếu cần
var formattedDate = year + '-' + month + '-' + day;  // Tạo chuỗi đại diện cho ngày hiện tại (định dạng YYYY-MM-DD)
dateStart.max = formattedDate;
dateStart.addEventListener("change", () => {
  if (dateStart.value == "") {
    dateEnd.disabled = true;
  }
  else {
    dateEnd.disabled = false;
    dateEnd.min = dateStart.value;
    dateEnd.max = formattedDate;

  }
});
document.querySelector(".js_filter").addEventListener("click", () => {
  if (dateStart.value && dateEnd.value) {
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("dateStart", dateStart.value);
    urlObject.searchParams.set("dateEnd", dateEnd.value);
    let newUrl = urlObject.toString();
    window.location.href = newUrl;
  } else {
    alert("vui lòng chọn ngày");
  }
});

// document.querySelector(".js_date_start").addEventListener("change", (e) => {
//   if (e.target.value == "") {
//     document.querySelector(".js_date_end").disabled = true;
//   }
//   else {
//     // Tạo một đối tượng Date để lấy ngày hiện tại
//     var currentDate = new Date();
//     // Lấy thông tin về ngày, tháng và năm
//     var year = currentDate.getFullYear();
//     var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Chuyển tháng thành chuỗi và thêm số 0 ở đầu nếu cần
//     var day = String(currentDate.getDate()).padStart(2, '0'); // Chuyển ngày thành chuỗi và thêm số 0 ở đầu nếu cần

//     // Tạo chuỗi đại diện cho ngày hiện tại (định dạng YYYY-MM-DD)
//     var formattedDate = year + '-' + month + '-' + day;
//     document.querySelector(".js_date_end").disabled = false;
//     dateEnd.min = e.target.value;
//     dateEnd.max = formattedDate;
//   }
// });
// document.querySelector(".js_filter").addEventListener("click", () => {
//   if (dateStart && dateEnd) {
//     let urlObject = new URL(window.location.href);
//     urlObject.searchParams.set("dateStart", dateStart);
//     urlObject.searchParams.set("dateEnd", dateEnd);
//     let newUrl = urlObject.toString();
//     window.location.href = newUrl;
//   } else {
//     alert("Làm ơn chọn ngày");
//   }
// });
