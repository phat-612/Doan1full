// láy key value url
let seaParams = {};
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
    seaParams[key] = value;
});
// kiểm tra key tồn tại không
if (seaParams.hasOwnProperty("status")) {
    document.querySelector(".js_status").value = seaParams["status"];
}
document.querySelector(".js_status").addEventListener("change", () => {
    let status = document.querySelector(".js_status").value;
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("status", status);
    let newUrl = urlObject.toString();
    window.location.href = newUrl;
});
/////////////////////////////////////////////////////
document.querySelector(".js_sort").addEventListener("change", () => {
    let sort = document.querySelector(".js_sort").value;
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("sort", sort);
    let newUrl = urlObject.toString();
    window.location.href = newUrl;

});
document.querySelector(".js_btnSrOrder").addEventListener("click", () => {
    let srOrder = document.querySelector(".js_srOrder").value;
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("search", srOrder);
    let newUrl = urlObject.toString();
    console.log(newUrl);
    window.location.href = newUrl;
});
