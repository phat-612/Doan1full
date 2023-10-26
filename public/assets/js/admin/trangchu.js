document.querySelector(".js_filter").addEventListener("click", () => {
  let dateStart = document.querySelector(".js_date_start").value;
  let dateEnd = document.querySelector(".js_date_end").value;
  if (dateStart && dateEnd) {
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("dateStart", dateStart);
    urlObject.searchParams.set("dateEnd", dateEnd);
    let newUrl = urlObject.toString();
    window.location.href = newUrl;
  } else {
    alert("Làm ơn chọn ngày");
  }
});
