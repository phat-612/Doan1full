let seaParams = {};
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
  seaParams[key] = value;
});
if (seaParams.hasOwnProperty("category")) {
  document.querySelector(".js_filPro").value = seaParams["category"];
}
document.querySelector(".js_filPro").addEventListener("change", () => {
  let fillPro = document.querySelector(".js_filPro").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("category", fillPro);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
////////////////////////////////////////////////////////////////
if (seaParams.hasOwnProperty("sort")) {
  document.querySelector(".js_arrProduct").value = seaParams["sort"];
}
document.querySelector(".js_arrProduct").addEventListener("change", () => {
  let arrPro = document.querySelector(".js_arrProduct").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("sort", arrPro);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
document.querySelector(".js_butSrPro").addEventListener("click", () => {
  let srPro = document.querySelector(".js_srPro").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("search", srPro);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
/////////////////////////////////////////////////////////////////////
document.querySelector(".btn-del-filter").addEventListener("click", () => {
  clearSearchQuery();
});