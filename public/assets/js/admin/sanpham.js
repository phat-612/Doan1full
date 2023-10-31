// láy key value url
let seaParams = {};
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
  seaParams[key] = value;
});
// kiểm tra key tồn tại không 
if (seaParams.hasOwnProperty('js_filPro')) {
  document.querySelector(".js_filPro").value = seaParams['js_filPro'];
}
document.querySelector(".js_filPro").addEventListener("change", () => {
  let fillPro = document.querySelector(".js_filPro").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("js_filPro", fillPro);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
if (seaParams.hasOwnProperty('js_arrPro', 'arrProDesc')) {
  document.querySelector("js_arrProduct").value = seaParams['js_arrPro']['arrProDesc'];
}
document.querySelector(".js_arrProduct").addEventListener("change", () => {
  let arrPro = document.querySelector(".js_arrPro").value;
  let arrProDesc = document.querySelector(".js_arrProDesc").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("js_arrPro", arrPro);
  urlObject.searchParams.set("js_arrProDesc", arrProDesc);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
