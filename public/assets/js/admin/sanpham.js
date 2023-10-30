document.querySelector(".js_fillPro").addEventListener("change", () => {
  let fillPro = document.querySelector(".js_fillPro").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("js_fillPro", fillPro);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
document.querySelector(".js_srPro").addEventListener("click", () => {
  let fillPro = document.querySelector(".js_srProfill").value;
  let urlObject = new URL(window.location.href);
  urlObject.searchParams.set("js_srProfill", srProfill);
  let newUrl = urlObject.toString();
  window.location.href = newUrl;
});
