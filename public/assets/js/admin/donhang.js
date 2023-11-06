// láy key value url
let seaParams = {};
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
    seaParams[key] = value;
});
// kiểm tra key tồn tại không
if (seaParams.hasOwnProperty("status")) {
    document.querySelector(".js_filPro").value = seaParams["status"];
}
document.querySelector(".js_filPro").addEventListener("change", () => {
    let fillPro = document.querySelector(".js_filPro").value;
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("status", fillPro);
    let newUrl = urlObject.toString();
    window.location.href = newUrl;
});
/////////////////////////////////////////////////////
let seaParams1 = {};
let searchParams1 = new URLSearchParams(window.location.search);
searchParams1.forEach(function (value, key) {
    seaParams1[key] = value;
});
if (seaParams1.hasOwnProperty("sort")) {
    document.querySelector(".js_arrProduct").value = seaParams1["sort"];
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