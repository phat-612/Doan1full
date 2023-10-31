// láy key value url
let seaParams = {};
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
  seaParams[key] = value;
});
// kiểm tra key tồn tại không
if (seaParams.hasOwnProperty("js_filPro")) {
  document.querySelector(".js_filPro").value = seaParams["js_filPro"];
}
document.querySelector(".js_filPro").addEventListener("change", () => {
  let fillPro = document.querySelector(".js_filPro").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("js_filPro", fillPro);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
////////////////////////////////////////////////////////////////
let seaParams1 = {};
let searchParams1 = new URLSearchParams(window.location.search);
searchParams1.forEach(function (value, key) {
  seaParams1[key] = value;
});
if (seaParams1.hasOwnProperty("js_arrProduct")) {
  document.querySelector(".js_arrProduct").value = seaParams1["js_arrProduct"];
}
document.querySelector(".js_arrProduct").addEventListener("change", () => {
  let arrPro = document.querySelector(".js_arrProduct").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("js_arrProduct", arrPro);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
