let dateStart = document.querySelector(".js_date_start");
let dateEnd = document.querySelector(".js_date_end");
// Tạo một đối tượng Date để lấy ngày hiện tại
let currentDate = new Date();
let year = currentDate.getFullYear();// Lấy thông tin về ngày, tháng và năm
let month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Chuyển tháng thành chuỗi và thêm số 0 ở đầu nếu cần
let day = String(currentDate.getDate()).padStart(2, '0'); // Chuyển ngày thành chuỗi và thêm số 0 ở đầu nếu cần
let formattedDate = year + '-' + month + '-' + day;  // Tạo chuỗi đại diện cho ngày hiện tại (định dạng YYYY-MM-DD)
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
